<?php
	echo '<html>
		<head>
			<title>Job Portal | About</title>
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
			}
			if($_COOKIE["role"]==1)echo '<a href="findjob.php" class="nav-link">Find Jobs</a>';
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
			}
			if($_SESSION["role"]==1)echo '<a href="findjob.php#" class="nav-link">Find Jobs</a>';
			if($_SESSION["role"]==2)echo '<a href="createjob.php" class="nav-link">Post Jobs</a>';
			if($_SESSION["role"]==2)echo '<a href="editjob.php" class="nav-link">Edit Jobs</a>';
			echo '<a href="#" class="nav-link">Hi, ' . $_SESSION["username"] .'</a>';
			echo '<a href="logout.php" class="nav-link">Logout</a>';
		}
		else{
			echo '<a href="register.html" class="nav-link">Register</a><br>
				  <a href="login.html" class="nav-link">Login</a>';
		}	  
	}							
	echo '				</div>
					</div>
				</div>    
			</nav>

		</body>
	</html>';
	echo "<h1>This is the about section</h1>";
?>