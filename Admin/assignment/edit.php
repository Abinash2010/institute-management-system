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
	
$db=getDB();
 $dept=$_GET['dept'];
$sub=$_GET['sub'];
$id=$_GET['aid'];
$title=$_POST['title'];
$question=$_POST['qsn'];

$time=$_POST['time'];


	

$sql=$db->prepare("UPDATE `Assignment` SET `Title`=:t1,`Description`=:t2,`Due_date`=:t4 WHERE Assignment_id=:id");

$sql->bindParam(':t1',$title,PDO::PARAM_STR);
$sql->bindParam(':t2',$question,PDO::PARAM_STR);
$sql->bindParam(':t4',$time,PDO::PARAM_STR);
$sql->bindParam(':id',$id,PDO::PARAM_STR);
$sql->execute();
if($sql->rowcount()>0)
{
	header('location:listassignment.php?id='.$sub.'&dept='.$dept);
}




}
?>