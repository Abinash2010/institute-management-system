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
    	$id=$_GET['id'];
      $dept=$_GET['sub'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Result` where Subject_code=:di ");
$sql1->bindParam(':di',$dept,PDO::PARAM_STR);

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
        <th>Marks</th>
      
     
      
      
      </tr>
     <?php
     foreach($data as $rows)
     {
      if($id==1)
      {
      echo '<tr><td>'.$rows['Student_id'].'</td>
                  <td>'.$rows['first'].'</td>
              
                  </tr>';
      }
      elseif($id==2)
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