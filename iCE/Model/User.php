<?php
include('dbconnect');
function login($email, $password)
{
  $stmt = $con->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
  $stmt->execute(array(':email'=>$email));
  $userRow=$stmt->fetch();
  if($stmt->rowCount()==0)
  {
    if(password_verify($password, $userRow['password'])){
      $_SESSION['user_id'] = $userRow['id'];
      $_SESSION['name'] = $userRow['name'];
      return true;
    }else{
      return false;
    }
  }
}

function register($name,$gender,$phone,$email,$password,$emergencyNumber, $emergencyName)
{
  $password = password_hash($upass, PASSWORD_BCRYPT, array('cost'=>11));
  $stmt = $$con->prepare("INSERT INTO users(name,gender,phone,email,password,emergencyNumber, emergencyName)
  VALUES(:name,:gender,:phone,:email,:password,:emergencyNumber, :emergencyName)");
  $stmt->bindparam(":name", $name);
  $stmt->bindparam(":gender", $phone);
  $stmt->bindparam(":phone", $phone);
  $stmt->bindparam(":email", $email);
  $stmt->bindparam(":password", $password);
  $stmt->bindparam(":emergencyName", $emergencyName);
  $stmt->bindparam(":emergencyNumber", $emergencyNumber);
  if($stmt->execute()){
    return true;
  }else{
    return false;
  }
}
