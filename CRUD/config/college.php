<?php

    include "db.php";

    class college{
        private $table='student_details';
        private $name;
        private $dep;
        private $age;

        public function setName($name){
            $this->name= $name;
          
        }

        public function setDep($dep){
            $this->dep= $dep;
        }

        public function setAge($age){
            $this->age= $age;
        }

        public function insert(){
            $sql= "INSERT INTO $this->table(name, department, age) VALUES(:name, :dep, :age)";
            $stmt= db::prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':dep', $this->dep);
            $stmt->bindParam(':age', $this->age);
            return $stmt->execute();
        }

        public function readAll(){
            $sql ="select * from $this->table";
            $stmt= db::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>