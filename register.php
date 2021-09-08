<?php
	
	$x=$_POST['password1'];
	$y=$_POST['password2'];
	if($x==$y){		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "job_portal";
		try {
			$u=$_POST['username'];
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			$sql = "select username from user";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$f=1;
			while($result = $stmt->fetch()) {
				if($u==$result['username']){
					$f=0;
					break;
				}
			}
			if($f){
				$sql = "insert into user (username,email,password,role,address,gender) 
				values ('$u','$_POST[email]', '$x','$_POST[role]','$_POST[address]','$_POST[gender]')";
				$conn->exec($sql);
				echo 'Registered Successfully!!!<br><br>';
				echo "<a href='login.html'>Click to Login</a><br>";
				echo "<a href='home.php'>Back to Homepage</a>";
			}
			else{
				echo 'Username Already Exixts!!!<br><br>';
				echo "<a href='register.html'>Click to Register</a><br>";
				echo "<a href='home.php'>Back to Homepage</a>";
			}
			
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
	else{
		echo 'Password not Matched!!!<br><br>';
		echo "<a href='register.html'>Click to Register</a><br>";
		echo "<a href='home.html'>Back to Homepage</a>";
	}
?>


