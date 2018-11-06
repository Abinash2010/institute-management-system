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
      $exm=$_GET['exm_id'];
    	$id=$_GET['dept'];
      $sub=$_GET['sub'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Result` where  Subject_Code=:sub and Student_id=:std ");

$sql1->bindParam(':sub',$sub,PDO::PARAM_STR);
$sql1->bindParam(':std',$temp,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetchAll(PDO::FETCH_ASSOC);

$sql2=$db->prepare("SELECT * FROM `Subject` where Subject_Code=:subj ");
$sql2->bindParam(':subj',$sub,PDO::PARAM_STR);
$sql2->execute();
$data1=$sql2->fetch(PDO::FETCH_OBJ);


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
 
    <div class="col-lg-offset-3">  <h3><?php echo $data1->Subject_name; ?> </h3></div>
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Roll No</th>
        <th>Marks</th>
     
      
      
      </tr>
     <?php
     foreach($data as $rows)
     {
        if($exm==1)
      {
      echo '<tr><td>'.$rows['Student_id'].'</td>
                  <td>'.$rows['first'].'</td>
              
                  </tr>';
      }
      elseif($exm==2)
      {
      echo '<tr><td>'.$rows['Student_id'].'</td>
                  <td>'.$rows['second'].'</td>
              
                  </tr>';
      }
      else 
      {
      echo '<tr><td>'.$rows['Student_id'].'</td>
                  <td>'.$rows['end'].'</td>
              
                  </tr>';
      }

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