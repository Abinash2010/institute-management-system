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
   
   
    	$db=getDB();

       $dir='../../notification/';

      $sql1=$db->prepare("SELECT * from `notification` where nid=:nids");
      $sql1->bindParam(':nids',$id,PDO::PARAM_STR);
      $sql1->execute();
      $data=$sql1->fetch(PDO::FETCH_OBJ);


    	$sql=$db->prepare('DELETE  FROM `notification` where nid=:nid');
    	$sql->bindParam(':nid',$id,PDO::PARAM_STR);
    	$sql->execute();


   
    	if($sql->rowcount()>0  )
    	{
        unlink($dir.$data->file);
    		header('location:notification.php');
    	}
    }
?>