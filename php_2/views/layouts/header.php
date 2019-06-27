

<html>
 <head>
 	<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
 		<link rel="stylesheet" href="css/main.css" type="text/css" />
 </head>
	<body>
		<div style="display: flex; justify-content: space-between; align-items: center;">
		<ul class="headee">
			<li><a class="linke" href="index.php">MAIN</a></li>
			<li><a class="linke" href="page.php">THREAD</a></li>
			<li><a class="linke" href="toppics.php">TOP PICS</a></li>
		</ul>
		<form method="POST" action="search.php" style="padding-top: 2.2vh; margin-left: -100vh;"><input type="text" size="18" maxlength="30" name="searchpar" placeholder="Search">
			<input type="submit" value="OK" name="dead" class="subms"></form>
		<div style="margin-right: 20px; "><span iddiv="box_1" class="linke2" style="cursor: pointer;">LOG IN</span> | <span iddiv="box_2" class="linke2" style="cursor: pointer;" onclick="register()">SIGN IN</span></div>
		</div>
	</body>
</html>