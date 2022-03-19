<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategories\StoreRequest;
use App\Http\Requests\Subcategories\UpdateRequest;
use App\Models\ChildCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('category')->latest()->paginate(5);

        return view('backend.sub_categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('backend.sub_categories.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        SubCategory::create($request->all());

        return redirect()
            ->route('backend.product.sub_categories.index')
            ->with('message', 'Subcategory created successfully!');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();

        return view('backend.sub_categories.edit', compact('categories', 'subCategory'));
    }

    public function update(UpdateRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());

        return redirect()
            ->route('backend.product.sub_categories.index')
            ->with('message', 'Subcategory updated successfully!');
    }

    public function destroy(SubCategory $subCategory)
    {
        try {
            $subCategory->delete();
        } catch (\Exception $e){
            return redirect()
                ->route('backend.product.sub_categories.index')
                ->with('error', 'Subcategory is referenced in another place!');
        }

        return redirect()
            ->route('backend.product.sub_categories.index')
            ->with('message', 'Subcategory deleted successfully!');
    }

    // ajax
    public function ajaxGetSubCategories($category_id)
    {
        return response()->json(SubCategory::where('category_id', $category_id)->get(['id', 'name']));
    }
}
