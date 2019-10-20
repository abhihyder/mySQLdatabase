<?php
 include "inc/header.php";

 spl_autoload_register(function($class){
   include "config/".$class.".php";
 });

 $student= new college();

?>
  

<section class="mainleft">
   <span>Insert Student Details:-</span>
  <form action="insertData.php" method="post">
    <table>
      <tr>
          <td>Name: </td>
          <td><input type="text" name="name" placeholder="Student name" /></td>    
      </tr>
 
      <tr>
        <td>Department: </td>
          <td><input type="text" name="department"placeholder="Student department" /></td>
      </tr>

      <tr>
        <td>Age: </td>
          <td><input type="text" name="age" placeholder="Student age" /></td>
      </tr> 
      
      <tr>
        <td></td>
          <td>
          <input type="submit" name="create" value="Create"/>
          <input type="reset" value="Clear"/>
          </td>
      </tr>
    </table>
  </form>

  <?php
  

/*
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
    }*/
?>
</section>



<section class="mainright">
  <table class="tblone">
  <span style="float:right"><a href="index_student.php">Students data</a> || <a href="index_teacher.php">Teachers data</a></span>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php
      foreach($student->readAll() as $data){
    ?>
      <tr>
      <td><?php echo $data['id']; ?></td>
      <td><?php echo $data['name']; ?></td>
      <td><?php echo $data['department']; ?></td>
      <td><?php echo $data['age']; ?></td>
      <td>
      <a href=''>Edit</a> ||
      <a href=''>Delete</a>
      </td>
  </tr>

    <?php } ?>

  </table>
</section>


<?php include "inc/footer.php"; ?>