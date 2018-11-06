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
  
	$id=$_GET['cls'];
  $sub=$_GET['sub'];
  $dept=$_GET['dept'];

$db=getDB();

$sql=$db->query('SELECT * FROM `Exam`');
$sql->execute();
$data=$sql->fetchAll(PDO::FETCH_ASSOC);

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
  
 	
 	<div class="row" style="padding-top: 190px;">
    <div class="col-lg-offset-3 col-lg-5 col-md-offset-3 col-md-5 col-xs-12">
    <div class="jumbotron">
     <center> 
 	<?php echo '<form action="add.php?sub='.$sub.'&dept='.$id.'" method="post" enctype="multipart/form-data" style="padding-top:28px;">'; ?>

    <label>Upload Result Sheet:</label>
    <input type="file" name="files" class="form-control">
    <br/>
    <select class="form-control" name="type" >
      <option  >Chhose Exam</option>
      <?php
        foreach($data as $rows)
        {
          echo '<option value='.$rows['Exam_id'].'>'.$rows['Exam_name'].'</option>';
        }
      ?>
    </select><br/>
   
    <button class="btn btn-primary">Upload</button>
  </form>
</center>
</div>
 </div>
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>