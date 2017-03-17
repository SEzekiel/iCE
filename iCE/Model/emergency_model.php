<?php
/**
 * Created by PhpStorm.
 * User: razak
 * Date: 3/16/2017
 * Time: 9:22 PM
 */

include 'mainmodel.php';

/**
 * @param $reporter_number
 * @return string
 */
function get_emergency($reporter_type)
{
    $query = $conn->query("SELECT * FROM emergency WHERE type in ('$reporter_type')");
    if ($query->num_rows >= 1) {
        return $query;
    } else {
        return false;
    }
}
//upload image
 public function uploadImage()
  {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if file already exists
    if(file_exists($target_file)) {
      echo "Sorry, file already exists";
      $uploadOk = 0;
    }
    // Check file size
    if($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            return true;
            } else {
              echo "Sorry, there was an error uploading your file.";
           }
       }
  }

function add_emergency($reporterNumber, $type, $recipient, $message, $lat, $long, $image)
{
    $stmt = $conn->prepare("INSERT INTO emergency(reporterNumber,'type',recipient,message,locationLatitude,locationLongitude,image) VALUES(:reporterNumber,:'type', :recipient,:message,:lat,:long,:image)");
    $stmt->bindparam(":reporterNumber", $reporterNumber);
    $stmt->bindparam(":type", $type);
    $stmt->bindparam(":recipient", $recipient);
    $stmt->bindparam(":message", $message);
    $stmt->bindparam(":lat", $lat);
    $stmt->bindparam(":long", $long);
    $stmt->bindparam(":image", $image);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function update_emergency($reporterNumber =null, $type=null, $recipient=null, $message=null, $lat=null, $long=null, $image=null)
 {
   $stmt = $conn->prepare("UPDATE emergency SET reporterNumber=:reporterNumber, type=:type, recipient=:repicient, message=:message, lat =:lat, long=:long, image=:image");
   if($reporterNumber != null){
     $stmt->bindparam(":reporterNumber", $reporterNumber);
     $stmt->bindparam(":type", $type);
     $stmt->bindparam(":recipient",$recipient);
     $stmt->bindparam(":message",$message);
     $stmt->bindparam(":lat",$lat);
     $stmt->bindparam(":long",$long);
     $stmt->bindparam(":image",$emage);
     if($stmt->execute){
       return true;
     }else{
       return false;
     }
   }

 }
function delete_emergency($reporter)
{
    $query = $conn->query("DELETE FROM emergency WHERE username = '$reporter'");
    if ($conn->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}
