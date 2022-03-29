<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Requests\Slider\SliderUpdateRequest;
use App\Models\Slider;
use NabilAnam\SimpleUpload\SimpleUpload;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);

         return view('backend.Slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respons e
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {

        $all = $request->all();
        // dd($request->image);
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('sliders')
            ->save();

        Slider::create($all);

        return back()->with('message', 'Slider Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider  = Slider::find($id);
         // dd($Slider);
        return view('backend.slider.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request,Slider $slider)
    {
        $all = $request->except('_token');
        $all['image'] = (new SimpleUpload)
            ->file($request->image)
            ->dirName('sliders')
            ->deleteIfExists($slider->image)
            ->save();
        $all = $slider->update($all);
        return back()->with('message', 'Slider Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
         $slider->delete();
        return back()->with('message', 'Slider Deleted Successfully!');
    }
}
