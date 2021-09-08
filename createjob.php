<?php
	$fa=0;
	echo '<html>
		<head>
			<title>Job Portal | Post New Job</title>
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
		}
			  
	}							
	echo '				</div>
					</div>
				</div>    
			</nav>';
	if ($fa){
			echo '<div class="container form-group">	
					<b style="color:red">* means required</b><br><br>
					<form action="postjob.php" method="POST" name="f">
						<b>Job Tittle*:</b> <input type="text" class="form-control" name="title" required /> <br>
						<b>description*:</b> <input type="text" class="form-control" name="description" required /> <br>
						<b>salary*:</b> <input type="number" class="form-control" name="salary" required /> <br>				
						<input type="submit" value="Create" ><br>		
					</form>
				</div>';
	}
		
		

	echo'</body>
	</html>';
	
?>