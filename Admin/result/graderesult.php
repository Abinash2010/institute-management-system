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
      $cls=$_GET['class'];
      $dept=$_GET['dept'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Student` where Class_code=:cls ");
$sql1->bindParam(':cls',$cls,PDO::PARAM_STR);

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
 
 
    <table class="table table-bordered-primary">
      <tr>
       
        <th>Roll No</th>
        <th>Grade</th>
        <th>View</th>
      
     
      
      
      </tr>
     <?php
     foreach($data as $rows)
     {

      $sql1=$db->prepare('SELECT * FROM  `Result` where Student_id=:stds');
      $sql1->bindParam(':stds',$rows['Student_id']);
      $sql1->execute();
      $data1=$sql1->fetchAll(PDO::FETCH_ASSOC);
      $upper=0;
      $down=0;
      foreach($data1 as $row1){

        $sql2=$db->prepare('SELECT * FROM  `Subject` where Subject_Code=:sub');
      $sql2->bindParam(':sub',$row1['Subject_Code']);
      $sql2->execute();
      $data2=$sql2->fetch(PDO::FETCH_OBJ);

        $sql3=$db->prepare('SELECT * FROM  `grade` where Grade=:grd');
      $sql3->bindParam(':grd',$row1['grade']);
      $sql3->execute();
      $data3=$sql3->fetch(PDO::FETCH_OBJ);
      $upper=$upper+($data3->point)*($data2->Credit);
      $down=$down+$data2->Credit;


      }
   if($down!=0)
   {
      $total=$upper/$down;
 
      echo '<tr><td>'.$rows['Student_id'].'</td>
                  <td>'.round($total,2).'</td>
                  <td><a href="viewgraderesult.php?class='.$cls.'&std='.$rows['Student_id'].'" class="btn btn-success">'.'View Grade'.'</a></td>
              
                  </tr>';
                }

      


     }
     if($down!=0)
      echo 'No resulti is Present';

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