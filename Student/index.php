<?php

 session_start();
    include '../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../Student.php');
       }
  else
    {
$db=getDB();

$sql=$db->prepare('SELECT * FROM `Student` where Student_id=:id');
$sql->bindParam(':id',$temp,PDO::PARAM_STR);
$sql->execute();
$data=$sql->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ?>
<body>
  <section id="container">

<?php include 'nav-header.php' ;?>
<?php include 'nav_sidebar.php' ;?>
<section id="main-content">
  

 	<div class="success">
 		<?php
 			if(isset($_GET['msg']) && $_GET['msg']=='success')
 			{
 				echo '<center><p>'.'You are Successfully login'.'</p></center>';
 			}
 		?>
 	</div>
  <div class="row dashcar">
    
        <div class="col-lg-3 col-md-6 col-xs-12">
   <?php  echo ' <a href="attendence/attendence.php?dept='.$data->Dept_id.'"><div class="card1">'; ?>
        <center><h2 class="cardtxt">Attendence</h2></center>
      </div></a><br/>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
   <?php  echo' <a href="subject/subject.php?dept='.$data->Dept_id.'">  <div class="card2">'; ?>
        <center><h2 class="cardtxt">Subject</h2></center>
      </div></a><br/>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
     <?php  echo' <a href="assignment/assignment.php?dept='.$data->Dept_id.'"><div class="card3">'; ?>
        <center><h2 class="cardtxt">Assignment</h2></center>
      </div></a><br/>
    </div>
    
    <div class="col-lg-3 col-md-6 col-xs-12">
     <?php  echo' <a href="result/result.php?dept='.$data->Dept_id.'"><div class="card3">'; ?>
        <center><h2 class="cardtxt">Result</h2></center>
      </div></a><br/>
    </div>
    
  </div>
 </section>
</section>
 	
</body>
</html>
<?php
}
?>