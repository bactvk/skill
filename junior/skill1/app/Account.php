<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'status'

    ];
	public static function findByPK($id)
	{
		return self::find($id);
	}
    public static function getList($inputs)
    {
        $query = self::where('deleted_at',0);
        if(!empty($inputs['sort'])){
            foreach($inputs['sort'] as $sortCol => $sortType){
                $query->orderBy($sortCol,$sortType);
            }
        }else{
            $query->latest();
        }
        $list = $query->paginate(4);
    	return $list;
    }

    public static function getListAccounts($page = 1)
    {
        $totalAccountsPerPage = 4;
        $from = ($page - 1)*$totalAccountsPerPage;
        return self::where('deleted_at',0)
                    ->skip($from)->take($totalAccountsPerPage)
                    ->latest()
                    ->get();
    }
    public static function createAccount($inputs){
    	if(!empty($inputs['avatar'])){
    		$file = $inputs['avatar'];
    		$fileName = $file->getClientOriginalName();
    		$file->move('assets/image/avatar/',$fileName);
    		$inputs['avatar'] = $fileName;
    	}
    	// \DB::enableQueryLog();
    	// $new = self::insert($inputs);
    	// dd(\DB::getQueryLog());

    	return self::insert($inputs);
    }
    public static function updateAccount($data,$id)
    {
    	if(!empty($data['avatar'])){
    		$file = $data['avatar'];
            $fileName = $file->getClientOriginalName();
            $file->move('assets/image/avatar/',$fileName);
            $data['avatar'] = $fileName;
    	}
    	return self::find($id)->update($data);
    }

    public static function deleteAccount($id)
    {
        $idSert = self::find($id);
        if(empty($idSert)) abort(404);
        return $idSert->delete();
    }

}
