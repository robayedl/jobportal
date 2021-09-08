<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "CREATE DATABASE job_portal";
	if (!mysqli_query($conn, $sql)) {
		echo "Error creating database: " . mysqli_error($conn);
	}
	mysqli_close($conn);
	
	//connect database
	$dbname="job_portal";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "CREATE TABLE user(
			username varchar(50),
			email varchar(250),
			password varchar(30),
			role int,
			address varchar(300),
			gender varchar(30))";

	if (!mysqli_query($conn, $sql)) {
		echo "Error creating table: " . mysqli_error($conn);
	}
	echo "successfully created User Table";
	$sql = "CREATE TABLE job(
			username varchar(50),
			id int,
			title varchar(50),
			description varchar(500),
			salary varchar(50))
			";

	if (!mysqli_query($conn, $sql)) {
		echo "Error creating table: " . mysqli_error($conn);
	}
	echo "successfully created Job Table";
	
	mysqli_close($conn);
?>
