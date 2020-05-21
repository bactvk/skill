<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\LoginRequest;
use Validator;
use App\Account;

class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $data = [
            'name' => $request->input('username',''),
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
                if( Auth::attempt($data) ){
                    return redirect()->route('admin-home');
                }else{ 
                    $data['ErrMsg'][0] = 'Username or password incorrect!';
                }

            }else{
                $data['ErrMsg'] = $this->_buildErrorMessages($validator);
            }
    		
    	}
        return view('admin.pages.login',$data);
    }

    public function signup(Request $request)
    {
        $data = [
            'name' => $request->input('username',''),
            'password' => $request->input('password',''),
            'email' => $request->input('email',''),
        ];
        
        if($request->isMethod('post')){
            $loginRequest = new LoginRequest;
            $rules = $loginRequest->rules();
            $messages = $loginRequest->messages();
            $rules['email'] = "required|unique:accounts|email";

            $validator = Validator::make($request->all(),$rules,$messages);
            if(!$validator->fails()){
                $newAccount = Account::createAccount($data);
                if($newAccount) return redirect()->route('admin-login')->with('msg','Signup success');
                else{}

            }else{
                $data['ErrMsg'] = $this->_buildErrorMessages($validator);
            }
        }
        
        return view('admin.pages.signup',$data);
        
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('admin-login');
    }
}
