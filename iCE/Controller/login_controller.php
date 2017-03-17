<?php

function login($username, $password)
{
    if (authenticate($username, $password)) {
        session_start();
        $user = new User($username);  //create new user
        $_SESSION['user'] = $user;
        echo 'true';
    } else {
        echo 'false';
    }
}

function authenticate($u, $p)
{
    $auth = false;
    if ($u == 'admin' && $p == 'password') $auth = true;
    return $auth;
}


function logout()
{
    session_start();
    session_destroy();
}


?>
