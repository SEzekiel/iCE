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

function delete_emergency($reporter)
{
    $query = $conn->query("DELETE FROM emergency WHERE username = '$reporter'");
    if ($conn->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}


