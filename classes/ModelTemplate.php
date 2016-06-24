<?php

class ModelTemplate extends Model
{
	protected $table = '';

	protected $fillable = [];

	public function __construct($id)
	{
		parent::__construct($id);
	}
}