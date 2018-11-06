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
$sql=$db->prepare("SELECT * FROM `Department` where Dept_id=:did");
$sql->bindParam(':did',$id,PDO::PARAM_STR);
$sql->execute();
$result=$sql->fetch(PDO::FETCH_OBJ);

$sql1=$db->prepare("SELECT * FROM `Faculty`,`Faculty_Login` where `Faculty`.Dept_id=:di and `Faculty_Login`.Faculty_id=`Faculty`.Faculty_id");
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
 
 		<table class="table table-bordered-primary">
      <tr>
        <th>Faculty Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Post</th>
        <th>date of Birth</th>
        <th>Joining Date</th>
        <th>User Name</th>
        <th>Delete </th>
      </tr>
      <?php foreach($data as $row)
      {
      echo '<tr><td>'.$row['Faculty_id'].'</td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Email'].'</td>
                <td>'.$row['Address'].'</td>
                <td>'.$row['Contact_no'].'</td>
                <td>'.$row['Post'].'</td>
                <td>'.$row['DOB'].'</td>
                <td>'.$row['Joining_date'].'</td>
                <td>'.$row['User_Name'].'</td>
                <td><a href="delete.php?id='.$row['Faculty_id'].'&dept='.$id.'" class="btn btn-danger">'.'Delete'.'</a><br/>
                    <a href="edit.php?id='.$row['Faculty_id'].'&dept='.$id.'" class="btn btn-success">'.'Edit'.'</a></td>
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