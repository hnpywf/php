<?php 
session_start();
echo print_r($_POST);
include('connection.php');
if(isset($_POST['user_id'])){
	$id = $_POST['file_id'];
	$user_id = $_POST['user_id'];
	$query = "INSERT INTO `favourite`(`user_id`, `file_id`) VALUES ('$user_id','$id')";
	echo $query;
	mysqli_query($link, $query);
	
}

 ?>