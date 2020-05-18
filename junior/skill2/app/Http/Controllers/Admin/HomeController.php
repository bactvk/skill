<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function home(){
		return view('admin.pages.home');
	}
    
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }
}
