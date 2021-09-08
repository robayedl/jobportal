<?php
	$fa=0;
	echo '<html>
		<head>
			<title>Job Portal | Update Job</title>
			<link rel="stylesheet" href="bootstrap.min.css">
			<style>
				.content {
					max-width: 500px;
					margin: auto;
				}
			</style>
		</head>
		<body>
			<div class="content">
				<h1><b>Welcome to Job Portal</b></h1>
			</div><br><br><br>
			<nav class="navbar navbar-expand-md bg-dark mb-4">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" >
						<div class="navbar-nav">
							<a href="home.php" class="nav-link">Home</a>							
							<a href="about.php" class="nav-link">About</a>';
	if (isset($_COOKIE["username"])){
			if($_COOKIE["role"]==0){
				echo '<a href="findjob.php" class="nav-link">Find Jobs</a>';
				echo '<a href="createjob.php" class="nav-link">Post Jobs</a>';
				echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
				$fa=1;
			}
			if($_COOKIE["role"]==1)echo '<a href="findjob.php" class="nav-link">Find Jobs</a>';
			if($_COOKIE["role"]==2)echo '<a href="createjob.php" class="nav-link">Post Jobs</a>',$fa=1;
			if($_COOKIE["role"]==2)echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
			echo '<a href="#" class="nav-link">Hi, ' . $_COOKIE["username"] .'</a>';;
			echo '<a href="logout.php" class="nav-link">Logout</a>';
			$u=$_COOKIE["username"];
	}
	else{
		session_start();
		if (isset($_SESSION["username"])){
			if($_SESSION["role"]==0){
				echo '<a href="findjob.php" class="nav-link">Find Jobs</a>';
				echo '<a href="createjob.php" class="nav-link">Post Jobs</a>';
				echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
				$fa=1;
			}
			if($_SESSION["role"]==1)echo '<a href="findjob.php" class="nav-link">Find Jobs</a>';
			if($_SESSION["role"]==2)echo '<a href="createjob.php" class="nav-link">Post Jobs</a>',$fa=1;
			if($_SESSION["role"]==2)echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
			echo '<a href="#" class="nav-link">Hi, ' . $_SESSION["username"] .'</a>';
			echo '<a href="logout.php" class="nav-link">Logout</a>';
			$u=$_SESSION["username"];
		}
			  
	}							
	echo '				</div>
					</div>
				</div>    
			</nav>';
	if ($fa){
		$id=$_POST['jobid'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "job_portal";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM job";
		$result = mysqli_query($conn, $sql);
		$tit='';
		$des='';
		$sal='';
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($id==$row['id']&&$u==$row['username']){
					$tit=$row['title'];
					$des=$row['description'];
					$sal=$row['salary'];
					break;
				}
			}
		}
			echo '<div class="container form-group">	
					<b style="color:red">* means required</b><br><br>
					<form action="updatejob.php" method="POST" name="f">
						<b>Job Tittle*:</b> <input type="text" class="form-control" name="title" value='.$tit.' > <br>
						<b>description*:</b> <input type="text" class="form-control" name="description" value='.$des.'> <br>
						<b>salary*:</b> <input type="number" class="form-control" name="salary" value='.$sal.' > <br>				
						<button type="submit" value="'.$id.'" name="jobid">Update</button>		
					</form>
				</div>';
	}
		
		

	echo'</body>
	</html>';
	
?>