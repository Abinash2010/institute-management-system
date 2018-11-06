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
                    $student_id=$_POST['roll'];
                    $name=$_POST['sname'];
                    $email=$_POST['email'];
                    $address=$_POST['addrs'];
                    $parents=$_POST['parent'];         
                    $dob=$_POST['DOB'];
                    $adate=$_POST['adate'];
                    $user=$_POST['uname'];
                    $dept=$_POST['id']; 
                    $class=$_POST['cls']     ;
      
                    $stmt =$db->prepare("INSERT INTO `Student` VALUES(:id,:name,:email,:addres,:dob,:parents,:adate,:did,:cls)");
                    $stmt->bindParam(':id',$student_id, PDO::PARAM_STR);
                    $stmt->bindParam(':name',$name, PDO::PARAM_STR);
                    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt->bindParam(':addres',$address, PDO::PARAM_STR);
                   $stmt->bindParam(':dob',$dob, PDO::PARAM_STR);
                   $stmt->bindParam(':adate',$adate, PDO::PARAM_STR);
                   $stmt->bindParam(':parents',$parents, PDO::PARAM_STR);
                    $stmt->bindParam(':cls',$class, PDO::PARAM_STR);
                    $stmt->bindParam(':did',$dept, PDO::PARAM_STR);
     
                    
                    $stmt->execute();
                    $rows = $stmt->rowCount();
                 try{  
                   

                         $sql =$db->prepare("INSERT INTO `Student_Login` VALUES(?,?,?,?)");

                $sql->bindValue(1, $student_id);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $user);
                $sql->bindValue(4, $student_id);                      

                $sql->execute();
                $row=$sql->rowCount();
                if($row>0)
                {
                   
                             header('location:liststudents.php?dept='.$dept.'&class='.$class);
                            
                        

                  }
        }  catch(PDOException $e){
           echo $e->getMessage();
    }
                        }
        
  
   
        ?>  