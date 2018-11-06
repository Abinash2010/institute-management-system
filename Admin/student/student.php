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
  
 	<div class="row dashcard">
 		<div class="col-lg-offset-3 col-lg-3 col-md-6 col-xs-12">
 			<a href="addstudent.php"><div class="card1">
 				<center><h2 class="cardtxt">Register Student</h2></center>
 			</div></a><br/>
 		</div>
 		<div class="col-lg-3 col-md-6 col-xs-12">
 		<a href="liststudent.php">	<div class="card2">
 				<center><h2 class="cardtxt">Show Student</h2></center>
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