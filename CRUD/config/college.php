<?php

    include "db.php";

    abstract class college{
        protected $table;

       abstract public function insert();       
       abstract public function update($id); 
       
       


       
        //--------------------------------------
        // read data from student_details
        public function readAll(){
            try{
            $sql= "SELECT * FROM $this->table";
            $stmt= db::ownPrepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
         
            }catch(PDOException $e){
                echo "Having problem to database connection, please try again!". $e->getMessage();
            }
        }





        public function showById($id){
            try{
                $sql= "SELECT * FROM $this->table WHERE id= :id";
                $stmt= db::ownPrepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetch();
             
            }catch(PDOException $e){
                echo "Having problem to database connection, please try again!". $e->getMessage();
            }
        }


        // Delete data
        public function delete($id){
            try{
                $sql= "DELETE FROM $this->table WHERE id=:id";
                $stmt= db::ownPrepare($sql);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
         
            }catch(PDOException $e){
                echo "Having problem to database connection, please try again!". $e->getMessage();
            }

        }
    }
?>