<?php
/* Set the page title here */

$page_title = "Camagru";
?>
<?php require("./elements/header.php");?>

<!-- Put Page content bellow here --!>
<?php
$conn = bdd($db_dsn, $db_name, $bdd_username, $bdd_password);
$data = $bdd->query("SELECT * FROM users WHERE id = 1");
$data->execute();
$data = $data->fetchAll();

$fillable = array('firstname', 'lastname', 'email', 'password', 'created_at');
$vars = array();
foreach($fillable as $value) {
	$vars[$value] = $data[0][$value];
}
dd($vars);


?>

<?php include("./elements/footer.php");?>