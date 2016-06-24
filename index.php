<?php
/* Set the page title here */

$page_title = "Camagru";
?>
<?php require("./elements/header.php");?>

<!-- Put Page content bellow here --!>

<?php

$real = new User(1);
$cpy = $real;
$cpy->setVariable(['firstname' => 'Brice', 'lastname' => 'Becker', 'email' => 'brice@b3cker.fr']);
$cpy->save();
$real = new User(1);
dd($user);

?>

<?php include("./elements/footer.php");?>