<?php

$db_host = 'localhost';
$db_name = 'comments';
$db_username = 'root';
$db_password = '';


$mysqli_connection = new mysqli($db_host, $db_username, $db_password);
if ($mysqli_connection->connect_error) {
    die("Подключение не удалось: " . $mysqli_connection->connect_error);
} 

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $db_host, 
   $db_username, 
   $db_password, 
   $db_name
);

?>