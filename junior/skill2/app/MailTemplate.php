<?php

namespace App;
use Mail;


class MailTemplate
{
    public static function sendMail($condition = [])
    {
    	Mail::send(
    		'admin.mail_template.signUpAccount',
    		array(
    			'data' => $condition
    		),
    		function ($message) use ($condition){
    			$message->to($condition['email'])
    					->subject("Send information sigup");
    		}
    	);	
    }
}
