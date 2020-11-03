<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admins.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->profile)) {
            $fileName = time() .'.'.$request->profile->getClientOriginalName();
        }
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->dob=$request->dob;
        $user->education=$request->education;
         if (!empty($request->profile)) {
            $user->profile=$fileName;
            $request->profile->move(public_path('/assets/uploads/profile'),$fileName);
        }
        if($user->save()){
            
            return redirect(route('dashboard.users.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admins.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admins.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->profile)) {
            $fileName = time() .'.'.$request->profile->getClientOriginalName();
        }
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->education=$request->education;
         if (!empty($request->profile)) {
            $user->profile=$fileName;
            $request->profile->move(public_path('/assets/uploads/profile'),$fileName);
        }
        if($user->save()){
            
            return redirect(route('dashboard.users.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            return redirect(route('dashboard.users.index'));
        }else{
            return redirect()->back();
        }
    }

    public function editProfile()
    {
        return view('admins.users.profile');
    }

    public function updateProfile(Request $request)
    {
       if (!empty($request->profile)) {
            $fileName = time() .'.'.$request->profile->getClientOriginalName();
        }
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $id = Auth::User()->id;
        $user = User::find($id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->education=$request->education;
         if (!empty($request->profile)) {
            $user->profile=$fileName;
            $request->profile->move(public_path('/assets/uploads/profile'),$fileName);
        }
        if($user->save()){
            
            return redirect(route('dashboard.users.index'));
        }else{
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('dashboard.users.index'));
    }
}
