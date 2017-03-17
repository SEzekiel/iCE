<?php

include 'dbconnect.php';

//login
function login($email, $password)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
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

//register user
function register($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
    $password = password_hash($upass, PASSWORD_BCRYPT, array('cost' => 11));
    $stmt = $conn->prepare("INSERT INTO users(name,gender,phone,email,password,emergencyNumber, emergencyName) VALUES(:name,:gender,:phone,:email,:password,:emergencyNumber, :emergencyName)");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":gender", $phone);
    $stmt->bindparam(":phone", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":password", $password);
    $stmt->bindparam(":emergencyName", $emergencyName);
    $stmt->bindparam(":emergencyNumber", $emergencyNumber);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

//update userinformation
function update($name = null, $gender = null, $phone = null, $email = null, $password = null, $emergencyNumber = null, $emergencyName = null)
{
    $stmt = $conn->prepare("UPDATE users SET name=:name, gender=:gender, phone=:phone, email=:email,
      password=:password,emergencyNumber=:emergencyNumber, emergencyName=:emergencyName");
    if($name != null){
      $stmt->bindparam(":name", $name);
    }
    if($gender != null){
      $stmt->bindparam(":gender", $gender);
    }
    if($phone != null){
      $stmt->bindparam(":phone", $phone);
    }
    if($email != null){
        $stmt->bindparam(":email", $email);
    }
    if($password != null){
      $stmt->bindparam(":password", $password);
    }
    if($emergencyNumber != null){
      $stmt->bindparam(":emergencyNumber", $emergencyNumber);
    }
    if($emergencyName != null){
      $stmt->bindparam(":emergencyName", $emergencyName);
    }
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

//get single data from database
function single($id)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id LIMIT 1");
    $stmt->bindparam("id", $id);
  $stmt->execute();
  $userRow = $stmt->fetch();
  return $userRow;
}

//get all data from database
function resultSet()
{
    $allData = array();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    while ($userRow = $stmt->fetchAll()) {
        $allData[] = $userRow;
  }
    return $allData;
}
