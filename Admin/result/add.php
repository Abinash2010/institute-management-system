<?php

 session_start();
    include '../../connection.php';
    include '../../simplexlsx.class.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../Admin.php');
       }
  else
    {
	
$db=getDB();
 $id=$_GET['dept'];
$sub=$_GET['sub'];
 $exam=$_POST['type'];

$f=$_FILES['files']['tmp_name'];
if ( $xlsx = SimpleXLSX::parse($f)) {
	echo '<table cellpadding="10">
	<tr><td valign="top">';
	// output worsheet 1
	list( $num_cols, $num_rows ) = $xlsx->dimension();
	
    $excel=$xlsx->rows();
    if($exam==1){
for ( $j = 1; $j < $num_rows+1; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			
			$arr[$j][$i]=$excel[$j][$i];
			
        }
        $second=1;
        $end=1;
        $grade=1;

        if($arr[$j][0]!='' && $arr[$j][1]!=''){
		$sql=$db->prepare("INSERT into `Result` values(:std,:sub,:first,:second,:ends,:grade)");
		
		$sql->bindParam(':std',$arr[$j][0],PDO::PARAM_STR);
		$sql->bindParam(':sub',$sub,PDO::PARAM_STR);
		$sql->bindParam(':first',$arr[$j][1],PDO::PARAM_STR);
		$sql->bindParam(':second',$second,PDO::PARAM_STR);
		$sql->bindParam(':ends',$end,PDO::PARAM_STR);
		$sql->bindParam(':grade',$grade,PDO::PARAM_STR);


		$sql->execute();
		$row=$sql->rowcount();
		if($row>0)
		{
			header("location:viewresult.php?sub=".$sub.'&id='.$exam);
		}
	}
		
	}
}
elseif($exam==2)
{
	for ( $j = 1; $j < $num_rows+1; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			
			$arr[$j][$i]=$excel[$j][$i];
			
        }
        $second=1;
        $end=1;
        $grade=1;

        if($arr[$j][0]!='' && $arr[$j][1]!=''){
		$sql=$db->prepare("UPDATE `Result` SET second=:seconds WHERE Student_id=:std and Subject_Code=:sub");
		$sql->bindParam(':seconds',$arr[$j][1],PDO::PARAM_STR);
		$sql->bindParam(':std',$arr[$j][0],PDO::PARAM_STR);
		$sql->bindParam(':sub',$sub,PDO::PARAM_STR);
		


		$sql->execute();
		$row=$sql->rowcount();
		if($row>0)
		{
			header("location:viewresult.php?sub=".$sub.'&id='.$exam);
		}
	}
		
	}
}
else
{
	for ( $j = 1; $j < $num_rows+1; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			
			$arr[$j][$i]=$excel[$j][$i];
			
        }
      

        if($arr[$j][0]!='' && $arr[$j][1]!=''){
		$sql=$db->prepare("UPDATE `Result` SET end=:ends WHERE Student_id=:std and Subject_Code=:sub");
		$sql->bindParam(':ends',$arr[$j][1],PDO::PARAM_STR);
		$sql->bindParam(':std',$arr[$j][0],PDO::PARAM_STR);
		$sql->bindParam(':sub',$sub,PDO::PARAM_STR);
		$sql->execute();
		$row=$sql->rowcount();

		$stmt=$db->prepare('SELECT * FROM `Result` where Student_id=:stds and Subject_Code=:subs');
		$stmt->bindParam(':stds',$arr[$j][0]);
		$stmt->bindParam(':subs',$sub);
		$stmt->execute();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$total=$data->first+$data->second+$data->end;
$grade='';
					 if($total>=90 && $total<=100)
                      $grade=$grade.'O';
                    elseif($total>=80 && $total<90)
                      $grade=$grade.'A+';
                      elseif($total>=70 && $total<80)
                      $grade=$grade.'A';
                      elseif($total>=60 && $total<70)
                      $grade=$grade.'B+';
                      elseif($total>=50 && $total<60)
                      $grade=$grade.'B';
                      elseif($total>=40 && $total<50)
                      $grade=$grade.'C+';
                        elseif($total>=37 && $total<40)
                      $grade=$grade.'C';
                      elseif($total>=0 && $total<37)
                      $grade=$grade.'F';
                      else
                        $grade=$grade.'I';

		$sql1=$db->prepare("UPDATE `Result` SET grade=:grade WHERE Student_id=:std and Subject_Code=:sub");
		$sql1->bindParam(':grade',$grade,PDO::PARAM_STR);
		$sql1->bindParam(':std',$arr[$j][0],PDO::PARAM_STR);
		$sql1->bindParam(':sub',$sub,PDO::PARAM_STR);
		$sql1->execute();
		$row1=$sql1->rowcount();

		if($row>0 && $row1>0)
		{
			header("location:viewresult.php?sub=".$sub.'&id='.$exam);
		}
	}
		
	}
}
	
} else {
	echo SimpleXLSX::parse_error();
}

  
}
?>