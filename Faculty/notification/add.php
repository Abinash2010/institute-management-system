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
 
$about=$_POST['about'];
$title=$_POST['title'];

$time=date('20'.'y-m-d');
$nid=$time.'-'.rand(0000,99999);

if(!isset($_FILES['files']['name']))
{
	$file=' ';
$sql=$db->prepare("INSERT into `notification` values(?,?,?,?,?,?)");
$sql->bindParam('1',$nid,PDO::PARAM_STR);
$sql->bindParam('2',$temp,PDO::PARAM_STR);
$sql->bindParam('3',$title,PDO::PARAM_STR);
$sql->bindParam('4',$about,PDO::PARAM_STR);
$sql->bindParam('5',$file,PDO::PARAM_STR);
$sql->bindParam('6',$time,PDO::PARAM_STR);

$sql->execute();
$sql->execute();
if($sql->rowcount()>0)
{
	header('location:notification.php?dept='.$id);
}
}
else
{
				$target_dir = "../../notification/";
			$target_file = $target_dir . basename($_FILES["files"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = $_FILES["files"]["size"];
			    if($check !== false) {
			        
			        $uploadOk = 1;
			    } else {
			        
			        $uploadOk = 0;
			    }
			}

			if ($_FILES["files"]["size"] > 50000000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
			       
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			$file=$_FILES['files']['name'];
		$sql=$db->prepare("INSERT into `notification` values(?,?,?,?,?,?)");
$sql->bindParam('1',$nid,PDO::PARAM_STR);
$sql->bindParam('2',$temp,PDO::PARAM_STR);
$sql->bindParam('3',$title,PDO::PARAM_STR);
$sql->bindParam('4',$about,PDO::PARAM_STR);
$sql->bindParam('5',$file,PDO::PARAM_STR);
$sql->bindParam('6',$time,PDO::PARAM_STR);

$sql->execute();
if($sql->rowcount()>0)
{
	header('location:notification.php?dept='.$id);
}

}




}
?>