<?php

include 'dbconnect.php';
//login
function login_frontend($email, $password)
{
      $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    if (!$conn) {
      echo("Error". $conn->connect_error);
    }
    $query = "SELECT * FROM users WHERE email = '$email' OR phone  = '$email'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            return true;
        } else {
            return false;
        }
    }
}

//register user
function register_frontend($name, $gender, $phone, $email, $password, $emergencyNumber, $emergencyName)
{
  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
  if (!$conn) {
    echo("Error". $conn->connect_error);
  }
    $new_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
    $query = "INSERT INTO users(name,gender,phone,email,password,emergencyNumber, emergencyName) VALUES('$name','$gender','$phone','$email','$new_password','$emergencyName','$emergencyNumber')";
      $result = mysqli_query($conn,$query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

//update userinformation
function update_frontend($name = null, $gender = null, $phone = null, $email = null, $password = null, $emergencyNumber = null, $emergencyName = null)
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
function delete($id){
  $stmt = $conn->prepare("DELETE FROM users WHERE id =:id");
  if($stmt->execute(array(':id' =>$id ))){
    return true;
  }else{
    return false;
  }
}
?>