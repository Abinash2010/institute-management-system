<?php

 session_start();
    include '../../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Faculty.php');
       }
  else
    {
  
$id=$_GET['dept'];	
$db=getDB();



?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ;?>

<body>
  <section id="container">

<?php include 'nav-header.php';
 ?>
 <?php include 'nav_sidebar.php' ; ?>
 <section id="main-content">
  
 	
 	<div class="row" style="padding-top: 90px;padding-left: 40px;padding-right: 40px;">
 <?php	echo '<form action="add.php" method="post" enctype="multipart/form-data">'; ?>
    <label>Title:</label>
    <input type="text" name="title" class="form-control" required=" ">
    <label>About:</label>
    <textarea class="form-control" name="about" required=" " style="height: 300px;"></textarea>
    <label>File:</label>*Optional
    <input type="file" name="files"><br/>
    
    <button class="btn btn-primary" name="submit">Submit</button>
  </form>
 
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>