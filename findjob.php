<?php
	$fa=0;
	echo '<html>
		<head>
			<title>Job Portal | Find Job</title>
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
			if($_COOKIE["role"]==1)echo '<a href="findjob.php" class="nav-link">Find Jobs</a>',$fa=1;;
			if($_COOKIE["role"]==2)echo '<a href="createjob.php" class="nav-link">Post Jobs</a>';
			if($_COOKIE["role"]==2)echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
			echo '<a href="#" class="nav-link">Hi, ' . $_COOKIE["username"] .'</a>';;
			echo '<a href="logout.php" class="nav-link">Logout</a>';
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
			if($_SESSION["role"]==1)echo '<a href="findjob.php" class="nav-link">Find Jobs</a>',$fa=1;;
			if($_SESSION["role"]==2)echo '<a href="createjob.php" class="nav-link">Post Jobs</a>';
			if($_SESSION["role"]==2)echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
			echo '<a href="#" class="nav-link">Hi, ' . $_SESSION["username"] .'</a>';
			echo '<a href="logout.php" class="nav-link">Logout</a>';
		}
			  
	}							
	echo '				</div>
					</div>
				</div>    
			</nav>';
	
	if($fa){		
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

		if (mysqli_num_rows($result) > 0) {
			echo "<div class='container'><table border='1' cellpadding='3px' cellspacing='0px'>";
			echo "<tr>";
			echo "<th>Employer</th><th>Job ID</th><th>Job Title</th><th>Description</th><th>Salary</th>";
			echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['title'] . "</td>";
					echo "<td>" . $row['description'] . "</td>";
					echo "<td>" . $row['salary'] . "</td>";
					echo "</tr>";

			}
			echo "</table></div>";
		} 
		else {
			echo "No Job Available Right Now!!!";
		}
		
		mysqli_close($conn);
	}
	echo '</body></html>';
?>
