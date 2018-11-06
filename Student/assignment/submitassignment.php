<?php

 session_start();
    include '../../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Student.php');
       }
  else
    {
	$id=$_GET['dept'];
  $sub=$_GET['sub'];
   $a_id=$_GET['id'];
$db=getDB();

 $stmt=$db->prepare("SELECT * FROM `Assignment_Student` where Assignment_id=:id and Student_id=:std");
 $stmt->bindParam(':id',$a_id,PDO::PARAM_STR);
 $stmt->bindParam(':std',$temp,PDO::PARAM_STR);
 $stmt->execute();
 $stmt->fetch(PDO::FETCH_OBJ) ;
$count=$stmt->rowcount();
?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ;?>

<body>
  <?php include 'nav-header.php';
 ?>
 <?php include 'nav_sidebar.php' ; ?>
  <section id="container">


 <section id="main-content">
  
 	
 	<div class="row" style="padding-top: 90px;padding-left: 40px;padding-right: 40px;">
 <?php
if($count>0)
{
  echo '<h1>'.'Already Submitted Your Assignmen'.'</h1>';
}

else{
 	echo '<form action="add.php?dept='.$id.'&sub='.$sub.'&id='.$a_id.'" method="post" enctype="multipart/form-data">';
   
    echo '<label>'.'answer:'.'</label>
    <textarea class="form-control" name="ans" required=" " style="height: 300px;"></textarea>
    <label>'.'File:'.'</label>'.'(if any)'.'
    <input type="file" name="files"><br/>
   
    <br/>
    <button class="btn btn-primary" name="submit">'.'Submit'.'</button>
  </form>';
 
}
?>
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>