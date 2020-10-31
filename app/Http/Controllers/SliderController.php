<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admins.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->image)) {
            $fileName = time() .'.'.$request->image->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
           
        ]);

        $slider = new Slider();
        $slider->title=$request->title;
        $slider->content=$request->content;
       
         if (!empty($request->image)) {
            $slider->image=$fileName;
            $request->image->move(public_path('/assets/uploads/slider'),$fileName);
        }
        if($slider->save()){
            
            return redirect(route('dashboard.slider.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $slider = Slider::find($id);
       return view('admins.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        if (!empty($request->image)) {
            $fileName = time() .'.'.$request->image->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
           
        ]);

        $slider = Slider::find($id);
        $slider->title=$request->title;
        $slider->content=$request->content;
       
         if (!empty($request->image)) {
            $slider->image=$fileName;
            $request->image->move(public_path('/assets/uploads/slider'),$fileName);
        }
        if($slider->save()){
            
            return redirect(route('dashboard.slider.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if($slider->delete()){
            
            return redirect(route('dashboard.slider.index'));
        }else{
            return redirect()->back();
        }
    }
}
