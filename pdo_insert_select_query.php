<?php

    $dsn="mysql:dbname=student;host=localhost;";
    $user="root";
    $pass="";

    try{
        $pdo= new PDO($dsn, $user, $pass); //database connection by pdo
    }catch(PDOException $e){
        echo "Database connection fail!".$e->getMessage();
    }
    /*
    $sql= "insert into student_details value (5,'Sumaiya', 'CSE', 24);"; // insert data into table
    $pdo->query($sql);
    */

    $sql= "select * from student_details order by(name)";
    $result=$pdo->query($sql);
    foreach($result as $values){
        echo $values['name']." ".$values['age']."<br>";
    }
    