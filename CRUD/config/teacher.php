<?php

    include "college.php";

    class teacher extends college{
        protected $table='teacher_details';
        private $name;
        private $dep;
        private $age;
       

        //set data from user input
        public function setName($name){
            $this->name=$name;
        }

        public function setDep($dep){
            $this->dep=$dep;
        }

        public function setAge($age){
            $this->age=$age;
        }

        //create data into student_details
        public function insert(){
            try{
                $sql= "INSERT INTO $this->table(name, department, age) VALUES(:name, :dep, :age)";
                $stmt= db::ownPrepare($sql);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':dep', $this->dep);
                $stmt->bindParam(':age', $this->age);
                return $stmt->execute();
            
            }catch(PDOException $e){
                echo "Having problem to database connection, please try again!". $e->getMessage();
            }

        }


        
        // Data update
        public function update($id){
            try{
                $sql= "UPDATE $this->table SET name=:name, department=:dep, age=:age WHERE id=:id";
                $stmt= db::ownPrepare($sql);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':dep', $this->dep);
                $stmt->bindParam(':age', $this->age);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
         
            }catch(PDOException $e){
                echo "Having problem to database connection, please try again!". $e->getMessage();
            }

        }        
    }

?>