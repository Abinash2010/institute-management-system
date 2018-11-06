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
  
	$id=$_GET['dept'];
$db=getDB();


$sql=$db->prepare("SELECT * FROM `Class_scedule` where Faculty_id=:di ");
$sql->bindParam(':di',$temp,PDO::PARAM_STR);
$sql->execute();
$data=$sql->fetchAll(PDO::FETCH_ASSOC);


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
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Subject</th>
        <th>Semester</th>
        <th>Faculty</th>
        <th>Upload Attendence</th>
      
      
      </tr>
      <?php foreach($data as $row)
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
               <td> <a href="viewattendence.php?id='.$data3->Subject_Code.'&dept='.$id.'">'.$data3->Subject_name.'</a></td>
                <td>'.$data1->Class_name.'</td>
                <td>'.$data2->Name.'</td>
                <td><a href="uploadAttendence.php?sub='.$row['Subject_Code'].'&dept='.$id.'&cls='.$row['Class_Code'].'">'.'Upload'.'</a></td>
               
               
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