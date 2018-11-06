<?php

 session_start();
    include '../../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Admin.php');
       }
  else
    {$id=$_GET['class'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Subject` where Class_Code=:di ");
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
 
 
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Subject</th>
        <th>Semester</th> <th>Faculty</th>
      
      
      </tr>
      <?php foreach($data as $row)
      {
        $stmt=$db->prepare('SELECT * FROM `Class` where Class_Code=:cls');
        $stmt->bindParam(':cls',$row['Class_Code'],PDO::PARAM_STR);
        $stmt->execute();
        $data1=$stmt->fetch(PDO::FETCH_OBJ);

           $stmt2=$db->prepare('SELECT * FROM `Class_scedule` where Subject_Code=:sub');
        $stmt2->bindParam(':sub',$row['Subject_Code'],PDO::PARAM_STR);
        $stmt2->execute();
        $data2=$stmt2->fetch(PDO::FETCH_OBJ);
        $row1=$stmt2->rowcount();
      
      $stmt3=$db->prepare('SELECT * FROM `Subject` where Subject_Code=:sid');
        $stmt3->bindParam(':sid',$row['Subject_Code'],PDO::PARAM_STR);
        $stmt3->execute();
        $data3=$stmt3->fetch(PDO::FETCH_OBJ);

           $stmt4=$db->prepare('SELECT * FROM `Faculty` where Faculty_id=:fid');
        $stmt4->bindParam(':fid',$data2->Faculty_id,PDO::PARAM_STR);
        $stmt4->execute();
        $data4=$stmt4->fetch(PDO::FETCH_OBJ);



      echo '<tr>
                <td>'.$data3->Subject_name.'</td>
                <td>'.$data1->Class_name.'</td>';
                if($row1>0)
                 echo '<td>'.$data4->Name.'</td></tr>';
               else
                echo '<td>'.'Not assign'.'</td></tr>';
               
               
   
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