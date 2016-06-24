<?php
/* Set the page title here */

$page_title = "Camagru";
?>
<?php require("./elements/header.php");?>

<!-- Put Page content bellow here --!>

<?php

$real = new User(1);
$picture = new Picture(1);
$comment = new Comment(8);
$comment->setVariable(['text' => 'efefeefefefef']);
$comment->save();
dd($real, '<br>', $picture, '<br>', $comment);


?>

<?php include("./elements/footer.php");?>