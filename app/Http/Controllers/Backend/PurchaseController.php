<?php /** @noinspection ALL */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StoreRequest;
use App\Http\Requests\Purchases\UpdateRequest;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Source;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::get(['id', 'name']);
        $sources = Source::get(['id', 'name']);
        $query = Purchase::with('details.stock.item', 'source');

        if ($request->source) {
            $query->where('source_id', $request->source);
        }
        if ($request->ref_no) {
            $query->where('ref_no', $request->ref_no);
        }
        if ($request->purchase_no) {
            $query->where('purchase_no', $request->purchase_no);
        }
        if ($request->purchase_date) {
            $query->whereDate('purchase_date', $request->purchase_date);
        }

        if ($request->item || $request->quantity || $request->rate) {
            $query->whereHas('details.stock', function ($q) use ($request) {
                $q->where('type', 'debit');

                if ($request->item)
                    $q->where('item_id', $request->item);
            });
        }

        $purchases = $query->latest()->paginate(5);

        return view('backend.purchases.index', compact('purchases', 'items', 'sources'));
    }

    public function create()
    {
        $sources = Source::get(['id', 'name']);
        $items = Item::get(['id', 'name']);

        return view('backend.purchases.create', compact('sources', 'items'));
    }

    public function store(StoreRequest $request)
    {
        $purchase_no = (int)(date('Ym'));
        $purchase = Purchase::where('purchase_no', 'like', $purchase_no . '%')->latest()->first();

        try {
            DB::beginTransaction();

            $purchase = Purchase::create([
                'ref_no' => $request->ref_no,
                'source_id' => $request->source_id,
                'purchase_date' => $request->purchase_date,
                'purchase_no' => $purchase ? ((int)$purchase->purchase_no + 1) : ($purchase_no . '0001'),
            ]);

            foreach ($request->items as $key => $item) {
                $stock = Stock::create([
                    'type' => 'debit',
                    'item_id' => $item,
                    'rate' => $request->rates[$key],
                    'qty' => $request->quantities[$key],
                ]);

                $purchase->details()->create([
                    'stock_id' => $stock->id
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('backend.purchase.purchases.index')
                ->with('error', 'Purchase couldn\'t be created!');
        }

        return redirect()
            ->route('backend.purchase.purchases.index')
            ->with('message', 'Purchase created successfully!');
    }

    public function edit($id)
    {
        $purchase = Purchase::with('details.stock.item', 'source')->find($id);
        $sources = Source::get(['id', 'name']);
        $items = Item::get(['id', 'name']);

        return view('backend.purchases.edit', compact('purchase', 'sources', 'items'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $purchase = Purchase::with('details.stock')->find($id);
            $purchase->update([
                'ref_no' => $request->ref_no,
                'source_id' => $request->source_id,
                'purchase_date' => $request->purchase_date,
            ]);

            foreach ($purchase->details as $detail) {
                if ($request->detail_items && array_key_exists($detail->id, $request->detail_items)) {
                    $detail->stock->update([
                        'rate' => $request->detail_rates[$detail->id],
                        'item_id' => $request->detail_items[$detail->id],
                        'qty' => $request->detail_quantities[$detail->id],
                    ]);
                } else {
                    $detail->delete();
                    $detail->stock->delete();
                }
            }

            if ($request->items) {
                foreach ($request->items as $key => $item) {
                    $stock = Stock::create([
                        'type' => 'debit',
                        'item_id' => $item,
                        'rate' => $request->rates[$key],
                        'qty' => $request->quantities[$key],
                    ]);

                    $purchase->details()->create([
                        'stock_id' => $stock->id
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('backend.purchase.purchases.index')
                ->with('error', 'Purchase couldn\'t be updated!');
        }

        return redirect()
            ->route('backend.purchase.purchases.index')
            ->with('message', 'Purchase updated successfully!');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $purchase = Purchase::with('details.stock')->find($id);
            foreach ($purchase->details as $detail) {
                $detail->delete();
                $detail->stock->delete();
            }
            $purchase->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('backend.purchase.purchases.index')
                ->with('error', 'Purchase is referenced in another place!');
        }

        return redirect()
            ->route('backend.purchase.purchases.index')
            ->with('message', 'Purchase deleted successfully!');
    }
}
