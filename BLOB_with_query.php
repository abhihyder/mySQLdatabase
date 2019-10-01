<?php

    


    $db= new mysqli("localhost","root","","user_upload");

    if(mysqli_connect_errno()){
        echo "Database connection fail";
        exit();
    }


    // Upload image into darabase
    /*
    $image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
    //you keep your column name setting for insertion. I keep image type Blob.
    $query = "INSERT INTO images (ID,image) VALUES('','$image')";  
    $qry = mysqli_query($db, $query);
    
    */
    










    
    /*
    syntex of  select data

    $var= "SELECT column_name FROM table_name";  //assign to a variable.

    */


    // Show image from darabase

    $select = "SELECT image FROM images WHERE ID = 0";
    
    $sth = $db->query($select);
    $result=mysqli_fetch_array($sth);
    echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"/>';
?>
