
<?php

		$mail = $pword = "";
		
		if (isset($_POST["submit"])) {
			$ok = true;

			if (!isset($_POST['email']) || $_POST['email'] === '') {
        		$ok = false;
    		} else {
        		$mail = $_POST['email'];
        	}

        	if (!isset($_POST['pswd']) || $_POST['pswd'] === '') {
        		$ok = false;
    		} else {

				$pword = $_POST["pswd"];
			}
			
			if($ok) {
				login($mail, $pword);
			}
		}



		function login($email, $pword){
			include("dbconnect.php");
                $hashedpword;

				if($conn){
					echo "<center style= 'color:#fff'>database connection successful</center>";

					//fetech password from db using username
					$query = "SELECT * FROM user_table WHERE email = '$email'";
					//execute query
			        $records = mysqli_query($conn, $query);
			        if(mysqli_num_rows($records) == 1){
			        	$userinfo = mysqli_fetch_array($records, MYSQLI_ASSOC);
			        	$hashedpword = $userinfo['password'];
                    }
                    
                    //check if password matches the hashed one
                    if(password_verify($pword, $hashedpword)){
                    	//execute query
			           $queryStatement = "SELECT * FROM user_table WHERE email = '$email' AND password ='$hashedpword'";
			           $query = mysqli_query($conn, $queryStatement);

			           if(mysqli_num_rows($query) > 0){
			        	$userdetails = mysqli_fetch_array($query, MYSQLI_ASSOC);
			        	echo "<center><h3 style='color:green'>Login successful "."</h3></center>" ;
			        	header("location:index.php");
			            }

                    }
					
			        else{
			        	echo "<center><h3 style='color:red'> Login failed ". "</h3></center>" ;
			        }
				}

				else{
					die("couldn't connect to database");
				}
		}

	?>	
	