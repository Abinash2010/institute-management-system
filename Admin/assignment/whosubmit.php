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
$assignment_id=$_GET['id'];


$sql1=$db->prepare("SELECT * FROM `Assignment_Student` where Assignment_id=:di ");
$sql1->bindParam(':di',$assignment_id,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetchAll(PDO::FETCH_ASSOC);

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
  
 	
 	<div class="row" style="padding-top: 90px;padding-left: 30px;padding-right: 30px;">
 	<table class="table table-bordered">
 		<tr><th>Roll No</th>
 		<th>View Assignment</th>
</tr>
<?php
	foreach($data as $row)
	{
		echo '<tr><td>'.$row['Student_id'].'</td>
					<td><a href="submittedassignment.php?a_id='.$assignment_id.'&std_id='.$row['Student_id'].'">'.'View'.'</a></td></tr>';
	}

?>
 	</table>
 
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>