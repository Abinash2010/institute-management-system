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
               $fid=$_POST['fid'];
                   $sem=$_POST['sem'];
                   $sub=$_POST['sub'];
      
                    $stmt =$db->prepare("INSERT INTO `Class_scedule` VALUES(?,?,?,?)");
                    $stmt->bindParam(1,$dept, PDO::PARAM_STR);
                    $stmt->bindParam(2,$sem, PDO::PARAM_STR);
                    $stmt->bindParam(3,$sub, PDO::PARAM_STR);
                     $stmt->bindParam(4,$fid, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
               
                if($rows>0)
                {
                   
                             header('location:../subject/listsubject.php?class='.$sem);
                            
                        

                  }
      
                       }
        
  
   
        ?>  