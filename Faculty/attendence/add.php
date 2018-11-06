<?php

 session_start();
    include '../../connection.php';
   include '../../simplexlsx.class.php';

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Faculty.php');
       }
  else
    {
	
$db=getDB();
 $id=$_GET['dept'];
$sub=$_GET['sub'];
 $cls=$_GET['cls']; 
 $date=$_POST['time']  ;
 $day=$_POST['day'];
 $attendence_id=$sub.'-'.rand(000000,1000000);

 $sql1=$db->prepare('INSERT into `Attendence` values(?,?,?,?,?,?,?)');
 	$sql1->bindParam('1',$attendence_id,PDO::PARAM_STR);
 	$sql1->bindParam('2',$temp,PDO::PARAM_STR);
 	$sql1->bindParam('3',$id,PDO::PARAM_STR);
 	$sql1->bindParam('4',$sub,PDO::PARAM_STR);
 	$sql1->bindParam('5',$cls,PDO::PARAM_STR);
 	$sql1->bindParam('6',$date,PDO::PARAM_STR);
 	$sql1->bindParam('7',$day,PDO::PARAM_STR);
 	$sql1->execute();
 	$row1=$sql1->rowcount();
$arr=array();

$f=$_FILES['files']['tmp_name'];
if ( $xlsx = SimpleXLSX::parse($f)) {
	echo '<table cellpadding="10">
	<tr><td valign="top">';
	// output worsheet 1
	list( $num_cols, $num_rows ) = $xlsx->dimension();
	
    $excel=$xlsx->rows();
    
for ( $j = 1; $j < $num_rows+1; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			
			echo $arr[$j][$i]=$excel[$j][ $i ];
			
        }
		$sql=$db->prepare("INSERT into `Attendence_student` values(?,?,?,?)");
		$sql->bindParam('1',$attendence_id,PDO::PARAM_STR);
		$sql->bindParam('2',$arr[$j][0],PDO::PARAM_STR);
        $sql->bindParam('3',$temp,PDO::PARAM_STR);
		$sql->bindParam('4',$arr[$j][1],PDO::PARAM_STR);
      
		$sql->execute();
		$row=$sql->rowcount();
		if($row>0 && $row1>0)
		{
			header("location:viewattendence.php?id=".$sub.'&dept='.$id);
		}
		
	}
	
} else {
	echo SimpleXLSX::parse_error();
}

  
}
?>