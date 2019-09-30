<?php

    $object= new mysqli("localhost","root","","college");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }else{
        echo "Database connection successfull";
    }