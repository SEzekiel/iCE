<?php 

class Emergency{

var $id;
var $reporterPhone;
var $emergencyType;
var $receipient;
var $message;
var $longitude;
var $latitude;
var $image;

function __construct($id, $reporter, $type, $receipient, $msg, $long, $lat, $img){
     this->id = $id;
     this->reporterPhone = $reporter;
     this->emergencyType = $type;
     this->receipient = $receipient;
     this->message = $msg;
     this->longitude = $long;
     this->latitude = $lat;
     this->image = $img;

}

}

 ?>