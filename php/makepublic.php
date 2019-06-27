<?php 
session_start();
include "connection.php";
if(isset($_POST['file_id'])){
	$fqid = $_POST['file_id'];
	$query = "UPDATE `files` set private = 0 where file_id='$fqid'";
	echo $query;
	mysqli_query($link, $query);
}
include 'page.php';



 ?>