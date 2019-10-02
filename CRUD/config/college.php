<?php

    include "db.php";

    class college{
        private $table='student_details';

        public function readAll(){
            $sql ="select * from $this->table";
            $stmt= db::prepareOwn($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

?>