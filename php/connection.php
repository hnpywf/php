<?php 
$host = '127.0.0.1:3306';
$database= 'php_2'; 
$user = 'hnpywf'; 
$password = '199966qwe';

$link = mysqli_connect($host, $user, $password, $database) or die("Error." . mysqli_error($link));
?>
