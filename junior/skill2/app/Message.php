<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function getList($inputs = [])
    {
        $query = self::where('messages.deleted_at',0);
        if(!empty($inputs)){
            foreach($inputs as $colSort => $typeSort){
                $query->orderBy($colSort,$typeSort);
            }
        }else{
            $query -> orderBy('messages.created_at','desc');
        }
        $lists = $query->leftJoin("accounts","accounts.id","=","messages.receiver")->paginate(20);
        // $lists = $query->paginate(20);
    	return $lists;
            
    }

    public static function createMessage($data)
    {    
        return self::insert($data);   
    }

    public function getAccount()
    {
        
        return  $this->belongsTo(Account::class,'receiver','id')->first();
        
    }
    
}
