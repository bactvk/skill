<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
	public function list()
	{

		$time_start = microtime(true); 
		$data['lists'] = Message::getList();
		// foreach($data['lists'] as $key => $item){
		// 	var_dump($item->name );
		// }
		// $time_end = microtime(true);
		// $execution_time = ($time_end - $time_start)/60;
		// dd($execution_time);

		return view('admin.messages.list',$data);

	}

    public function create(Request $request)
    {


    	$data = [
    		'receiver' => $request->input('receiver',''),
    		'subject'  => $request->input('subject',''),
    		'content'  => str_replace("&#39;","'",$request->input('message_content','')),
    		'account_id' => Auth::user()->id,
    	];

    	if($request->isMethod('post')){
    		$this->validateMessage($request);
			$newMessage = Message::createMessage($data);
			if($newMessage) return redirect()->route('admin-messages-list')->with('msg','Create successfuly');
    	}

    	$data['listAccount'] = Account::getAllList();

    	return view('admin.messages.create',$data);
    }

    public function view($id)
    {
    	$message = Message::findByPK($id);
    	if(empty($message)) abort('404');

    	return view('admin.messages.view',$message);

    }
    public function validateMessage($request)
    {
    	$validatedData = $request->validate([
    		'receiver' => 'required',
    		'subject' => 'required',
    	]);
    }
}
