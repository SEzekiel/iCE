<?php
  session_start();
	define('HOST', "localhost");
	define('USERNAME', "root");
	define('PASSWORD', "");
	define('DBNAME', "Emergency");

	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
	if (mysqli_connect_errno()) {
		die("Error". $conn->connect_error);
	}

