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
	
$db=getDB();
$id=$_GET['id'];
 
$about=$_POST['about'];
$title=$_POST['title'];



$sql=$db->prepare("UPDATE `notification` SET Title=:n1,Description=:n2 WHERE nid=:id");
$sql->bindParam(':n1',$title,PDO::PARAM_STR);
$sql->bindParam(':n2',$about,PDO::PARAM_STR);
$sql->bindParam(':id',$id,PDO::PARAM_STR);

$sql->execute();

if($sql->rowcount()>0)
{
	header('location:notification.php');
}




}
?>