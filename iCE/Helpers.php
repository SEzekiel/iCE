<?php


function validate($username, $password)
{
    $username = '';
    $password = '';
    $is_ok = true;
    $error = '';

    if (isset($_POST['submit'])) {
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            $is_ok = false;
        }

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $is_ok = false;
        }

    }
}







?>