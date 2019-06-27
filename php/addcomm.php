<?php session_start();  ?>
<html>
	<body>
		<form action="addcomm.php?id=<?= $_GET['id']?>" class="kommentadd" method="POST">
			<input type="text" name="title" maxlength="10" size="12" required placeholder="Title"> 
			<p>
			<textarea name="fulltext" cols="184" rows="10" placeholder="Thats awesome!"></textarea>
			<br>
			<br>
			<input type="submit" class="subms">
		</form>
	</body>
</html>



<?php
if($_SESSION['login'] != "" and isset($_POST['fulltext'])){
include "connection.php";

$file_id = $_GET['id'];

$query = "INSERT INTO `comments` (`file_id`, `user_id`, `text`, `addings`, `rating`) VALUES ('". $file_id ."', '".$_SESSION['id']."', '". $_POST['title'] ."', '". $_POST['fulltext'] ."', '0');";

mysqli_query($link, $query);

echo "<meta http-equiv='refresh' content='0;URL=single.php?id=$_GET[id]' />";

}
 ?>

