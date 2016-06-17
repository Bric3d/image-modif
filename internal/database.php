<?php

// Conection to Mysql

function	bdd($db_dsn, $db_name, $bdd_username, $bdd_password) {
	try {
		$bdd = new PDO(
				$db_dsn .
				';dbname=' . $db_name .
				';charset=utf8',
				$bdd_username,
				$bdd_password
				);
	}
	catch( Exception $e){
		echo '<p>Couldn\'t connect to mysql, is the mysqld process running?</p>';
		echo $e->getMessage();
		exit();
	}
	return $bdd;
}
?>