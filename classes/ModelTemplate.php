<?php

/**
 * Created by PhpStorm.
 * User: bbecker
 * Date: 6/23/16
 * Time: 3:23 PM
 */
class ModelTemplate extends Model
{
	protected $table = '';

	protected $fillable = array();

	public function __construct($id)
	{
		parent::__construct($id);
	}
}