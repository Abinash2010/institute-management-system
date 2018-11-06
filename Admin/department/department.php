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
  	<div class="row" style="padding-top: 100px;">
 		<div class="col-lg-8 col-md-6 col-xs-12">
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
 			<td>'.$row['Dept_id'].'</td><td><a class="btn btn-danger" href="delete.php?dept='.$row['Dept_id'].'">Delete</a></tr>'; 
 		}

 	?>

 				</table>
 	
 </div>
 		</div>
 		<div class="col-lg-3 col-md-6 col-xs-12">
 			<div class="dashcard">
 			<form action="add.php" method="post">
 				<label >Departmen Name:</label>
 				<input type="text" class="form-control" name="dept" required=" ">
 				<label >Departmen Id:</label>
 				<input type="text" class="form-control" name="dept_id" required=" ">
 				<button class="btn btn-primary" style="margin-top: 10px;">Add</button>
 			</form>
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