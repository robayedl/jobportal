<?php
	$fa=0;
	$u='';
	if (isset($_COOKIE["username"])){
			if($_COOKIE["role"]==0||$_COOKIE["role"]==2){
				$fa=1;
				$u=$_COOKIE["username"];
			}
	}
	else{
		session_start();
		if (isset($_SESSION["username"])){
			if($_SESSION["role"]==0||$_SESSION["role"]==2){
				$fa=1;
				$u=$_SESSION["username"];
			}
		}
		  
	}
	if($fa){		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "job_portal";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql ="UPDATE job SET title = '$_POST[title]', description = '$_POST[description]',salary = '$_POST[salary]'
		where id='$_POST[jobid]' && username='$u'";		
		if (mysqli_query($conn, $sql)) {
			$a=0;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	header('location: editjob.php');
?>


