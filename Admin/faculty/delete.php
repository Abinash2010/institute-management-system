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
    	$db=getDB();

    	$sql=$db->prepare('DELETE  FROM `Faculty` where Faculty_id=:fid');
    	$sql->bindParam(':fid',$id,PDO::PARAM_STR);
    	$sql->execute();


    	$sql1=$db->prepare('DELETE  FROM `Faculty_Login` where Faculty_id=:fids');
    	$sql1->bindParam(':fids',$id,PDO::PARAM_STR);
    	$sql1->execute();
    	if($sql->rowcount()>0 && $sql1->rowcount()>0 )
    	{
    		header('location:listfaculties.php?dept='.$dept);
    	}
    }
?>