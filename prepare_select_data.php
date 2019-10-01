<?php

    $object= new mysqli("localhost","root","","college");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }





    /*
    syntex of  select data

    $var= "SELECT column_name FROM table_name";  //assign to a variable.

    */

    $select= "SELECT Name FROM students_details ORDER BY Roll";

    $rslt=$object->prepare($select); // query is a built in function.
    $rslt->execute();
    $rslt->bind_result($name);
   
    while($rslt->fetch()){  //fetch_object is a built in function.
        echo "<pre>";
        echo $name;
        echo "</pre>";
    }



?>