<?php

    $object= new mysqli("localhost","root","","college");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }





    /*
    syntex of  update data

    $var= "UPDATE table_name SET column_name='update_data1, update_data2,...n' WHERE row ";  //assign to a variable.

    */
    $update= "UPDATE students_details SET City= 'Sylhet' WHERE Roll='102'  ";
   
    $updtRslt= $object->query($update); // query is a built in function.
   
   




    /*
    syntex of  select data

    $var= "SELECT * FROM table_name";  //assign to a variable.

    */

    $select= "SELECT * FROM students_details";

    $rslt=$object->query($select); // query is a built in function.

    while($data=$rslt->fetch_object()){  //fetch_object is a built in function.
        echo "<pre>";
        echo $data->City;
        echo "</pre>";
    }



?>