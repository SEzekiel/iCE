<?php

include '../Model/frontend_user.php';
$name = $_GET['name'];
$gender = $_GET['gender'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$password = $_GET['pass'];
$emergencyNumber = $_GET['cname'];
$emergencyName = $_GET['cnumber'];

SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName);
    
function SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    if (register($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo "true";
    } else {
        echo "false";
    }
}


?>
