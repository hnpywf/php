<?php 
include "connection.php";
session_start();
$id = $_GET['id'];


$query = "SELECT * from `comments` where file_id='" . $id ."'";
$result = mysqli_query($link, $query) or die("Error." . mysqli_error($link));



if($result){

	$rows = mysqli_num_rows($result);

	for($i=0; $i < $rows; $i++){

		$row = mysqli_fetch_row($result);

        $username = "SELECT nickname from user where user_id ='" . $row[2] . "'";
        $nickres = mysqli_query($link, $username) or die("Error." . mysqli_error($link));
        $finnick = mysqli_fetch_row($nickres);


		echo "<div class='komment'>";
		echo "<b>". mb_strtoupper($finnick[0]) . "</b>";
		echo "<p>";
		echo "<i>".$row[3]."</i>";
		echo "</br>";
		echo $row[4];
		echo "</p></div>";
	}
	
}



 ?>