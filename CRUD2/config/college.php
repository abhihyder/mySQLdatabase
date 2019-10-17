<?php
    include "db.php";

class college{
    public $table;
    private $name;
    private $dep;
    private $age;

    function setName($name){
        $this->name=$name;
    }

    function setDep($dep){
        $this->dep=$dep;
    }

    function setAge($age){
        $this->age=$age;
    }


    function insert(){
        try{
            $sql= "INSERT INTO $this->table (name, department, age) VALUES ( :name, :dep, :age)";
            $stmt= db::ownPrepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':dep', $this->dep);
            $stmt->bindParam(':age', $this->age);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Having problem to database connection, please try again!". $e->getMessage();
        }
        
    } 

    
// read all data 
    function readAll(){
        try{
            $sql= "SELECT * FROM $this->table;";
            $stmt= db::ownPrepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Having problem to database connection, please try again!". $e->getMessage();
        }
        
    }



}

?>