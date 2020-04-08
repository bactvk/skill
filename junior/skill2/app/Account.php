<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	const PATH_IMG = "assets/img/avatar/";
    protected $table = 'accounts';

    public static function createAccount($data)
    {
    	if(!empty($data['avatar'])){
    		$file = $data['avatar'];
    		$fileName = $file->getClientOriginalName();
    		$file->move(self::PATH_IMG,$fileName);
    		$data['avatar'] = $fileName; // save on db
    	}

    	return self::insert($data);
    }
    public static function getList()
    {
    	return self::where('deleted_at',0)
                    -> latest()
                    -> paginate(5);
    }
}
