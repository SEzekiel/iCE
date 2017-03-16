<?php
/**
 * Created by PhpStorm.
 * User: razak
 * Date: 3/16/2017
 * Time: 9:22 PM
 */

require_once 'mainmodel.php';

/**
 * @param $reporter_number
 * @return string
 */
function get_emergency($reporter_number)
{
    $query = $conn->query("SELECT * FROM emergency WHERE reporterNumber = '$reporter_number'");
    if ($query->num_rows >= 1) {
        /*
        echo "<table>";
        echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Gender</th>';
        echo '<th>Color</th>';
        echo '</tr>';
        while($d = $query->fetch_assoc()) {
            echo "<tr>";
            echo '<td>'.$d['username'].'</td>';
            echo '<td>'.$d['gender'].'</td>';
            echo '<td>'.$d['color'].'</td>';
            echo "</tr>";
        }
        echo "</table>";
        */
    } else {
        return 'false';
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


