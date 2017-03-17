<?php

include '../Model/User.php';


function SignUpController($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    if (register($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo "true";
    } else {
        echo "false";
    }
}


?>
