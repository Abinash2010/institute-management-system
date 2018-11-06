<?php

 session_start();
    include '../../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Student.php');
       }
  else
    {
	
	
$db=getDB();
 $id=$_GET['dept'];
$sub=$_GET['sub'];
$a_id=$_GET['id'];


$answer=$_POST['ans'];



$time=date('20'.'y-m-d');

if(!isset($_FILES['files']['name']))
{
	$file=' ';

$sql=$db->prepare("INSERT into `Assignment_Student` values(?,?,?,?,?)");
$sql->bindParam('1',$a_id,PDO::PARAM_STR);
$sql->bindParam('2',$temp,PDO::PARAM_STR);
$sql->bindParam('3',$answer,PDO::PARAM_STR);
$sql->bindParam('4',$file,PDO::PARAM_STR);
$sql->bindParam('5',$time,PDO::PARAM_STR);

$sql->execute();
if($sql->rowcount()>0)
{
	header('location:listassignment.php?id='.$sub.'&dept='.$id);
}
}
else
{
			$target_dir = "../../Assignment_uploads/";
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
			        echo 2;
			    }
			}

			if ($_FILES["files"]["size"] > 50000000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			    echo 3;
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
		$sql1=$db->prepare("INSERT into `Assignment_Student` values(?,?,?,?,?)");
$sql1->bindParam('1',$a_id,PDO::PARAM_STR);
$sql1->bindParam('2',$temp,PDO::PARAM_STR);
$sql1->bindParam('3',$answer,PDO::PARAM_STR);
$sql1->bindParam('4',$file,PDO::PARAM_STR);
$sql1->bindParam('5',$time,PDO::PARAM_STR);
$sql1->execute();
if($sql1->rowcount()>0)
{
	header('location:listassignment.php?id='.$sub.'&dept='.$id);
}

}

}
?>