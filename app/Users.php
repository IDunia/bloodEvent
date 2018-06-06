<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Users extends Model
{
     public function setPasswordAttribute($value)
	{
    $this->attributes['password'] = Hash::make($value);
	}

	protected $fillable = ['email','first_name','surname','password','role'];

}

