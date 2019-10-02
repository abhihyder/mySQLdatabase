<?php
    
    include "config.php";


    class db{
        private static $pdo;

        public static function connection(){
           
           if(!isset(self::$pdo)){
                try{
                    self::$pdo= new PDO ('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER<DB_PASS);

                }catch(PDOException $e){
                    echo $e->getMessage();
                }
           }

        }
        public static function prepareOwn($sql){
            return self::connection()->prepare($sql);

        }
    }


?>