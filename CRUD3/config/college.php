<?php
    include "db.php";

class college{
    public $table="student_details";


    function insert($arr){
        try{
            $lngt= count($arr);
            $i=0;
            $ii=0;
            $sql= "INSERT INTO  $this->table (";
            foreach($arr as $key=>$val){
                if(++$i<$lngt){
                    $sql.="$key, ";
                }else{
                    $sql.="$key";
                }
            }  
            $sql.= ") VALUES (";
            foreach($arr as $key=>$val){
                if(++$ii<$lngt){
                    $sql.="'".$val."', ";
                }else{
                    $sql.="'".$val."'";
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