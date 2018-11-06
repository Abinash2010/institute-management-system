<?php

 session_start();
    include '../../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Admin.php');
       }
  else
    {
	
$db=getDB();

$id=$_GET['id'];


$sql=$db->prepare('SELECT * FROM  `notification` where nid=:id');
$sql->bindParam(':id',$id,PDO::PARAM_STR);
$sql->execute();
$data=$sql->fetch(PDO::FETCH_OBJ);

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
 <?php	echo '<form action="edit.php?id='.$id.'" method="post" enctype="multipart/form-data">'; ?>
    <label>Title:</label>
   <?php echo '<input type="text" name="title" value='.$data->Title.' class="form-control" required=" ">'; ?>
    <label>About:</label>
   <?php echo '<textarea class="form-control" name="about" required=" " style="height: 300px;">'.$data->Description.'</textarea>'; ?>
   
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