<?php

 session_start();
    include '../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../index.php');
       }
  else
    {
$db=getDB();

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
    <div class=" col-lg-3 col-md-6 col-xs-12">
  <?php  echo '<a href="faculty/faculty.php"><div class="card1">'; ?>
        <center><h2 class="cardtxt">Faculty</h2></center>
      </div></a><br/>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
 <?php  echo'<a href="student/student.php">  <div class="card2">'; ?>
        <center><h2 class="cardtxt">Student</h2></center>
      </div></a><br/>
    </div>
    <div class="  col-lg-3 col-md-6 col-xs-12">
      <a href="department/department.php"><div class="card3">
        <center><h2 class="cardtxt">Department</h2></center>
      </div></a><br/>
    </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="attendence/attendence.php"><div class="card1">
        <center><h2 class="cardtxt">Attendence</h2></center>
      </div></a><br/>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
    <a href="subject/subject.php">  <div class="card2">
        <center><h2 class="cardtxt">Subject</h2></center>
      </div></a><br/>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="assignment.php"><div class="card3">
        <center><h2 class="cardtxt">Assignment</h2></center>
      </div></a><br/>
    </div>
   
    <div class="col-lg-3 col-md-6 col-xs-12">
      <a href="result/result.php"><div class="card3">
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