<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	const PATH_IMG = "assets/img/avatar/";
    protected $table = 'accounts';
    protected $fillable = ['id','name','status','avatar','email','deleted_at'];

    public static function findByPK($id)
    {
        return self::find($id);
    }
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
    public static function updateAccount($avatar,$data,$id)
    {
        if(!empty($data['avatar'])){
            $file = $data['avatar'];
            $fileName = $file->getClientOriginalName();
            $file->move(self::PATH_IMG,$fileName);
            $data['avatar'] = $fileName; // save on db
        }else{
            if($avatar){
                $data['avatar'] = $avatar;
            }
        }
        return self::find($id)->update($data);
    }

    public static function deleteAccount($id)
    {
        $getDataByID = self::find($id);
        if(empty($getDataByID)) abort(404);

        return $getDataByID->update(['deleted_at' => 1]);
    }
}
