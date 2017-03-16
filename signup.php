<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

</head>
<body>
	<div>
		<div>
			
			<form action="" method="get" accept-charset="utf-8">
				<label for="textinput-4" class="ui-hidden-accessible">Full name:</label>
				<input type="text" name="textinput-4" id="textinput-4" placeholder="Full name" value="" style="height: 50px"><p></p>
				<input type="tel" name="tel" id="tel" value="" placeholder="Phone number" style="height: 50px"><p>
				<label for="textinput-4" class="ui-hidden-accessible">Email:</label>
				<input type="email" name="textinput-4" id="textinput-4" placeholder="Email" value="" style="height: 50px">	
				<div class="ui-field-contain" style="margin-top: -30px">
					    <select name="select-native-1" id="select-native-1">
						        <option value="">--Select gender--</option>
						        <option value="m">Male</option>
						        <option value="f">Female</option>
						        <option value="o">other</option>
					    </select>
				</div>
				<label for="textinput-4" class="ui-hidden-accessible"> Password:</label>
				<input type="password" name="textinput-4" id="textinput-4" placeholder="Password" value="" style="height: 50px">
				<div style="height: 20px">
					
				</div>

				<hr>
				<div style="height: 20px">
					
				</div>
				In case of an emergency, who should we contact
				<label for="textinput-4" class="ui-hidden-accessible"> Name of contact:</label>
				<input type="text" name="textinput-4" id="textinput-4" placeholder="Name of contact" value="" style="height: 50px"><p></p>
				<input type="tel" name="tel" id="tel" value="" placeholder="Phone number" style="height: 50px">

				<div class="ui-input-btn ui-btn ui-corner-all">
					Login
					        <input type="button" data-enhanced="true" value="Login" style="background-color: darkgreen">
				    </div>
				<a href="index.php"><div class="ui-input-btn ui-btn ui-corner-all">
					Back
					        <input type="button" data-enhanced="true" value="Back"style="background-color: orange">
				    </div></a>
			</form>
		</div><p>
		<div style="text-align: center;">
			<a href="#">Forgot password</a>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>