<?php

    $dsn="mysql:dbname=student;host=localhost;";
    $user="root";
    $pass="";

    try{
        $pdo= new PDO($dsn, $user, $pass); //database connection by pdo
    }catch(PDOException $e){
        echo "Database connection fail!".$e->getMessage();
    }


    $id=2;
    $sql= "select *from student_details where id= :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array('id'=>$id));
    while($data=$stmt->fetch()){ // assign to avariable as $data
        echo $data['id']." ". $data['name']."<br>";
    }