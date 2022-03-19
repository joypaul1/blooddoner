<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Origins\StoreRequest;
use App\Http\Requests\Origins\UpdateRequest;
use App\Models\Origin;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class OriginController extends Controller
{
    public function index()
    {
        $origins = Origin::latest()->paginate(5);

        return view('backend.origins.index', compact('origins'));
    }

    public function create()
    {
        return view('backend.origins.create');
    }

    public function store(StoreRequest $request)
    {
        $all = $request->all();
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('origins')
            ->save();

        Origin::create($all);

        return redirect()
            ->route('backend.product.origins.index')
            ->with('message', 'Origin created successfully!');
    }

    public function edit(Origin $origin)
    {
        return view('backend.origins.edit', compact('origin'));
    }

    public function update(UpdateRequest $request, Origin $origin)
    {
        $all = $request->all();
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('origins')
            ->deleteIfExists($origin->image)
            ->save();

        $origin->update($all);

        return redirect()
            ->route('backend.product.origins.index')
            ->with('message', 'Origin updated successfully!');
    }

    public function destroy(Origin $origin)
    {
        try {
            $origin->delete();
        } catch (\Exception $e){
            return redirect()
                ->route('backend.product.origins.index')
                ->with('error', 'Origin is referenced in another place!');
        }

        return redirect()
            ->route('backend.product.origins.index')
            ->with('message', 'Origin deleted successfully!');
    }
}
