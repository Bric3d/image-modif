<?php
/* Set the page title here */

$page_title = "Camagru";
?>
<?php require("./elements/header.php");?>

<!-- Put Page content bellow here --!>

<?php

$real = new User(1);
$not_real = new User(null);
$not_real->setVariable(['firstname' => 'John', 'lastname' => 'Wayne', 'email' => 'john@wayne.com', 'password' => '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a']);
$not_real->save();

?>

<?php include("./elements/footer.php");?>