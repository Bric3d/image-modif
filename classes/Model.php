<?php

include_once('./internal/database.php');
include_once('./config/config.php');

class Model
{

	protected $vars = array();

	public function __construct($id)
	{
		global $bdd;
		if ($id !== null){
			$this->vars['id'] = $id;
			$query = $bdd->prepare("SELECT * FROM $this->table WHERE id = $id");
			$query->execute();
			$data = $query->fetchAll();
			foreach($this->fillable as $value){
				$this->vars[$value] = $data[0][$value];
			}
		}
		else {
			$this->vars['id'] = null;
			foreach($this->fillable as $value){
				$this->vars[$value] = null;
			}
		}
	}

	/*
	 * Takes in arrays, such as ['valueName' => 'value', 'valueName2' => 'value2', ...]
	 */

	public function setVariable($array)
	{
		foreach($array as $valueName => $value)
			$this->vars[$valueName] = $value;
	}

	public function getVariable($name)
	{
		if (array_key_exists($name, $this->vars))
			return $this->vars[$name];
		else
			return null;
	}

	public function getFillable()
	{
		return $this->fillable;
	}

	public function getTable(){
		return $this->table;
	}

	public function hasMany($class_name, $id_name){
		$class = new $class_name(null);
		$table = $class->getTable();
		if ($this->getVariable($table) === null) {
			$this_id = $this->getVariable('id');
			$query = "SELECT id FROM $table WHERE $id_name = $this_id";
			try {
				global $bdd;
				$cmd = $bdd->prepare($query);
				$cmd->execute();
				$data = $cmd->fetchAll();
				error_log($cmd->rowCount() . " records found successfully\n");
				$values = array();
				foreach ($data as $id) {
					$values[] = new $class_name($id['id']);
				}
				$this->setVariable(["$table" => $values]);
				return ($values);
			}
			catch (PDOException $e) {
				error_log("\e[91m" . $query . $e->getMessage() . "\n");
			}
		}
	}

	public function save() {
		$i = 0;
		if (($id = $this->vars['id']) !== null) {
			$query = "UPDATE $this->table SET";
			foreach($this->fillable as $valueName) {
				$value = $this->vars[$valueName];
				if ($i <= 0)
					$query = $query . " $valueName='$value'";
				else
					$query = $query . ", $valueName='$value'";
				$i++;
			}
			$query = $query . " WHERE id = $id";
		}
		else {
			$query = "INSERT INTO $this->table (";
			foreach ($this->fillable as $value){
				if ($this->getVariable($value) !== null) {
					if ($i <= 0)
						$query = $query . "$value";
					else
						$query = $query . ", $value";
					$i++;

				}
			}
			$i = 0;
			$query = $query . ")";
			foreach ($this->fillable as $valueName){
				if ($this->getVariable($valueName) !== null) {
					$value = $this->vars[$valueName];
					if ($i <= 0)
						$query = $query . " VALUES ('$value'";
					else
						$query = $query . ", '$value'";
					$i++;
				}
			}
			$query = $query . ")";
		}
		if ($i <= 0) {
			error_log("\e[91m Tried to save an empty Model\n");
			return;
		}
		try {
			global $bdd;
			$cmd = $bdd->prepare($query);
			$cmd->execute();
			error_log($cmd->rowCount() . " records saved successfully\n");
		}
		catch (PDOException $e) {
			error_log("\e[91m" . $query . $e->getMessage() . "\n");
		}
	}
}