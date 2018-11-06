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
                   $sem=$_POST['sem'];
                   $id=$_POST['sub_id'];
                   $sub=$_POST['sub'];
                   $credit=$_POST['crdt'];

      
                    $stmt =$db->prepare("INSERT INTO `Subject` VALUES(?,?,?,?,?)");
                    $stmt->bindParam(1,$dept, PDO::PARAM_STR);
                    $stmt->bindParam(2,$sem, PDO::PARAM_STR);
                    $stmt->bindParam(3,$id, PDO::PARAM_STR);
                     $stmt->bindParam(4,$sub, PDO::PARAM_STR);
                       $stmt->bindParam(5,$credit, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
               
                if($rows>0)
                {
                   
                             header('location:listsubject.php?class='.$sem);
                            
                        

                  }
      
                       }
        
  
   
        ?>  