<?php 	
session_start();
include "connection.php";
if(isset($_POST['file_id'])){
	$fqid = $_POST['file_id'];
	$query = "DELETE FROM `files` where file_id='$fqid'";
	mysqli_query($link, $query);
}
include 'page.php';

 ?>