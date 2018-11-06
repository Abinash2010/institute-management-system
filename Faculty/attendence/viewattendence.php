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


$sql1=$db->prepare("SELECT * FROM `Attendence` where Subject_code=:di ");
$sql1->bindParam(':di',$sub,PDO::PARAM_STR);
$sql1->execute();
$data=$sql1->fetchAll(PDO::FETCH_ASSOC);

$sql2=$db->prepare("SELECT * FROM `Attendence` where Subject_code=:dis ");
$sql2->bindParam(':dis',$sub,PDO::PARAM_STR);
$sql2->execute();
$data2=$sql2->fetch(PDO::FETCH_OBJ);

 $sql3=$db->prepare("SELECT * FROM `Student` where Class_code=:cls ");
        $sql3->bindParam(':cls',$data2->Class_code,PDO::PARAM_STR);
        $sql3->execute();
        $data3=$sql3->fetchAll(PDO::FETCH_ASSOC);
  




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
                            <th>Roll No</th>
                            <?php
                            
          foreach($data as $row)
            {
                  echo '<th class="attendence">'.$row['Date'].'</th>';
            
                                     
                            
                }
                echo '</tr><tr>';             
                        
      

    

          foreach($data3 as $rows1)
          {
              
           $sql4=$db->prepare("SELECT * FROM `Attendence_student` where Student_id=:std and Faculty_id=:fid");
            $sql4->bindParam(':std',$rows1['Student_id'],PDO::PARAM_STR);
             $sql4->bindParam(':fid',$data2->Faculty_id,PDO::PARAM_STR);
            $sql4->execute();
            $data4=$sql4->fetchAll(PDO::FETCH_ASSOC);

            echo '<tr><td>'.$rows1['Student_id'].'</td>';
            foreach($data4 as $rows2)
            {
              if($rows2['Status']==1)
                $status='P';
              else
                $status='A';
               echo '<td class="attendence">'.$status.'</td>';
            }
            echo '</tr>';
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