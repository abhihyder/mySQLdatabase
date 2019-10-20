<?php
    include "db.php";

class college{
    public $table="student_details";
    //public $table2="demo";
  /*  private $name;
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

*/


    function insert($arr){
        try{
            $sql= "INSERT INTO $this->table(";
            foreach($arr as $key=>$val){
                if(array_key_exists($key, $this->table)){
                    $sql.= "$Key, ";
                }
            }
            $sql.= ") VALUES (";
            foreach($arr as $key=>$val){
                if(array_key_exists($key, $this->table)){
                    $sql.="$val, ";
                }
            }
            $sql.=")";

            $stmt= db::ownPrepare($sql);
            return $stmt->execute($arr);
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