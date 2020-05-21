<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    protected $fillable = [
        'status'
    ];
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
        $lists = $query->where('receiver',Auth::user()->id)->paginate(5);
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
    public static function findByPK($id)
    {
        return self::find($id);
    }
    public static function deleteMesage($id)
    {
        return self::find($id)->delete();
    }

    public static function getMessageNotSeen($auth_id)
    {
        return self::where(function($q) use ($auth_id){
            $q -> where('messages.receiver',$auth_id)
               -> where('messages.status',0)
               -> where('messages.deleted_at',0);
        })->leftJoin('accounts','accounts.name','=','messages.sender')->select("messages.id","messages.subject","messages.created_at","messages.sender","messages.content","accounts.name","accounts.avatar")->get();
    }
}
