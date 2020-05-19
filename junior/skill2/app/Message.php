<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function getList($inputs = [])
    {
        $query = self::where('deleted_at',0);
        if(!empty($inputs)){
            foreach($inputs as $colSort => $typeSort){
                $query->orderBy($colSort,$typeSort);
            }
        }else{
            $query -> latest();
        }
        $lists = $query -> get();//paginate(5);
    	return $lists;
            
    }
}
