<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildCategories\StoreRequest;
use App\Http\Requests\ChildCategories\UpdateRequest;
use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $childCategories = ChildCategory::with('sub_category.category')->latest()->paginate(25);

        return view('backend.child_categories.index', compact('childCategories'));
    }

    public function create()
    {
        $categories = Category::get(['id', 'name']);

        return view('backend.child_categories.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {

        $data           = $request->all();
        $data['image']  = (new SimpleUpload)
            ->file($request->image)
            ->dirName('childCategories')
            ->resizeImage(1140, 290)
            ->save();
        ChildCategory::create($data);

        return redirect()
            ->route('backend.product.child_categories.index')
            ->with('message', 'Child Category created successfully!');
    }

    public function edit($id)
    {
        $childCategory  = ChildCategory::with('category.sub_categories')->find($id);
        $categories     = Category::get(['id', 'name']);
        // $categories     = category::

        return view('backend.child_categories.edit', compact('childCategory', 'categories'));
    }

    public function update(UpdateRequest $request, ChildCategory $childCategory)
    {

        $all          = $request->all();
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('childCategories')
            ->resizeImage(1140, 290)
            ->deleteIfExists($childCategory->image)
            ->save();
        $childCategory->update($all);

        return redirect()
            ->route('backend.product.child_categories.index')
            ->with('message', 'Child Category updated successfully!');
    }

    public function destroy($id)
    {
        try {
            ChildCategory::where('id', $id)->delete();
        } catch (\Exception $e) {
            return redirect()
                ->route('backend.product.child_categories.index')
                ->with('error', 'Child Category is referenced in another place!');
        }

        return redirect()
            ->route('backend.product.child_categories.index')
            ->with('message', 'Child Category deleted successfully!');
    }

    // ajax

    public function ajaxGetChildCategories($subcategory_id)
    {
        return ChildCategory::where('subcategory_id', $subcategory_id)->get(['id', 'name']);
    }
    public function search(Request $request)
    {
        $q = $request->search;
        $childCategories  = ChildCategory::where('name', 'LIKE', '%' . $q . '%')->paginate(25);
        return view('backend.child_categories.index', compact('childCategories'));
    }
}
