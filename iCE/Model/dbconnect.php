<?php
	define('HOST', "localhost");
	define('USERNAME', "root");
	define('PASSWORD', "agnes123");
	define('DBNAME', "emergency");
	
	  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
	  if (!$conn) {
	    echo("Error". $conn->connect_error);
	  }
	?>

