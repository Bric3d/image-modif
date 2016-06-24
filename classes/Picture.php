<?php

class Picture extends Model
{
	protected $table = 'pictures';

	protected $fillable = ['user_id', 'filename', 'title', 'text', 'created_at', 'updated_at'];

	public function __construct($id)
	{
		parent::__construct($id);
	}
}