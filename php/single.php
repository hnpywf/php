<?php 
session_start();
if (isset($_SESSION['login']))
{}
else {$_SESSION['login']='';}
 ?>
<html>
	<head>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
		<title></title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body class="pagew" style="overflow-x: hidden;">
		<div class="menu">
			<?php

 			if($_SESSION['login'] == ''){
 			 include 'header.php';
 			}
 			else
 			{
 				include 'header_log.php';
 			}
 			?>
		</div>
		<div class="fullpage">
			<div class="img_single">
				<?php 
				include('connection.php');
			    $id = $_GET['id'];


				$query = "SELECT `url` FROM `files` where file_id = '". $id ."'";
				$result = mysqli_query($link, $query) or die("Error.." . mysqli_error($link));
				if($result){
					
					$row = mysqli_fetch_row($result);
					echo "<img src='" . $row[0] . "' alt='" . $id . "' width='auto' height='100%'>";
					}
				 ?>
				
			</div>
			<div class="text_single">
				<?php 
				$pof = "SELECT `user_id` FROM favourite where file_id ='". $id ."'";
				$pof2 = "SELECT `file_id` FROM favourite where user_id ='" . $_SESSION['id'] ."'";
				$query = "SELECT `text` FROM files where file_id = '". $id ."'";
				$query1 = "SELECT sizes FROM files where file_id = '". $id ."'";
				$query2 = "SELECT `date` FROM files where file_id = '". $id ."'";
				$query3 = "SELECT `rate` FROM files where file_id = '" . $id . "'";
				$query4 = "SELECT url FROM files where file_id = '" . $id . "'";
				$result = mysqli_query($link, $query) or die("Error." . mysqli_error($link));
				$result1 = mysqli_query($link, $query1) or die("Error." . mysqli_error($link));
				$result2 = mysqli_query($link, $query2) or die("Error." . mysqli_error($link));
				$result3 = mysqli_query($link, $query3) or die("Error." . mysqli_error($link));
				$res_prof = mysqli_query($link, $pof) or die("Error." . mysqli_error($link));
				$res_prof2 = mysqli_query($link, $pof2) or die("Error." . mysqli_error($link));
				$result4 = mysqli_query($link, $query4) or die("Error." . mysqli_error($link));
 				if($result){
					$row = mysqli_fetch_row($result);
					$row1 = mysqli_fetch_row($result1);
					$row2 = mysqli_fetch_row($result2);
					$row3 = mysqli_fetch_row($result3);
					$row4 = mysqli_fetch_row($result4);
					$usid_prof = mysqli_fetch_row($res_prof);
					$rows = mysqli_num_rows($res_prof2);
					for ($i=0; $i < $rows; $i++) { 
						$flid_prof = mysqli_fetch_row($res_prof2);
						if($id = $flid_prof[$i] or $id = $flind_prof[$i+1]){
					}
					}
					$url = $row4[0];
					$userid = $_SESSION['id'];
					echo "<b style='font-size:1.3em;'> $row[0] </b>"; echo "</br>";
					echo "Max available size: $row1[0]"; echo "</br>";
					echo "Upload date: $row2[0]"; echo "</br>";
					echo "Photo rating: $row3[0]"; echo "</br>"; echo "</br>"; 
					if($_SESSION['login'] != ""){
					if ($_SESSION['id'] == $usid_prof[0] and $id = $flid_prof[0]){
						echo "<div id='addfav' class='succfavadd' style='border:none;'>Already in favourite :)</div>";
					 echo "<br>";
					echo "<a href='download.php?filename=$url'><div class='faveoz'>Download</div></a>"; echo "<br>";
					}
					else {
						echo "<div id='addfav' class='faveoz' onclick='favadd(" . $_GET['id'] .",$userid)'>Add to favourite!</div>";
						echo "<a href='download.php?filename=$url'><div class='faveoz'>Download</div></a>"; echo "<br>";
					}} else echo "<div class='succfavadd'>To download or add to fav log in first!</div>";
				} 
				 	?>
				 	<form action="vote.php" method="post">
				 		<label>Rate this photo</br></label>
				 		<input type="radio" value="1" name="vote"> 1
				 		<input type="radio" value="2" name="vote"> 2
				 		<input type="radio" value="3" name="vote"> 3
				 		<input type="radio" value="4" name="vote"> 4
				 		<input type="radio" value="5" name="vote"> 5
				 	<?php	echo "<input type='text' value=" . $_GET['id'] . " name='file_id' style='display:none;'>"; ?>
				 	</br></br><input type="submit" value="I THINK IT IS" class="subms" >
				 	</form>
			</div>

		</div>
		<?php if($_SESSION['login'] != ""){
			include "addcomm.php";
		} ?>
		<?php include "comments.php" ?>
	</body>
</html>