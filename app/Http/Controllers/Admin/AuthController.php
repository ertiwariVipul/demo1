<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    public function login(){
        if(Auth::user() && Auth::user()->hasRole('admin')){
    		return redirect()->route('admin.index');
    	}else{
    		return view('admin.auth.login');
    	}
    }
    public function forgetPassword(){
        return view('admin.auth.recover_password');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request,[
	        'email' => 'required|email',
	        'password' => 'required|min:6',
	    ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
	    {	
            if(Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')){
	    	  return redirect()->route('admin.index');
            }      
            Session::flash('error', 'Invalid Credential'); 
            return redirect()->back()->withInput();
	    }
	    Session::flash('error', 'Oops! Something went wrong'); 
	    return redirect()->back()->withInput();
    }

    public function logout(Request $id) {
		Auth::logout();
		return redirect('/admin/login');
	}
}
