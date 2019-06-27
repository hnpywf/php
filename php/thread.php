
	<?php 
session_start();
include('connection.php');
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));

if($_SESSION['status'] == "user"){
$query = "SELECT `url` FROM `files` where private = 0";
$query2 = "SELECT file_id FROM files where private = 0";
}
else{
	$query = "SELECT `url` FROM `files` where 1";
    $query2 = "SELECT file_id FROM files where 1";
    
}



$result = mysqli_query($link, $query)  or die("Error." . mysqli_error($link));
$result2 = mysqli_query($link, $query2) or die("Error." . mysqli_error($link));

if ($result){
	$rows = mysqli_num_rows($result);
    $rows2 = mysqli_num_rows($result2);
	
	for ($i=0; $i < $rows; $i++){
		$row = mysqli_fetch_row($result);
		$row2 = mysqli_fetch_row($result2);
		
		$id = $row2[0];

        $query3 = "SELECT * FROM files where private = 1 and file_id='$id'";
        $result3 = mysqli_query($link, $query3) or die("Error." . mysqli_error($link));
        $priv = mysqli_fetch_row($result3);

		echo "<div class='post'>";
		if($_SESSION['status'] == "MainAdmin" or $_SESSION['status'] == "Admin" or $_SESSION['status'] == "Moderator"){
			echo "<div class='textAdm_main'>";
			if($_SESSION['status'] == "MainAdmin" or $_SESSION['status'] == "Admin"){
		echo "<span class='textAdm' onclick='deletepost($id)'>Delete</span>";}
		if($priv[0] != 0)
			{echo "<span style class='textAdm' onclick='makepublic($id)'>Make public</span></div>";}
		else {echo "<span style class='textAdm'>Already published :)</span></div>";}
	    
	    }
		echo "<a href='single.php?id=$id'>";
        echo "<img width='auto' height='100%' style='overflow:hidden;' src ='".$row[0]."'></a>";
		echo "</div>";
	}
	mysqli_free_result($result);
	mysqli_free_result($result2);
}

 ?>

