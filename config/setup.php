<?php

include_once('config.php');
try {
    $conn = new PDO("$db_dsn", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $db_name";
    // use exec() because no results are returned
    $conn->exec($sql);
	$conn = null;
    echo "Database created successfully\n";

	$conn = new PDO(
		$db_dsn .
		';dbname=' . $db_name .
		';charset=utf8',
		$bdd_username,
		$bdd_password
	);
	$sql = "CREATE TABLE users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50) UNIQUE NOT NULL,
		password VARCHAR(250) NOT NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
	$conn->exec($sql);
	$conn = null;
	echo "Users Table created successfully\n";

	$conn = new PDO(
		$db_dsn .
		';dbname=' . $db_name .
		';charset=utf8',
		$bdd_username,
		$bdd_password
	);
	$sql = "CREATE TABLE pictures (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id INT(6) UNSIGNED NOT NULL,
		FOREIGN KEY (user_id) REFERENCES users(id),
		filename VARCHAR(34) NOT NULL,
		title VARCHAR(30),
		text VARCHAR(140),
		created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
	$conn->exec($sql);
	$conn = null;
	echo "Pictures Table created successfully\n";

	$conn = new PDO(
		$db_dsn .
		';dbname=' . $db_name .
		';charset=utf8',
		$bdd_username,
		$bdd_password
	);
	$sql = "CREATE TABLE comments (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id INT(6) UNSIGNED NOT NULL,
		FOREIGN KEY (user_id) REFERENCES users(id),
		picture_id INT(6) UNSIGNED NOT NULL,
		FOREIGN KEY (picture_id) REFERENCES pictures(id),
		text VARCHAR(140) NOT NULL,
		created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
	$conn->exec($sql);
	$conn = null;
	echo "Comments Table created successfully\n";

}
catch(PDOException $e)
{
    echo $sql . $e->getMessage();
}
?>