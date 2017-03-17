<?php

include 'dbconnect.php';

//login
function login($email, $password)
{
    $stmt = $conn->prepare("SELECT * FROM backend WHERE email=:email LIMIT 1");
    $stmt->execute(array(':email' => $email));
    $userRow = $stmt->fetch();
    if ($stmt->rowCount() == 0) {
        if (password_verify($password, $userRow['password'])) {
            $_SESSION['user_id'] = $userRow['id'];
            $_SESSION['name'] = $userRow['name'];
            return true;
        } else {
            return false;
        }
    }
}

//register backend user
function registerBackendUser($name, $phone, $email, $password)
{
    $password = password_hash($upass, PASSWORD_BCRYPT, array('cost' => 11));
    $stmt = $conn->prepare("INSERT INTO backend(name,phone,email,password) VALUES(:name,:phone,:email,:password)");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":phone", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":password", $password);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

//update backend user information
function updateBackendUser($name = null, $phone = null, $email = null, $password = null)
{
    $stmt = $conn->prepare("UPDATE backend SET name=:name, phone=:phone, email=:email, password=:password");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":phone", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":password", $password);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

//get single data from database
function getBackendUser($id)
{
    $stmt = $conn->prepare("SELECT * FROM backend WHERE id=:id LIMIT 1");
    $stmt->bindparam("id", $id);
  $stmt->execute();
  $userRow = $stmt->fetch();
  return $userRow;
}

//get all data from database
function resultSet()
{
    $allData = array();
    $stmt = $conn->prepare("SELECT * FROM backend");
    $stmt->execute();
    while ($userRow = $stmt->fetchAll()) {
        $allData[] = $userRow;
    }
    return $allData;
}