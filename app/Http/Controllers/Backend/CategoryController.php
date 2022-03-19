<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreRequest;
use App\Http\Requests\Categories\UpdateRequest;
use NabilAnam\SimpleUpload\SimpleUpload;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $all = $request->all();
        $all['display_on_home'] = $request->display_on_home === 'on';
        $all['image'] = (new SimpleUpload)->file($request->image)
            ->dirName('categories')
            ->save();

        Category::create($all);

        return redirect()
            ->route('backend.product.categories.index')
            ->with('message', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $all = $request->all();
        $all['display_on_home'] = $request->display_on_home == 'on';
        $all['image'] = (new SimpleUpload)->file($request->image)
            ->dirName('categories')
            ->deleteIfExists($category->image)
            ->save();

        $category->update($all);

        return redirect()
            ->route('backend.product.categories.index')
            ->with('message', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e){
            return redirect()
                ->route('backend.product.categories.index')
                ->with('error', 'Category is referenced in another place!');
        }

        return redirect()
            ->route('backend.product.categories.index')
            ->with('message', 'Category deleted successfully!');
    }
}
