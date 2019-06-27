<?php 
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));
 ?>


 <html>
 	<head>
 		<title>BeViF</title>
 		<script src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
 		<link rel="stylesheet" href="css/main.css" type="text/css" />



 	</head>
 	<body class="ined" style="overflow: hidden;">
 		
 		<div class="menu">
 			<?php
 			 include 'header.php';
 			?>
 		</div>
 		<div class="cap"></div>
 		<div id="origi" opendiv=""></div>
 		<p class="text_ind">Welcome to our little land</p>
 		<div id="logw" iddiv="box_1" class="button">Get started</div>
 		<div class="box_ob">
        <p class="text_ind1">We were waitin' only for you, darling</br>
        so, what are YOU waitin' for?</p>
 			<div class="box"></div></div>
 			

 			 
    
 	</body>
 	
 </html>


 <?php 
 mysqli_close($link);
  ?>