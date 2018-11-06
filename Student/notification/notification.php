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
  
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Title</th>
        <th>View</th>
       
       
      
      
      </tr>
      <?php foreach($data as $row)
      {
        
      echo '<tr><td>'.$row['Title'].'</td>
               <td> <a href="viewnotification.php?id='.$row['nid'].'">'.'View'.'</a></td>
              
               
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