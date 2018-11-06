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
    	$id=$_GET['id'];
      $sub=$_GET['sub'];
      $dept=$_GET['dept'];
    
    	$db=getDB();
      $dir='../../Assignment/';

      $sql1=$db->prepare("SELECT * from `Assignment` where Assignment_id=:aid");
      $sql1->bindParam(':aid',$id,PDO::PARAM_STR);
      $sql1->execute();
      $data=$sql1->fetch(PDO::FETCH_OBJ);

      
    	$sql=$db->prepare('DELETE  FROM `Assignment` where Assignment_id=:aid');
    	$sql->bindParam(':aid',$id,PDO::PARAM_STR);
    	$sql->execute();


    	if($sql->rowcount()>0 )
    	{
unlink($dir.$data->File_Name);

    		header('location:listassignment.php?id='.$sub.'&dept='.$dept);
    	}
    }
?>