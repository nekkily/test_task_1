<?php

include $_SERVER['DOCUMENT_ROOT'].'/db.php';

$name = $_POST['name'];
$comment = $_POST['comment'];
$result[] = date("H:i");
$result[] = date("d.m.Y");

$query = $link->query("INSERT INTO comments(name, time, date, comment) VALUES ('".$name."','".$result[0]."','".$result[1]."','".$comment."')"); 

print_r(json_encode($result));

exit();

?>