<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	protected $primaryKey = 'user_id';
	public $timestamps = false;
	protected $table = 'role_user';
	protected $fillable = [
		'user_id', 'role_id'
	];

    	/*
    	* Method untuk yang mendefinisikan relasi antara model user dan model Role
    	*/ 
    	public function getUserObject()
    	{
    		return $this->belongsToMany(User::class);
    	}
}
