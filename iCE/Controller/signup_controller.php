<?php

include '../Model/frontend_user.php';
$name = $_GET['name'];
$gender = $_GET['gender'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$password = $_GET['pass'];
$emergencyNumber = $_GET['cname'];
$emergencyName = $_GET['cnumber'];
//signup_controller.php?name=Ezekiel&gender=Male&phone=0270327467&email=ezekielsebastine@gmail.com&pass=123&cname=Eze&cnumber=1234567891
SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName);
    
function SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    if (register_frontend($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo true;
    } else {
        echo "false";
    }
}


?>
