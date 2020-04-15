<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)  //admin123
    {
    	if($request->isMethod('post')){
    		$username = $request->userName;
    		$pass = $request->password;
    		
    		if( Auth::guard('admin') -> attempt(['username' => $username,
    			'password' => $pass]) ){
    			return redirect()->route('admin-home');
    		}else{
    			return view('admin.pages.login')->with('error','Username and password is not correct');
    		}
    	}
        return view('admin.pages.login');
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin-login');
    }
}
