<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use Validator;
use App\Account;

class AccountController extends Controller
{
    public function list(Request $request)
    {
    	$inputs['sort'] = $request->input('sort');
    	$inputs['lists'] = Account::getList($inputs['sort']);
    	return view('admin.accounts.list',$inputs);
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

    public function edit(Request $request,$pk)
    {
    	$data = Account::findByPK($pk);
    	$update = false;
    	if(empty($data)) abort(404);

    	if($request->isMethod('post')){
    		$inputs = [
    			'name' => $request->input('name',''),
	    		'email' => $request->input('email',''),
	    		'avatar' => $request->avatar,
	    		'status' => $request->input('status')
    		];

    		$accountRequest = new AccountRequest();
    		$rules = $accountRequest->rules();
    		$messages = $accountRequest->messages();
    		$rules['email'] = 'required|email';
    		if($inputs['email'] != $data['email']){
    			$rules['email'] .= '|unique:accounts,email';
    		}

    		$validator = Validator::make($inputs,$rules,$messages);
    		if(!$validator->fails()){
    			$update = Account::updateAccount($data['avatar'],$inputs,$pk);
    		}else{
    			$data['ErrMsg'] = $this->_buildErrorMessages($validator);
    		}

    		if($update) return redirect()->route('admin-accounts-list')->with('msg','Update successfuly');

    	}
    	return view('admin.accounts.edit',$data);
    }

    public function delete($id)
    {
        $deleteSuccess = Account::deleteAccount($id);
        if($deleteSuccess) return redirect()->route('admin-accounts-list')->with('msg','Delete successfuly');
    }
}
