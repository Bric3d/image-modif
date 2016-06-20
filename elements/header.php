<?php 
/* Set $page_title in the file including this one 	*/

/* Put Header content below							*/
 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="./public/style.css">
	<link rel="icon" href="<?php if ($favicon != null) echo $favicon; else echo './public/favicon.ico'?>">
	<meta charset="UTF-8">
</head>
<body>
	<header>
		<div>
			<h1>Yeh</h1>
		</div>
		<div class="header-menu">
			<a href="./login.php" class="header-button"><p>Login</p></a>
			<a href="./login.php" class="header-button"><p>Login</p></a>
			<a href="./login.php" class="header-button"><p>Login</p></a>
		</div>
	</header>