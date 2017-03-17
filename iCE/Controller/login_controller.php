<?php
include '../Model/User.php';

function login_user($username, $password)
{
    if (login($username, $password)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


function SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    if (register($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo "true";
    } else {
        echo "false";
    }
}


function update_user($name = null, $gender = null, $phone = null, $email = null, $password = null, $emergencyNumber = null, $emergencyName = null)
{
    if (update($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


function logout()
{
    session_start();
    session_destroy();
}


?>
