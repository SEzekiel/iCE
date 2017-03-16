<?php
  session_start();
	define('HOST', "localhost");
	define('USERNAME', "root");
	define('PASSWORD', "");
	define('DBNAME', "Emergency");

	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
	if (mysqli_connect_errno()) {
		die("Error". $con->connect_error)
	}



?>
