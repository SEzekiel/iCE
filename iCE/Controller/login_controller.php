<?php

class UserController
{
    function UserController($username,$password){

    }
    function login($username, $password)
    {
        if ($this->authenticate($username, $password)) {
            session_start();
            $user = new User($username);  //create new user
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    static function authenticate($u, $p)
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
}



?>
