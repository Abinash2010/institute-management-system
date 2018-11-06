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

 $id=$_GET['id'];



$sql1=$db->prepare("SELECT * FROM `notification` where nid=:di order by nid desc");
$sql1->bindParam(':di',$id,PDO::PARAM_STR);
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
 		<div class="col-lg-offset-1 col-lg-9 col-sm-12 " >
 			<?php
 			echo '<h4 style="text-align: left;">'.$data->Title.'</h4><br/><br/>';
 			?>
 		</div>
 	
 		<div class="col-lg-offset-1 col-lg-9 col-sm-12 ">
 			<?php
 			echo '<h3 >'.'</h3><h5 style="text-align: left;"style="text-align: left;">'.$data->Description.'</h5><br/><br/>';
 			?>
 		</div>
 		
 		<div class="col-lg-offset-1 col-lg-7 col-sm-12 ">
 		<?php
 			if($data->file!='')
 			{
 					echo '<br/><br/><a href="../../notification/'.$data->file.'" download>'.'Download The File'.'</a><br/><br/>'; 
 				
 			}
 					echo '<h3>'.'Date       :'.$data->date.'</h3>';
 					
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