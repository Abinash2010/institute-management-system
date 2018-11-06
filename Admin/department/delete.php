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
    	
    	$dept=$_GET['dept'];
    	$db=getDB();

    	$sql=$db->prepare('DELETE  FROM `Department` where Dept_id=:dept');
    	$sql->bindParam(':dept',$dept,PDO::PARAM_STR);
    	$sql->execute();


    
    	if($sql->rowcount()>0  )
    	{
    		header('location:department.php');
    	}
    }
?>