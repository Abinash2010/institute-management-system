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
    	$sub=$_GET['id'];
$db=getDB();


$sql1=$db->prepare("SELECT * FROM `Assignment` where Subject_Code=:di ");
$sql1->bindParam(':di',$sub,PDO::PARAM_STR);
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
 <section id="main-content" style="overflow-x: scroll;">
 <div style="padding-top: 100px;">
 
 
 		<table class="table table-bordered-primary">
      <tr>
          <th>Assignment No.</th>
          <th>Assignment Title</th>
          <th>Date</th>
          <th>Due</th>
          <th>ViewAssignmen</th>
        </tr>
<?php
      $count=1;
        foreach($data as $row)
        {
          echo '<tr>
          <th>'.$count.'</th>
          <th>'.$row['Title'].'</th>
          <th>'.$row['Date'].'</th>
          <th>'.$row['Due_date'].'</th>
        
          <th><a class="btn btn-primary " href="viewassignment.php?id='.$row['Assignment_id'].'&dept='.$id.'">'.'View'.'
            <a class="btn btn-danger " href="delete.php?id='.$row['Assignment_id'].'&sub='.$sub.'&dept='.$id.'">'.'Delete'.'
      <a class="btn btn-info " href="editassignment.php?id='.$row['Assignment_id'].'&sub='.$sub.'&dept='.$id.'">'.'Edit'.'</th>
        </tr>';
        $count++;
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