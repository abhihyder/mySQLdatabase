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
            $array= array_pop($arr);
            $input= array_keys($array);
            $sql= "INSERT INTO  $this->table(";
            foreach($input as $key){
                    $sql.= "$key, ";
                
            }
            $sql.= ") VALUES (";
            foreach($array as $key=>$val){
                    $sql.="$val, ";
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