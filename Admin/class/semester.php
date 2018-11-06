
      <?php
    
include '../../connection.php';
$db=getDB();

$class=$_POST['class'];

$stmt1=$db->prepare("SELECT * FROM `Class` where Dept_id=:id");
$stmt1->bindParam(':id',$class,PDO::PARAM_STR);
   
    $stmt1->execute();
    $data1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
    $row1=$stmt1->rowCount();
$row=array();
   
     foreach($data1 as $row2)
     {
        $row[]=$row2;
     }
    

echo  json_encode($row);



?>