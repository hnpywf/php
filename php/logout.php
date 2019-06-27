<?php 
 if(session_id()=='');
 session_start();
            $_SESSION['login']='';
    		$_SESSION['avatar']='';
    		$_SESSION['status']='';
    		$_SESSION['email']='';
    		$_SESSION['fullname']='';
    		$_SESSION['id']='';
    		echo "<meta http-equiv='refresh' content='0;URL=index.php' />";
 ?>