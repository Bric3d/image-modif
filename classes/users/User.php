<?php

class User extends Model
{
	protected $table = 'users';

	protected $fillable = array('firstname', 'lastname', 'email', 'password','created_at');
	
	public function __construct($id){
		parent::__construct($id);
	}
}