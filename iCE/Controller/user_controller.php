<?php
include '../Model/frontend_user.php';
include "../Model/backenduser.php";


/**
 * This login in  frontend users
 * @param $username
 * @param $password
 */
function login_user_frontend($username, $password)
{
    if (login_frontend($username, $password)) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/**
 * Login in backend users
 * @param $username
 * @param $password
 */
function login_user_backend($username, $password)
{
    if (login_backend($username, $password)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


/**
 * Update information of frontend users
 * @param null $name
 * @param null $gender
 * @param null $phone
 * @param null $email
 * @param null $password
 * @param null $emergencyNumber
 * @param null $emergencyName
 */
function update_user_frontend($name = null, $gender = null, $phone = null, $email = null, $password = null, $emergencyNumber = null, $emergencyName = null)
{
    if (update_frontend($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


/**
 * Update information of backend user
 * @param null $name
 * @param null $phone
 * @param null $email
 * @param null $password
 */
function update_user_backend($name = null, $phone = null, $email = null, $password = null)
{
    if (updateBackendUser($name, $phone, $email, $password)) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/**
 * Register frontend user
 * @param $name
 * @param $gender
 * @param $phone
 * @param $email
 * @param $password
 * @param $emergencyNumber
 * @param $emergencyName
 */
function register_frontend_user($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    if (register_frontend($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


/**
 * This registers backend users
 * @param $name
 * @param $phone
 * @param $email
 * @param $password
 */
function register_backend_user($name, $phone, $email, $password)
{
    if (registerBackendUser($name, $phone, $email, $password)) {
        echo 'true';
    } else {
        echo 'false';
    }
}


/**
 *Sign out users
 */
function logout()
{
    session_start();
    session_destroy();
}


?>
