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
$a_id=$_GET['a_id'];
$std=$_GET['std_id'];
$sql1=$db->prepare("SELECT * FROM `Assignment_Student` where Assignment_id=:aid and Student_id=:sid ");
$sql1->bindParam(':aid',$a_id,PDO::PARAM_STR);
$sql1->bindParam(':sid',$std,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetch(PDO::FETCH_OBJ);

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
  
 	
 	<div class="row" style="padding-top: 150px;padding-left: 30px;padding-right: 30px;">
 	<div class="col-lg-offset-1 col-lg-10 col-sm-12 " >
      <?php
      echo '<h4 style="text-align: left;">'.$data->Answer.'</h4><br/><br/>';
      ?>
    </div>
   
    
    <div class="col-lg-offset-1 col-lg-7 col-sm-12 ">
    <?php
      if($data->Files!='')
      {
          echo '<br/><br/><a href="../../Assignment_uploads/'.$data->Files.'">'.'Download The File'.'</a><br/><br/>'; 
        
      }  echo '<h3>'.'Date       :'.$data->Date.'</h3>';
        
    ?>
  </div>
 
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>