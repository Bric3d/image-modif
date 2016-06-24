<?php

class Comment extends Model
{
	protected $table = 'comments';

	protected $fillable = ['user_id', 'picture_id', 'text', 'created_at', 'updated_at'];

	public function __construct($id)
	{
		parent::__construct($id);
	}
}