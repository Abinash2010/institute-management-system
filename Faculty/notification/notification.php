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



$sql=$db->prepare("SELECT * FROM `notification` order by nid desc");
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
  <?php echo '<a style="float: right;padding-right: 30px;" href="uploadnotification.php?dept='.$id.'">Add notification</a>'; ?>
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Title</th>
        <th>View</th>
       
       
      
      
      </tr>
      <?php foreach($data as $row)
      {
        
      echo '<tr><td>'.$row['Title'].'</td>
               <td> <a href="viewnotification.php?id='.$row['nid'].'" class="btn btn-primary">'.'View'.'</a>
                  <a href="delete.php?id='.$row['nid'].'" class="btn btn-danger">'.'Delete'.'</a>
                <a href="editnoti.php?id='.$row['nid'].'&dept='.$id.'" class="btn btn-info">'.'Edit'.'</a>
               </td>
              
               
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