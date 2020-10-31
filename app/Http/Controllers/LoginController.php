<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function loginForm()
    {
    	return view('admins.login.index');
    }

    public function login(Request $request)
    {
    	$email=$request->email;
    	$password=$request->password;
    	if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {

		   return redirect(route('dashboard.index'));

		}else{
			return "email and password invalide please try again";
		}
    }
}
