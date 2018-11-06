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
      $id=$_GET['dept'];
$db=getDB();
$sql=$db->prepare("SELECT * FROM `Department` where Dept_id=:id");

$sql->bindParam(':id',$id,PDO::PARAM_STR);
$sql->execute();
$result=$sql->fetch(PDO::FETCH_OBJ);

$sql1=$db->prepare("SELECT * FROM `Class` where Dept_id=:di ");
$sql1->bindParam(':di',$id,PDO::PARAM_STR);
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
 <div style="padding-top: 100px;">
  <center><h2><?php echo $result->Dept_name.'  '.'Department'; ?></h2></center>
  <div style="margin-top: 60px;">
 <?php
  foreach($data as $box)
  {
    echo '<div  class="col-lg-offset-1 col-lg-3 col-md-6 col-xs-12">
    <a href="liststudent.php?class='.$box['Class_Code'].'&dept='.$id.'"><div style="margin-top30px;" class="card10">
        <center><h2 class="cardtxt">'.$box['Class_name'].'</h2></center>
      </div></a><br/></div>';
    }
 ?>
    
    </div>
 
 </div>
</section>
</section>
</body>
</html>
<?php
}
?>
