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
  
 <div style="padding-top: 100px;" class="row">
   <center><h2><?php echo $result->Dept_name.'  '.'Department'; ?></h2></center>
  <div class="col-lg-12 col-md-12 col-xs-12">
 
  <div class="jumbotron">
    <table class="table">

 <?php
  foreach($data as $box)
  {
    echo '<tr><td>'.$box['Class_name'].'</td>
                <td><a href="listsubject.php?class='.$box['Class_Code'].'" class=""btn btn-info>'.'View'.'</td></tr>';
    }
 ?>
    </table>
    </div>
 
 </div>
</div>
</section>

</body>
</html>
<?php
}
?>