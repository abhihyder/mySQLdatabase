<?php
 include "inc/header.php";
 
 spl_autoload_register(function($class){
   include "config/".$class.".php";
 });

  $user= new student();
?>


<section class="mainleft">
<?php
    //update data by id
    if(isset($_GET['action']) && $_GET['action']=='update'){
      $id=$_GET['id'];
      $show=$user->showById($id);  // assign to method of college class
    
?>
  <span>Update Student Details:-</span>
  <form action="" method="post">
    <table>
    <input type="hidden" name="id" value="<?php echo $show['id'];?>" required="1"/>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" value="<?php echo $show['name'];?>" required="1"/></td>    
        </tr>

        <tr>
          <td>Department: </td>
            <td><input type="text" name="dep" value="<?php echo $show['department'];?>" required="1"/></td>
        </tr>

        <tr>
          <td>Age: </td>
            <td><input type="text" name="age" value="<?php echo $show['age'];?>" required="1"/></td>
        </tr>
        <tr>
          <td></td>
            <td>
            <input type="submit" name="update" value="Update"/>
            </td>
        </tr>
      </table>
  </form>
<?php
    if (isset($_POST['update'])){
      $id   =$_POST['id'];
      $name =$_POST['name'];
      $dep  =$_POST['dep'];
      $age  =$_POST['age'];


      $user->setName($name); // assign to method of college class
      $user->setDep($dep);
      $user->setAge($age);
     
      if($user->update($id)){
        echo "<span class='insert' >ID ".$id." updated successfully!</span>";
      }
    }
}else{ ?>
   <span>Insert Student Details:-</span>
  <form action="" method="post">
    <table>
      <tr>
          <td>Name: </td>
          <td><input type="text" name="name" placeholder="Student name" required="1"/></td>    
      </tr>

      <tr>
        <td>Department: </td>
          <td><input type="text" name="dep"placeholder="Student department" required="1"/></td>
      </tr>

      <tr>
        <td>Age: </td>
          <td><input type="text" name="age" placeholder="Student age" required="1"/></td>
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
  //receive data from html form
    if (isset($_POST['create'])){
      $name =$_POST['name'];
      $dep  =$_POST['dep'];
      $age  =$_POST['age'];


      $user->setName($name); // assign to method of college class
      $user->setDep($dep);
      $user->setAge($age);
     
      if($user->insert()){
        echo "<span class='insert' >Data inserted successfully!</span>";
      }
    }

  }
?>
<?php
    //Delet data by id
    if(isset($_GET['action']) && $_GET['action']=='delete'){
      $id=$_GET['id'];
      if($user->delete($id)){
        echo "<span class='delete' >ID ".$id." deleted successfully!</span>";
      }
    }
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
        foreach($user->readAll() as $value){


    ?>
      <tr>
      <td><?php echo $value['id'];?></td>
      <td><?php echo $value['name'];?></td>
      <td><?php echo $value['department'];?></td>
      <td><?php echo $value['age'];?></td>
      <td>
      <?php echo "<a href='index_student.php?action=update&id=".$value['id']."'>Edit</a>";?> ||
      <?php echo "<a href='index_student.php?action=delete&id=".$value['id']."' onclick='return confirm(\"Are you sure you want to delete this data?\")'>Delete</a>";?>
      </td>
  </tr>
<?php } ?>


  </table>
</section>










<?php include "inc/footer.php"; ?>