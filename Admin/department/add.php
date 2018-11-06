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
                   $name=$_POST['dept'];
                   $id=$_POST['dept_id'];
      
                    $stmt =$db->prepare("INSERT INTO `Department` VALUES(:id,:name)");
                    $stmt->bindParam(':id',$id, PDO::PARAM_STR);
                    $stmt->bindParam(':name',$name, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
               
                if($rows>0)
                {
                   
                             header('location:department.php');
                            
                        

                  }
      
                       }
        
  
   
        ?>  