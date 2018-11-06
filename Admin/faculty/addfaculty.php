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
$sql=$db->query("SELECT * FROM `Department`");
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

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
 
 		<form class="forms" action="add.php" method="post">
 		
 			<div class="col-md-6 col-xd-12">	<label >Faculty Name:</label>
 			<input type="text" name="fnaem" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Email:</label>
 			<input type="email" name="email" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Address:</label>
 			<input type="text" name="addrs" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Contact Number:</label>
 			<input type="Number" name="no" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12">	<label >DOB:</label>
 			<input type="date" name="DOB" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Joining Date:</label>
 			<input type="date" name="jdate" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Post:</label>
 			<input type="text" name="post" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>User Name:</label>
 			<input type="text" name="uname" class="form-control" placeholder=" "></div>

 			<div class="col-md-6 col-xd-12"><label>Department:</label>
 		<select class="form-control" name="cls" id="dept" onchange="on();">
      <option>Choose Your Department</option>
      <?php 
      foreach($result as $rows)
      {
        echo '<option value="'.$rows['Dept_id'].'">'.$rows['Dept_name'].'</option>';
      }
      ?>
    </select></div>
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