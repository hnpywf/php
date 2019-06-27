<?php 
session_start();
if (isset($_SESSION['login']))
{}
else {$_SESSION['login']='';}
 ?>

<html>
	<head>
		<script src="js/main.js"></script>
		<title>Ur profile</title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body style="background-color: gray; overflow: hidden;">
		<div class="menu"><?php
 			if($_SESSION['login'] == ''){
 			 include 'header.php';
 			}
 			else
 			{
 			include 'header_log.php';
 			}
 			?></div>
		<div class="profile">
			<div class="profpic">
				<?php 
				require_once 'connection.php';
                $link = mysqli_connect($host, $user, $password, $database) 
                or die("Error." . mysqli_error($link));				

                $query = "SELECT avatar from user where nickname='".$_SESSION['login']."'";
                $result = mysqli_query($link,$query) or die('Error.' . mysqli_error($link));
                if($result){
                	$row = mysqli_fetch_row($result);

                	echo "<img src='". $row[0] ."' alt='Missed file.'>";
                }

                 ?>

			</div>
			<div class="profdata">
				<?php 
				require_once 'connection.php';
                $link = mysqli_connect($host, $user, $password, $database) 
                or die("Error." . mysqli_error($link));				

                $query = "SELECT * from user where nickname='".$_SESSION['login']."'";
                $result = mysqli_query($link,$query) or die('Error.' . mysqli_error($link));
                if($result){
                	$row = mysqli_fetch_row($result);

                	echo "</br></br>
                 <span class='prof_text'>Hello, <b>". strtoupper($_SESSION['login']) ."</b></span></br>
                 <span class='prof_text'>U have a <b>". strtoupper($_SESSION['status']) ."</b> privileges</span></br>
                 <span class='prof_text'>Ur email is <b>". strtoupper($_SESSION['email']) ."</b></span></br>
                 <span class='prof_text'>Ur fullname is <b>". strtoupper($_SESSION['fullname']) ."</b></span></br>";
                }

                 ?>
                 

			</div>
			<div class="proffav">
				<?php 
                                $userid = $_SESSION['id'];
                                $query = "SELECT url from files join favourite where files.file_id = favourite.file_id and favourite.user_id = $userid order by favourite.file_id";
                                $query2 = "SELECT file_id FROM favourite where user_id=$userid order by file_id";
                                $result = mysqli_query($link, $query) or die('Error.' . mysqli_error($link));
                                $result2 = mysqli_query($link, $query2) or die("Error." . mysqli_error($link));
                                if($result){
                                        $rows = mysqli_num_rows($result);
                                        for ($i=0; $i < $rows; $i++) { 
                                        $row = mysqli_fetch_row($result);
                                        $row2 = mysqli_fetch_row($result2);
                                        $id = $row2[0];
                                        echo "<div class='littlefav'><a href='single.php?id=$id'>";
                                        echo "<img src='$row[0]'>";
                                        echo "</a></div>";
                                        }
                                }
                                 ?>
                                
			</div>
		</div>
	</body>
</html>