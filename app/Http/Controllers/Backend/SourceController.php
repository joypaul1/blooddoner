<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\StoreRequest;
use App\Http\Requests\Sources\UpdateRequest;
use App\Models\Source;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::latest()->paginate(5);

        return view('backend.sources.index', compact('sources'));
    }

    public function create()
    {
        return view('backend.sources.create');
    }

    public function store(StoreRequest $request)
    {
        $all = $request->all();
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('sources')
            ->save();

        Source::create($all);

        return redirect()
            ->route('backend.purchase.sources.index')
            ->with('message', 'Source created successfully!');
    }

    public function edit(Source $source)
    {
        return view('backend.sources.edit', compact('source'));
    }

    public function update(UpdateRequest $request, Source $source)
    {
        $all = $request->all();
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('sources')
            ->deleteIfExists($source->image)
            ->save();

        $source->update($all);

        return redirect()
            ->route('backend.purchase.sources.index')
            ->with('message', 'Source updated successfully!');
    }

    public function destroy(Source $source)
    {
        try {
            $source->delete();
        } catch (\Exception $e) {
            return redirect()
                ->route('backend.purchase.sources.index')
                ->with('error', 'Source is referenced in another place!');
        }

        return redirect()
            ->route('backend.purchase.sources.index')
            ->with('message', 'Source deleted successfully!');
    }
}
