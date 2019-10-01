<?php

    $dsn="mysql:dbname=student;host=localhost;";
    $user="root";
    $pass="";

    try{
        $pdo= new PDO($dsn, $user, $pass); //database connection by pdo
    }catch(PDOException $e){
        echo "Database connection fail!".$e->getMessage();
    }
    
    $id=6;
    $name="Raz";
    $dep="Math";
    $age=25;
    $sql= "insert into student_details (id, name, department, age) value (?,?,?,?);"; // insert data into table
    $stmt=$pdo->prepare($sql);
    $arr=array($id,$name, $dep, $age);
    $stmt->execute($arr);


?>