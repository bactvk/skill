<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{

	// use Notifiable;

	protected $rememberTokenName = false;
	
    protected $table = "admin";
    protected $hidden = [];

     
  

}
