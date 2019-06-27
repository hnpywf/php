<?php 
if (session_id()=='');
    session_start();
    if (isset($_POST['login'])) {$login = $_POST['login']; if($login=='') {unset($login);}}
    if(isset($_POST['password'])) {$pass=$_POST['password']; if($pass=='') {unset($pass);}}

    if(empty($login) or empty($pass))
    {
    	echo "<p><a href=\"index.php\">Back</a></p>";
    	exit('Login or password is empty!');
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    $login = trim($login);
    $pass = trim($pass);

    $pass = md5($pass);

    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));

    $query = "SELECT * FROM `user` WHERE nickname = '$login'";
    $result = mysqli_query($link, $query) or die("Error." . mysqli_error($link));
    $row = mysqli_fetch_row($result);

    if(empty($row[0]))
    {
    	mysqli_close($link);
    	echo "<p><a href=\"index.php\">Back</a></p>";
    	exit("Login is incorrect!");
    }
    else{
    	if($row[2]==$pass){

    		$_SESSION['login']=$row[1];
    		$_SESSION['avatar']=$row[4];
    		$_SESSION['status']=$row[3];
    		$_SESSION['email']=$row[5];
    		$_SESSION['fullname']=$row[6];
    		$_SESSION['id']=$row[0];
            session_start();
    		include 'page.php';
    	}
    	else{
    		echo "<p><a href=\"index.php\">Back</a></p>";
    		mysqli_close($link);
    		exit("Password is incorrect!");
    	}
    }

 ?>