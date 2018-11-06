<?php

 session_start();
    include '../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../Admin.php');
       }
  else
    {
   
$db=getDB();
$sql1=$db->prepare('SELECT * FROM `Student` where Student_id=:id');
$sql1->bindParam(':id',$temp,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetch(PDO::FETCH_OBJ);




$sql1=$db->prepare("SELECT * FROM `Student` ,`Student_Login` where `Student`.Student_id=:sid and `Student`.Student_id=`Student_Login`.Student_id");
$sql1->bindParam(':sid',$temp,PDO::PARAM_STR);
$sql1->execute();
$result1=$sql1->fetch(PDO::FETCH_OBJ);


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
  <div style="padding-top: 100px;">
 	<center><h2>REGISTER FACULTIES</h2></center>
 
 		<?php echo '<form class="forms" action="editstudent.php?id='.$temp.'" method="post">'; ?>
 		
 			<div class="col-md-6 col-xd-12">	<label >Student Name:</label>
 		<?php echo	'<input type="text" name="fnaem" value='.$result1->Name.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Email:</label>
 			  <?php echo  '<input type="email" name="email" value='.$result1->Email.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Address:</label>
 			  <?php echo  '<input type="text" name="addrs" value='.$result1->Address.' class="form-control" placeholder=" "></div>'; ?>

 		
 			<div class="col-md-6 col-xd-12">	<label >DOB:</label>
 			  <?php echo  '<input type="date" name="DOB" value='.$result1->DOB.' class="form-control" placeholder=" "></div>'; ?>

 			

 			<div class="col-md-6 col-xd-12"><label>Guardian Name:</label>
 			  <?php echo  '<input type="text" name="parents" value="'.$result1->Guardien.'"  class="form-control" placeholder=" "></div> '; ?>

 			<div class="col-md-6 col-xd-12"><label>User Name:<?php echo 
$result1->User_Name
; ?></label> 
 			  </div>
          <div class="col-md-6 col-xd-12"><label>Password:</label>
        <?php echo   '<input type="text" name="password" value="'.$result1->Password.'"  class="form-control" placeholder=" "></div> '; ?>
</div>
 			
 		  		<div style="margin-top: 5px;" class="col-lg-offset-4 col-md-offset-4 col-xs-12"><button class="btn btn-primary">Submit</button></div>
 		
 		</form>
 </div>
 </section>
</section>
</body>
</html>
<?php
}
?>