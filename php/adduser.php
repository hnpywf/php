<?php 
include 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Error." . mysqli_error($link));



    $passreg = 'A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])[-_a-zA-Z0-9]{6,18}z';


if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['pass'])) { $pass = $_POST['pass']; if ($pass == '') { unset($pass);} } 
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 
if (isset($_POST['fullname'])) { $fullname = $_POST['fullname']; if ($fullname == '') { unset($fullname);} } 


if (empty($login) or empty($pass) or empty($email))
{
	echo "Not all boxes are completed, back and try again!";
	mysqli_close($link);
	exit("Not all boxes are completed, back and try again!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);

$pass = md5($pass);

$query = "SELECT user_id FROM user WHERE nickname ='$login'";
$result = mysqli_query($link, $query) or die("Error:" . mysqli_error($link));
$row =  mysqli_fetch_row($result);

if (!empty($row[0]))
{
	echo "Ur nickname is already in use.";
	mysqli_close($link);
	exit("Ur nickname is already in use.");
}
else
{
  $query = "INSERT INTO `user`(`nickname`, `password`, `email`, `namesurname`) VALUES ('$login','$pass','$email','$fullname')";
  $result2 = mysqli_query($link, $query) or die("Error." . mysqli_error($link));	
}

mysqli_close($link);

if ($result2=='TRUE')
{
	echo "Registration succesfull.";
	include 'index.php';
}
else 
{
	echo "here is some error. Sorry :(";
	exit("Error.......");
}



 ?>