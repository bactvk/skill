<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\AccountRequest;
use Validator;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $inputs = [
            'sort' => $request->input('sort',[]) //input name = "sort[]" is create by js
        ];
    	$inputs['lists'] = Account::getList($inputs);

    	return view('accounts.list',$inputs);
    }

    public function add(Request $request)
    {
        $new = false;
        $datas = [];
    	$inputs = [
    		'name' => $request->input('name',''),
    		'email' => $request->input('email',''),
    		'avatar' => $request->avatar,
    		'status' => $request->input('status',1),
    	];

    	if($request->isMethod('post')){
            $accountRequest = new AccountRequest();
            $rules = $accountRequest->rules();
            $messages = $accountRequest->messages();
            $rules['email'] = 'required|email|unique:accounts,email';

            $validator = Validator::make($request->all(),$rules,$messages);
            if(!$validator->fails()){
                $new = Account::createAccount($inputs);
               
            }else{
                $inputs['errMsg'] = $this->_buildErrorMessages($validator);
                // dd($inputs['errMsg']);
            }

    		
            if($new)  return redirect()->route('account')->with('msg','Add successfuly');

    	}
    	return view('accounts.add',$inputs);
    }

    public function edit(Request $request,$id)
    {
    	$data = Account::findByPK($id);
        $update = false;
    	if(empty($data)) abort(404);
    	if($request->isMethod('post')){
    		$inputs = [
    			'name' => $request->input('name',''),
	    		'email' => $request->input('email',''),
	    		'avatar' => $request->avatar,
	    		'status' => $request->input('status',1)
    		];

            $accountRequest = new AccountRequest();
            $rules = $accountRequest->rules();
            $messages = $accountRequest->messages();
            $rules['email'] = 'required|email';
          
            if($inputs['email'] != $data['email']){
                $rules['email'].= '|unique:accounts,email';
            }
            $validator = Validator::make($request->all(),$rules,$messages);
            if(!$validator->fails()){
                $update = Account::updateAccount($data['avatar'],$inputs,$id);
            }else{
                $data['errorMsg'] = $this->_buildErrorMessages($validator);
            }

    		
            if($update) return redirect()->route('account')->with('msg','Edit successfuly');
    	}
    	return view('accounts.edit',$data);
    }

    public function delete($id)
    {
        $delete = Account::deleteAccount($id);
        if($delete) return redirect()->route('account')->with('msg','Delete successfuly');

    }


    public function getListAccounts(Request $request)
    {
        $page = $request->page;
        $lists = Account::getListAccounts($page);
        return response()->json($lists);
    }

}
