<?php

/**
 * Created by PhpStorm.
 * User: razak
 * Date: 3/16/2017
 * Time: 9:19 PM
 */
include '../Model/emergency_model.php';


function add_emergency($reporterNumber, $type, $recipient, $message, $lat, $long, $image){

    if (add_emergency($reporterNumber, $type, $recipient, $message, $lat, $long, $image)){
        return 'true';
    }else{
        return 'false';
    }
}

function get_emergency($emergency_type){
    $query = get_emergency($emergency_type);
    if ($query){
        while ($d = $query->fetch_assoc()) {
            echo $d['id'];
            echo $d['reporterNumber'];
            echo $d['type'];
            echo $d['recipient'];
            echo $d['message'];
            echo $d['locationLatitude'];
            echo $d['locationLongitude'];
            echo $d['image'];
        }
    }else{
        echo 'false';
    }
}

function delete_emergency($reporter){
    if (delete_emergency($reporter)){
        return 'true';
    }
    return 'false';
}