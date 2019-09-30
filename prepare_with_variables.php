<?php

    $object= new mysqli("localhost","root","","college");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }





    /*
    syntex of  insert data

    $var= "INSERT INTO table_name";  //assign to a variable.

    */

    $select= "INSERT INTO students_details 
        VALUES(?,?,?,?,?,?)";
    
    $rslt=$object->prepare($select); // query is a built in function.
    $rslt->bind_param("issids", $roll, $name, $gender, $age, $cgpa, $city); // i for intiger, s for string, d for double 
    $roll=109;
    $name="Zaheen";
    $gender="Male";
    $age=29;
    $cgpa=3.90;
    $city="Cumilla";

    $rslt->execute();
    $rslt->close();
    $object->close();



?>