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
	<div class="row" style="padding-top: 100px;">
 		<div class="col-lg-12 col-md-12 col-xs-12">
 			<div class="jumbotron">
 				<table class="table">
 					<tr>
 						<th >Department Name</th>
 						<th>Department Code</th>
 					</tr>
 					<?php
 		$sql=$db->query("SELECT * FROM `Department`");
 		$sql->execute();
 		$data=$sql->fetchAll(PDO::FETCH_ASSOC);
 		foreach($data as $row)
 		{
 			echo '<tr><td><a style="margin-right:20px;padding-left:20px;" href="about.php?dept='.$row['Dept_id'].'">'.$row['Dept_name'].'</a></td>
 			<td>'.$row['Dept_id'].'</td></tr>'; 
 		}

 	?>

 				</table>
 	
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