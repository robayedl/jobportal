<?php
	$u=$_POST['username'];
	$x=$_POST['password'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "job_portal";
	try {
			
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		$sql = "select * from user";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$f=0;
		while($result = $stmt->fetch()){
			if($u==$result['username']&&$x==$result['password']){
				$f=1;
				$r=$result['role'];
			}
		}
		if($f){
			if (isset($_POST["check"])){
				$expire=time()+2592000;
				setcookie("username", $u, $expire);
				setcookie("role", $r, $expire);
			}
			else{
				session_start();
				$_SESSION['username'] = $u;
				$_SESSION['role'] = $r;
			}
			header('location: home.php');
		}
		else{
			echo "Username or Password not Macthed!!!<br><br>";
			echo "<a href='login.html'>Click to Login</a><br>";
			echo "<a href='home.php'>Back to Homepage</a>";
		}
			
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>