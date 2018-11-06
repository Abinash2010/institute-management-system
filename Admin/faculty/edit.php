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
    $fid=$_GET['id'];
    $dept=$_GET['dept'];
$db=getDB();
$sql2=$db->query("SELECT * FROM `Department`");
$sql2->execute();
$result2=$sql2->fetchAll(PDO::FETCH_ASSOC);

$sql=$db->prepare("SELECT * FROM `Department` where Dept_id=:did");
$sql->bindParam(':did',$dept,PDO::PARAM_STR);
$sql->execute();
$result=$sql->fetch(PDO::FETCH_OBJ);


$sql1=$db->prepare("SELECT * FROM `Faculty` ,`Faculty_Login` where `Faculty`.Faculty_id=:fid and `Faculty`.faculty_id=`Faculty_Login`.Faculty_id");
$sql1->bindParam(':fid',$fid,PDO::PARAM_STR);
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
 
 		<?php echo '<form class="forms" action="editfaculty.php?dept='.$dept.'&fid='.$fid.'" method="post">'; ?>
 		
 			<div class="col-md-6 col-xd-12">	<label >Faculty Name:</label>
 		<?php echo	'<input type="text" name="fnaem" value='.$result1->Name.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Email:</label>
 			  <?php echo  '<input type="email" name="email" value='.$result1->Email.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Address:</label>
 			  <?php echo  '<input type="text" name="addrs" value='.$result1->Address.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Contact Number:</label>
 			  <?php echo  '<input type="Number" name="no" value='.$result1->Contact_no.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12">	<label >DOB:</label>
 			  <?php echo  '<input type="date" name="DOB" value='.$result1->DOB.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Joining Date:</label>
 			  <?php echo  '<input type="date" name="jdate" value='.$result1->Joining_date.' class="form-control" placeholder=" "></div>'; ?>

 			<div class="col-md-6 col-xd-12"><label>Post:</label>
 			  <?php echo  '<input type="text" value='.$result1->Post.' name="post" class="form-control" placeholder=" "></div> '; ?>

 			<div class="col-md-6 col-xd-12"><label>User Name:</label>
 			  <?php echo  '<input type="text" name="uname"  value='.$result1->User_Name.' class="form-control" placeholder=" "></div>'; ?>
          <div class="col-md-6 col-xd-12"><label>Password:</label>
        <?php echo  $result1->Password; ?>
</div>
 			<div class="col-md-6 col-xd-12"><label>Department:</label>
 		 <?php echo  '<select class="form-control" name="cls"  id="dept" onchange="on();">
      <option value='.$result->Dept_id.'>'.$result->Dept_name.'</option>' ; ?>
      <?php 
      foreach($result2 as $rows)
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