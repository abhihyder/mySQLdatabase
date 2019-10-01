<?php

    // Upload image into darabase


    $db= new mysqli("localhost","root","","user_upload");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }


    /*
    syntex of  insert data

    $var= "INSERT INTO table_name";  //assign to a variable.

    */

    $select= "INSERT INTO images (image)
        VALUES(?)"; //upload image to database
    
    $rslt=$db->prepare($select); // prepare is a built in function.
    $rslt->bind_param("b", $image); // b for blob. 
    $image=file_get_contents("abhi.jpg");
    $rslt->send_long_data(0,$image);
    $rslt->execute();
    $rslt->close();
    $object->close();

    


?>
