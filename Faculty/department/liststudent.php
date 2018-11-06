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
      $cls=$_GET['class'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Student`,`Student_Login` where `Student`.Class_code=:di and `Student_Login`.Student_id=`Student`.Student_id");
$sql1->bindParam(':di',$cls,PDO::PARAM_STR);
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
        <th>Student Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Guardien Name</th>
        <th>Semester</th>
        <th>date of Birth</th>
        <th>Admission Date</th>
      
      </tr>
      <?php foreach($data as $row)
      {
        $stmt=$db->prepare('SELECT * FROM `Class` where Class_Code=:cls');
        $stmt->bindParam(':cls',$row['Class_code'],PDO::PARAM_STR);
        $stmt->execute();
        $data1=$stmt->fetch(PDO::FETCH_OBJ);

      echo '<tr><td>'.$row['Student_id'].'</td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Email'].'</td>
                <td>'.$row['Address'].'</td>
                <td>'.$row['Guardien'].'</td>
                <td>'.$data1->Class_name.'</td>
                <td>'.$row['DOB'].'</td>
                <td>'.$row['Admission_date'].'</td>
               
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