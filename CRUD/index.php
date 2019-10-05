<?php
 include "inc/header.php";

 spl_autoload_register(function($class){
   include "config/".$class.".php";
 })
 ?>

 <?php
  $user= new college();
 ?>


<section class="mainleft">
<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dep" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="create" value="Submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>
<?php
    if (isset($_POST['create'])){
      $name =$_POST['name'];
      $dep  =$_POST['dep'];
      $age  =$_POST['age'];


      $user->setName($name);
      $user->setDep($dep);
      $user->setAge($age);
      if($user->insert()){
        echo "<span class='insert' >Data inserted successfully!</span>";
      }
    }

?>
</section>



<section class="mainright">
  <table class="tblone">

    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php
    $i=0;
    foreach($user->readAll() as $value){
      $i++;
    ?>
      <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $value['name'];?></td>
      <td><?php echo $value['department'];?></td>
      <td><?php echo $value['age'];?></td>
      <td>
      <a href="">Edit</a> ||
      <a href="">Delete</a>
      </td>
  </tr>
<?php } ?>


  </table>
</section>










<?php include "inc/footer.php"; ?>