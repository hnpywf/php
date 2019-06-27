<?php  
session_start();
if (isset($_SESSION['login']))
{}
else {$_SESSION['login']='';}



require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));

     ?>

<html>
	<head>
		<script src="js/main.js"></script>
		<title>Thread</title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body class="pagew">
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
<div class="data">
	<?php  
			include 'thread.php';
    ?>
		</div>


	</body>

</html>


 <?php 
 mysqli_close($link);
  ?>