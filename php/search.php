<?php session_start(); ?>
<html>
	<head>
		<script src="js/main.js"></script>
		<title>Thread</title>
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body class="pagew">
		<div class="menu">
 			<?php include 'header.php' ?>
 		</div>
<div class="data">
	<?php 
	include "connection.php";
	$link = mysqli_connect($host, $user, $password, $database)
	 or die("Error." . mysqli_error($link));

     $sear = '/^[A-Z]{1}[a-z]{1,19}$/';
     $_POST['searchpar'] = mb_strtoupper(mb_substr($_POST['searchpar'], 0, 1)) . mb_substr($_POST['searchpar'], 1);
     

	 if (isset($_POST['searchpar'])) {$searchpar=$_POST['searchpar']; if($searchpar=='' or preg_match($sear, $searchpar != TRUE)) {unset($searchpar);
	 	echo "Fill the search field right!";}}

	 	$query = "SELECT url from files where `text` like '%$searchpar%' and private=0";
	 	$result = mysqli_query($link, $query) or die("Error." . mysqli_error($link));
 
	 	if ($result){
	 		$rows = mysqli_num_rows($result);

	 		for ($i=0; $i < $rows; $i++) {
	 			$row = mysqli_fetch_row($result);
	 			echo "<div class='post'>";
                echo "<img width='auto' height='100%' style='overflow:hidden;' src ='".$row[0]."'>";
		        echo "</div>";
	   		}
	   		mysqli_free_result($result);
	 	}

    ?>
		</div>


	</body>

</html>