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
  $exm=$_GET['exm_id'];
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
      <div class="col-lg-offset-3 col-lg-4 col-md-offset-3 col-md-5 col-xs-12">
 	<?php echo '<form action="add.php?sub='.$sub.'&dept='.$id.'&exm_id='.$exm.'" method="post" enctype="multipart/form-data" style="padding-left:40%;padding-top:35px;">'; ?>

    <label>Upload Result Sheet:</label>
    <input type="file" name="files" class="form-control">
   
    <button class="btn btn-primary">Upload</button>
  </form></div>
 </div>
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>