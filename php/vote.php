<?php
session_start();
include "connection.php";
$idf = $_POST['file_id'];

$query1 = "SELECT rate from files where file_id='".$idf."'";

$result1 = mysqli_query($link, $query1) or die("Error." . mysqli_error($link));

if($result1){
	$row1 = mysqli_fetch_row($result1);
	$rates = $row1[0];
	
}
$voted = $_POST['vote'];

if($rates == 0){
$ratefull = $voted;
}
else{
$ratefull = ($voted + $rates)/2;
}


$insert = "UPDATE files set rate = '$ratefull' where file_id='".$idf."'";
mysqli_query($link, $insert);


echo "<meta http-equiv='refresh' content='0;URL=single.php?id=$_POST[file_id]' />";

 ?>
