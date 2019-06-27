<?php 


$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));
 ?>

<html>
 <head>
 	<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
 		<link rel="stylesheet" href="css/main.css" type="text/css" />
 </head>
	<body>
		<div style="display: flex; justify-content: space-between; align-items: center;">
		<ul class="headee">
			<li><a class="linke" href="profile.php">MY PROFILE</a></li>
			<li><a class="linke" href="page.php">THREAD</a></li>
			<li><a class="linke" href="toppics.php">TOP PICS</a></li>
		</ul>
		
		<form method="POST" action="search.php" style="padding-top: 2.2vh; margin-left: -20vh;"><input type="text" size="18" maxlength="30" name="searchpar" placeholder="Search">
			<input type="submit" value="OK" name="dead" class="subms"></form>
			
			
			
		</form>
		<form method="POST" action="upload.php" style="padding-top: 2.2vh; margin-left: -20vh;" ENCTYPE="multipart/form-data">
            <input type="text" name="texter" placeholder="Name of the file" required>
			<input type="file" name="userfile"; accept="image/x-png,image/gif,image/jpeg">
			<input type="submit" class="subms">
		</form>

		<div style="margin-right: 20px; "><span style="cursor: pointer;" class="linke"><a href="logout.php" style="color:black">LOG OUT</a></span></div>
		</div>
		<?php include "boxing.php"; ?>
	</body>
</html>