<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)  //admin12
    {
    	if($request->isMethod('post')){
    		dd($request->all());
    	}
        return view('admin.pages.login');
    }
}
