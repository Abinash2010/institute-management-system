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
    	$dept=$_GET['dept'];
      $class=$_GET['class'];
    	$db=getDB();

    	$sql=$db->prepare('DELETE  FROM `Student` where Student_id=:fid');
    	$sql->bindParam(':fid',$id,PDO::PARAM_STR);
    	$sql->execute();


    	$sql1=$db->prepare('DELETE  FROM `Student_Login` where Student_id=:fids');
    	$sql1->bindParam(':fids',$id,PDO::PARAM_STR);
    	$sql1->execute();
    	if($sql->rowcount()>0 && $sql1->rowcount()>0 )
    	{
    		header('location:liststudents.php?dept='.$dept.'&class='.$class);
    	}
    }
?>