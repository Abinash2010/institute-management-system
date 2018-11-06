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
	
$db=getDB();
$id=$_GET['dept'];

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
 	
 	<div class="row dashcard" style="padding-top: 20%;">
 		<div class="col-lg-offset-1 col-lg-3 col-md-6 col-xs-12">
 		<?php echo	'<a href="listfaculties.php?dept='.$id.'"><div class="card1">'; ?>
 				<center><h2 class="cardtxt">Faculty</h2></center>
 			</div></a><br/>
 		</div>
 		<div class="col-lg-3 col-md-6 col-xs-12">
 		<?php
 		echo '<a href="listclass.php?dept='.$id.'"><div class="card2">'; ?>
 				<center><h2 class="cardtxt">Student</h2></center>
 			</div></a><br/>
 		</div>
 		<div class="col-lg-3 col-md-6 col-xs-12">
 			<?php
 		echo '<a href="class.php?dept='.$id.'">	<div class="card2">'; ?>
 				<center><h2 class="cardtxt">Subject</h2></center>
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