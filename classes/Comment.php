<?php

class Comment extends Model
{
	protected $table = ['user_id', 'picture_id', 'text', 'created_at', 'updated_at'];

	protected $fillable = array();

	public function __construct($id)
	{
		parent::__construct($id);
	}
}