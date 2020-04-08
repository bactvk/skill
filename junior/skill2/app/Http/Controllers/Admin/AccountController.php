<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use Validator;
use App\Account;

class AccountController extends Controller
{
    public function list()
    {
    	$lists = Account::getList();
    	return view('admin.accounts.list',
    		['lists' => $lists]);
    }

    public function create(Request $request)
    {
    	$createSuccess = false;
    	$data = [
    		'name' => $request->input('name',''),
    		'email' => $request->input('email',''),
    		'avatar' => $request->avatar,
    		'status' => $request->input('status')
    	];
    	
    	if($request->isMethod('post')){
    		$accountRequest = new AccountRequest;
    		$rules = $accountRequest->rules();
    		$messages = $accountRequest->messages();

    		$rules['email'] = 'required|email|unique:accounts,email';
    		$validator = Validator::make($request->all(),$rules,$messages);
    		if(!$validator->fails()){
    			$create = Account::createAccount($data);
    			if($create) $createSuccess = true;
    		}else{
    			$data['ErrMsg'] = $this->_buildErrorMessages($validator);
    		}
    	}
    	
    	if($createSuccess) return redirect()->route('admin-accounts-list')->with('msg','Create successfuly');
    	return view('admin.accounts.create',$data);
    }
}
