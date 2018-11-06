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
$db=getDB();


$sql=$db->prepare("SELECT * FROM `Student` where Student_id=:di ");
$sql->bindParam(':di',$temp,PDO::PARAM_STR);
$sql->execute();
$data=$sql->fetch(PDO::FETCH_OBJ);

$sql1=$db->prepare("SELECT * FROM `Class_scedule` where Class_Code=:cls ");
$sql1->bindParam(':cls',$data->Class_code,PDO::PARAM_STR);
$sql1->execute();
$data1=$sql1->fetchAll(PDO::FETCH_ASSOC);



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
  
 	
 	<div class="row" style="padding-top: 90px;padding-left: 20px;">
    <?php echo '<a href="viewgrade.php?dept='.$id.'" class="btn btn-success" style="float: right;margin-right: 50px;">'.'SGPA'.'</a>'; ?>
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Subject</th>
        <th>Semester</th>
        <th>Faculty</th>
       
      
      
      </tr>
      <?php foreach($data1 as $row)
      {
        $stmt=$db->prepare('SELECT * FROM `Class` where Class_Code=:cls');
        $stmt->bindParam(':cls',$row['Class_Code'],PDO::PARAM_STR);
        $stmt->execute();
        $data1=$stmt->fetch(PDO::FETCH_OBJ);

         $stmt1=$db->prepare('SELECT * FROM `Faculty` where Faculty_id=:fid');
        $stmt1->bindParam(':fid',$row['Faculty_id'],PDO::PARAM_STR);
        $stmt1->execute();
        $data2=$stmt1->fetch(PDO::FETCH_OBJ);

      $stmt3=$db->prepare('SELECT * FROM `Subject` where Subject_Code=:sid');
        $stmt3->bindParam(':sid',$row['Subject_Code'],PDO::PARAM_STR);
        $stmt3->execute();
        $data3=$stmt3->fetch(PDO::FETCH_OBJ);



      echo '<tr>
               <td> <a href="listexam.php?sub='.$data3->Subject_Code.'&dept='.$id.'">'.$data3->Subject_name.'</a></td>
                <td>'.$data1->Class_name.'</td>
                <td>'.$data2->Name.'</td>
               
               
               
      </tr>';
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