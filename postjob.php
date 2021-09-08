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
		try {			
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			$sql = "select username,id from job";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$id=0;
			while($result = $stmt->fetch()) {
				if($id<$result['id']&&$u==$result['username']){
					$id=$result['id'];
				}
			}
			$id++;
			$sql = "insert into job (username,id,title,description,salary) 
				values ('$u','$id','$_POST[title]','$_POST[description]','$_POST[salary]')";
			$conn->exec($sql);
			
			
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
	header('location: home.php');
?>


