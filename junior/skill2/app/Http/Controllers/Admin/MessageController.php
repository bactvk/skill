<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Message;

class MessageController extends Controller
{
	public function list()
	{
		$data['lists'] = Message::getList();
	}

    public function create(Request $request)
    {
    	$data = [
    		'receiver' => $request->input('receiver',''),
    		'subject'  => $request->input('subject',''),
    		'message'  => $request->input('message_content','')
    	];

    	if($request->isMethod('post')){
			dd($data);
    	}

    	$data['listAccount'] = Account::getAllList();

    	return view('admin.messages.create',$data);
    }
}
