<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admins.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->logo)) {
            $fileName = time() .'.'.$request->logo->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
           
        ]);

        $setting = new Setting();
        $setting->title=$request->title;
        $setting->description=$request->description;
    
         if (!empty($request->logo)) {
            $setting->logo=$fileName;
            $request->logo->move(public_path('/assets/uploads/setting'),$fileName);
        }
        if($setting->save()){
            
            return redirect(route('dashboard.setting.index'));
        }else{
            return redirect()->back();
        } //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admins.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if (!empty($request->logo)) {
            $fileName = time() .'.'.$request->logo->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
           
        ]);

        $setting = Setting::find($id);
        $setting->title=$request->title;
        $setting->description=$request->description;
    
         if (!empty($request->logo)) {
            $setting->logo=$fileName;
            $request->logo->move(public_path('/assets/uploads/setting'),$fileName);
        }
        if($setting->save()){
            
            return redirect(route('dashboard.setting.index'));
        }else{
            return redirect()->back();
        } //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect(route('dashboard.setting.index'));
    }
}
