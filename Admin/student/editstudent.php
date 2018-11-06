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
    	         $deprt=$_GET['dept'];
                $sid=$_GET['sid'];
                $class=$_GET['class'];
               $db=getDB();
              
                    $name=$_POST['fnaem'];
                    $email=$_POST['email'];
                 
                    $parents=$_POST['parents'];
                    $address=$_POST['addrs'];
                   
                  
                             
                    $dob=$_POST['DOB'];
                   
                    
                  
      
                    $stmt =$db->prepare("UPDATE `Student` SET Name=:fname,Email=:email,Address=:addres,DOB=:dob,Guardien=:guard WHERE Student_id=:id");
                    $stmt->bindParam(':id',$sid, PDO::PARAM_STR);
                    $stmt->bindParam(':fname',$name, PDO::PARAM_STR);
                    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt->bindParam(':addres',$address, PDO::PARAM_STR);
                   $stmt->bindParam(':dob',$dob, PDO::PARAM_STR);
                    $stmt->bindParam(':guard',$parents, PDO::PARAM_STR);
                 
                    $stmt->execute();
                    $rows = $stmt->rowCount();
             

                         $sql =$db->prepare("UPDATE `Student_Login` SET Email=:emails WHERE Student_id=:sids");

                $sql->bindValue(':sids', $sid,PDO::PARAM_STR);
                $sql->bindValue(':emails', $email,PDO::PARAM_STR);
             
                $sql->execute();
                $row=$sql->rowCount();
                if($row>0 || $rows>0)
                {
                   
                             header('location:liststudents.php?class='.$class);
                            
                        

                  }
      
                        }
        
  
   
        ?>  