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
    	$cls=$_GET['class'];
      $std=$_GET['std'];
$db=getDB();
  




?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ;?>

<body>
  <section id="container">


 <section id="main-content">
 <div style="padding-top: 100px;">
 
 
 		<table class="table table-bordered-primary">
      <tr>
       
        <th>Subject</th>
        <th>Grades</th>
      
     
      
      
      </tr>
  
   <?php
    
    $sql1=$db->prepare('SELECT * FROM  `Result` where Student_id=:std');
      $sql1->bindParam(':std',$std);
      $sql1->execute();
      $data1=$sql1->fetchAll(PDO::FETCH_ASSOC);
      $upper=0;
      $down=0;
      foreach($data1 as $row1){

        $sql2=$db->prepare('SELECT * FROM  `Subject` where Subject_Code=:sub');
      $sql2->bindParam(':sub',$row1['Subject_Code']);
      $sql2->execute();
      $data2=$sql2->fetch(PDO::FETCH_OBJ);

        $sql3=$db->prepare('SELECT * FROM  `grade` where Grade=:grd');
      $sql3->bindParam(':grd',$row1['grade']);
      $sql3->execute();
      $data3=$sql3->fetch(PDO::FETCH_OBJ);
      $upper=$upper+($data3->point)*($data2->Credit);
      $down=$down+$data2->Credit;

          $total=$upper/$down;
        
      echo '<tr><td>'.$data2->Subject_name.'</td>
                  <td>'.$row1['grade'].'</td>
                 
              
                  </tr>';

      
      }
        echo '<h1>'.'SGPA:'.round($total,2).'</h1>';
    


     


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