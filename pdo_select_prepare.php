<?php

    $dsn="mysql:dbname=student;host=localhost;";
    $user="root";
    $pass="";

    try{
        $pdo= new PDO($dsn, $user, $pass); //database connection by pdo
    }catch(PDOException $e){
        echo "Database connection fail!".$e->getMessage();
    }


    $id=4;
    $sql= "select *from student_details where id=:id "; // " : " is named placeholder
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(':id'=> $id));
    while($data=$stmt->fetch()){ // assign to avariable as $data
        echo $data['id']." ". $data['name']."<br>";
    }

    /*
    OUTPUT:
    4 Badhon
    */
    echo "<hr>";




    //--------------------------------------------------------

    $id1=1;
    $id2=4;
    $sql= "select *from student_details where id between ? and ? ";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array($id1, $id2));
    while($data=$stmt->fetch()){ // assign to avariable as $data
        echo $data['id']." ". $data['name']."<br>";
    }
    /*
    OUTPUT:
    1 Abhi
    2 Hyder
    3 Tofayel
    4 Badhon
    */
    echo "<hr>";

    //--------------------------------------------------------


    $id3=1;
    $id4=6;
    $sql= "select *from student_details where id= ? or id= ? ";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array($id3, $id4));
    while($data=$stmt->fetch()){ // assign to avariable as $data
        echo $data['id']." ". $data['name']."<br>";
    }

    /*
    OUTPUT:

    1 Abhi
    6 Raz
    */
    echo "<hr>";

        //--------------------------------------------------------


        $name="Hyder";
        $dep="EEE";
        $sql= "select *from student_details where name= ? or department= ? ";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array($name, $dep));
        while($data=$stmt->fetch()){ // assign to avariable as $data
            echo $data['id']." ". $data['name']." ". $data['department']."<br>";
        }
    
        /*
        OUTPUT:
        
        1 Abhi EEE
        2 Hyder CSE
        4 Badhon EEE
        */
        echo "<hr>";