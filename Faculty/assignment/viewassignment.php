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
 $id=$_GET['dept'];

$sql1=$db->prepare("SELECT * FROM `Assignment` where Assignment_id=:di ");
$sql1->bindParam(':di',$assignment_id,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetch(PDO::FETCH_OBJ);

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
  
 	
 	<div class="row" style="padding-top: 90px;">
 		<div class="col-lg-offset-1 col-lg-10 col-sm-12 " >
 			<?php
 			echo '<h4 style="text-align: left;">'.$data->Title.'</h4><br/><br/>';
 			?>
 		</div>
 		<div class="col-lg-offset-1 col-lg-9 col-sm-12 ">
 			<?php
 			echo '<h3 >'.'<b>Question:</b style="left-padding:20px;"></h3><h5 style="text-align: left;"style="text-align: left;">'.$data->Description.'</h5><br/><br/>';
 			?>
 		</div>
 		
 		<div class="col-lg-offset-1 col-lg-7 col-sm-12 ">
 		<?php
 			if($data->File_Name!='')
 			{
 					echo '<br/><br/><a href="../../Assignment/'.$data->File_Name.'">'.'Download The File'.'</a><br/><br/>'; 
 				
 			}
 					echo '<h3>'.'Date       :'.$data->Date.'</h3>';
 					echo '<h3>'.'Due Date   :'.$data->Due_date.'</h3>';
 					 echo '<a style="float:right;margin-top:-30px;" href="whosubmit.php?id='.$assignment_id.'&dept='.$id.'">'.'Assignment done by'.'</a>';
 		?>
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