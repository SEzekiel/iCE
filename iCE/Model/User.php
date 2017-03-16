<?php

class User
{
    private $id = '';
    private $name = '';
    private $password = '';
    private $phone_number = '';

    function User($id, $name, $phone, $password)
    {
        $this->phone_number;
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    function add_emergency_number($number){
        //add to database (user _id)
    }



}

?>