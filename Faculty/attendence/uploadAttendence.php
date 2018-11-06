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
  $sub=$_GET['sub'];
  $cls=$_GET['cls'];
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
  
 	
 	<div class="row" style="padding-top: 190px;padding-left: 20px;">
    <div class="card2">
 	<?php echo '<form action="add.php?sub='.$sub.'&dept='.$id.'&cls='.$cls.'" method="post" enctype="multipart/form-data" style="padding-left:40%;padding-top:35px;">'; ?>
    <label>Upload Attendnece Sheet:</label>
    <input type="file" name="files">
    <label>Date:</label>
    <input type="date" name="time">
    <label>Day:</label>
    <input type="text" name="day">
    <button class="btn btn-primary">Upload</button>
  </form></div>
 
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>