<?php

class Model
{
	private $table = '';
	
	private $fillable = array();

	private vars = array();

	public function __construct($id)
	{
		if ($id){
			$this->vars['id'] = $id;
			$conn = bdd($db_dsn, $db_name, $bdd_username, $bdd_password));
			$data = $bdd->exec("SELECT * FROM $table WHERE id = $id");
			foreach($this->fillable as $value){
				$this->vars[$value] = $data[$value];
			}
		}
	}

	public function setVariable($name, $var)
	{
		$this->vars[$name] = $var;
	}

	public function getVariable($name)
	{

	}
}