<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\LoginRequest;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $data = [
            'username' => $request->input('username',''),
            'password' => $request->input('password',''),
            
        ];

    	if($request->isMethod('post')){
    		$username = $request->userName;
    		$pass = $request->password;
    		
            $loginRequest = new LoginRequest;
            $rules = $loginRequest->rules();
            $messages = $loginRequest->messages();

            $rules['captcha'] = 'required|captcha';
            

            $validator = Validator::make($request->all(),$rules,$messages);

            if(!$validator->fails()){
                if( Auth::guard('admin') -> attempt($data) ){
                    return redirect()->route('admin-home');
                }else{ }

            }else{
                $data['ErrMsg'] = $this->_buildErrorMessages($validator);
            }
    		
    	}
        return view('admin.pages.login',$data);
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin-login');
    }
}
