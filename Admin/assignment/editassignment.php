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
  

  $id=$_GET['id'];
  $sub=$_GET['sub'];
  $dept=$_GET['dept'];

$db=getDB();

$sql=$db->prepare('SELECT * FROM  `Assignment` where Assignment_id=:id');
$sql->bindParam(':id',$id);
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
 <?php	echo '<form action="edit.php?sub='.$sub.'&dept='.$dept.'&aid='.$id.'" method="post" enctype="multipart/form-data">'; ?>
    <label>Title:</label>
  <?php  echo '<input type="text" name="title" value='.$data->Title.' class="form-control" required=" ">;' ?>
    <label>Question:</label>
  <?php echo '<textarea class="form-control" name="qsn" required=" " style="height: 300px;">'.$data->Description.'</textarea>'; ?>
    <label>File:</label>*Optional
   <?php echo '<input type="file" value='.$data->File_Name.' name="files"><br/>'; ?>
    <label>Due Date:</label>
   <?php echo '<input type="date" value='.$data->Due_date.' name="time" required=" ">'; ?>
    <br/>
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