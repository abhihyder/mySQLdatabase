<?php
 spl_autoload_register(function($class){
    include "config/".$class.".php";
  });
 
  $student= new college();
  


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['create'])){
    $arr=[
        'name'       => $_POST['name'],
        'department' => $_POST['dep'],
        'age'        => $_POST['age']
    ];


    $student->insert($arr);

    header('location:index.php');
}

/*
 spl_autoload_register(function($class){
   include "config/".$class.".php";
 });

 $student= new college();
 
  

 $msgErr= " ";
 $name= $dep= $age=" ";
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['create'])){
    
     if(empty($_POST['name'])){  //we can catch POST/GET both method data by $_POST.
         $msgErr= "Field must not be empty.";
     }
     else{
         $name=validation($_POST['name']);
         if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
          $msgErr = "Only letters and white space allowed";
             }
     }
    
     if(empty($_POST['dep'])){  //we can catch POST/GET both method data by $_POST.
         $msgErr= "Field must not be empty.";
     }
     else{
         $dep=validation($_POST['dep']);
         if (!preg_match("/^[a-zA-Z ]*$/", $dep)) {
          $msgErr = "Only letters and white space allowed";
             }
     }
     if(empty($_POST['age'])){  //we can catch POST/GET both method data by $_POST.
         $msgErr= "Field must not be empty.";
     }
     else{
         $age=validation($_POST['age']);
         if (!preg_match("/^[0-9]*$/", $age)) {
          $msgErr = "Only numerical values are allowed";
             }
     }


    $student->setName($name);
    $student->setDep($dep);
    $student->setAge($age);
    $student->insert();

    
 }
 function validation($formdata){
     $formdata= trim($formdata);
     $formdata= stripcslashes($formdata);
     $formdata= htmlspecialchars($formdata);
     return $formdata;
 }

 header('location:index.php');*/

?>



