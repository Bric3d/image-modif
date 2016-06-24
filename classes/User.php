<?php

class User extends Model
{
	protected $table = 'users';

	protected $fillable = ['firstname', 'lastname', 'email', 'password','created_at'];
	
	public function __construct($id){
		parent::__construct($id);
	}

	public function comments(){
		return $this->hasMany('Comment', 'id_user');
	}
}