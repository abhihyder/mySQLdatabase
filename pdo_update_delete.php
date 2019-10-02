<?php

    $dsn="mysql:dbname=student;host=localhost;";
    $user="root";
    $pass="";

    try{
        $pdo= new PDO($dsn, $user, $pass); //database connection by pdo
    }catch(PDOException $e){
        echo "Database connection fail!".$e->getMessage();
    }

    //delete
    $id=0;
    $dep="Math";
    $sql= "delete from student_details where id=? and department=? "; // " : " is named placeholder
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array( $id, $dep));


    //-------------------------------------------------------------

    //update
    $id=0;
    $dep2="CSE";
    $sql= "update student_details set department=? where id=? "; // " : " is named placeholder
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array($dep2, $id));