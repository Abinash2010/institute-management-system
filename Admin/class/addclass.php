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
               $dept=$_POST['dept'];
                   $name=$_POST['sem'];
                   $id=$_POST['sem_id'];
      
                    $stmt =$db->prepare("INSERT INTO `Class` VALUES(?,?,?)");
                    $stmt->bindParam(1,$dept, PDO::PARAM_STR);
                    $stmt->bindParam(2,$id, PDO::PARAM_STR);
                    $stmt->bindParam(3,$name, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
               
                if($rows>0)
                {
                   
                             header('location:listclass.php?dept='.$dept);
                            
                        

                  }
      
                       }
        
  
   
        ?>  