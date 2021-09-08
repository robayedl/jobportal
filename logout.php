<?php
	if (isset($_COOKIE["username"])){
			$expire=time()-1;
			setcookie("username", $_COOKIE["username"], $expire);			
	}
	else{
		session_start();
		session_destroy();  
	}
	header('location: home.php');
?>