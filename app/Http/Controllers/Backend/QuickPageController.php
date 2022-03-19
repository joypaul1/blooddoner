<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quickpage\QuickpageRequest;
use App\Http\Requests\Quickpage\QuickpageUpdateRequest;
use App\Models\QuickPage;

class QuickPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pages = QuickPage::paginate(10);
       return view ('backend.quick-page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quick-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuickpageRequest $request)
    {
        // dd($request);
        $all = $request->all();
        QuickPage::create($all);
        return back()->with('message', 'Quick Page created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = QuickPage::find($id);
        // dd($page);
        return view ('backend.quick-page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuickpageUpdateRequest $request, $id)
    {
        $page = QuickPage::find($id);
        $page->update($request->all());
       return back()->with('message', 'Quick Page updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = QuickPage::find($id);
        $page->delete();
       return back()->with('error', 'Quick Page deleted Successfully!.');
    }
}
