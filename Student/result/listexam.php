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
    	$sub=$_GET['sub'];
      $id=$_GET['dept'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Exam`");

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
 <div style="padding-top: 200px;">
 <?php
 foreach($data as $row)
{
  echo '<div class="  col-lg-4 col-md-6 col-xs-12">
      <a href="viewresult.php?exm_id='.$row['Exam_id'].'&sub='.$sub.'&dept='.$id.'"><div class="card3">
        <center><h2 class="cardtxt">'.$row['Exam_name'].'</h2></center>
      </div></a><br/>
    </div>';
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