<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
</head>
<body>
<?php
include 'Model/Database.php';
?>
<div style="margin-top: 20%">
    <div>

        <form action="" method="get" accept-charset="utf-8">
            <label for="textinput-4" class="ui-hidden-accessible">Username or phone:</label>
            <input type="text" name="username" id="textinput-4" placeholder="Username or phone" value="" style="height: 50px">
            <p></p>
            <label for="textinput-4" class="ui-hidden-accessible"> Password:</label>
            <input type="password" name="password" id="textinput-4" placeholder="Password" value=""
                   style="height: 50px">
            <p></p>
            <div class="ui-input-btn ui-btn ui-corner-all">
                Login
                        <input type="button" data-enhanced="true" value="Login">
                    
            </div>
            <div class="ui-input-btn ui-btn ui-corner-all">
                Cancel
                        <input type="button" data-enhanced="true" value="Cancel">
                    
            </div>
        </form>
    </div>
    <p>
        <div style="text-align: center;">
            <a href="signup.php">Don't have an account? Sign up here</a>
    <p></p>
    <a href="#">Forgot password</a>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>