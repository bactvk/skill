<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use Validator;
use App\Account;
use App\MailTemplate;
use Response;
use PDF;

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
            if(!empty($data['avatar'])){
                $rules['avatar'] = 'mimes:jpeg,png,jpg,gif,svg|max:1024';
            }
    		$validator = Validator::make($request->all(),$rules,$messages);
    		if(!$validator->fails()){
    			$create = Account::createAccount($data);
    			if($create) $createSuccess = true;

                //send Mail
                $condition = [
                    'email' => $data['email'],
                    'username' => str_random(5),
                    'password' => str_random(5),
                ];
                MailTemplate::sendMail($condition);

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
            if(!empty($inputs['avatar'])){
                $rules['avatar'] = 'mimes:jpeg,png,jpg,gif,svg|max:1024';
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

    public function export()
    {
        $fileName = "List_account_".date('Y-m-d');
        $headers = array(
            "Content-type"          => "text/csv;charset=UTF-8",
            'Content-Encoding: UTF-8',
            "Content-Disposition"   => "attachment; filename=$fileName.csv",
            "Pragma"                => "no-cache",
            "Cache-Control"         => "must-revalidate, post-check=0, pre-check=0",
            "Expires"               => "0"
        );
        $dataExport = Account::getAllList();
        if( count($dataExport) != 0){
            $columns = ['ID','Name' , 'Email' , 'Status'];

            $callback = function() use ($dataExport,$columns){
                $file = fopen('php://output','w');
                fputcsv($file,$columns);
                foreach($dataExport as $item){
                    if($item->status == 1) $status = "active";
                    else $status = "inactive";
                    $rows = [
                        $item->id,
                        $item->name,
                        $item->email,
                        $status,
                    ];
                    fputcsv($file,$rows);
                }
                fclose($file);
            };
            return Response::stream($callback, 200 ,$headers);
        }else{
            return redirect()->route('admin-accounts-list')->with('msgError','No result to export');
        }
    }

    public function printPdf()
    {
        $data = Account::getAllList();
        if(count($data) != 0){
            $pdf = PDF::loadView('admin.accounts.pdf',['data' => $data]);
            $fileName = "listAccount_".date("Ymd").".pdf";
            return $pdf->download($fileName);
        }else{
            return redirect()->route('admin-accounts-list')->with('msgError','No result to print');
        }
        
    }
}
