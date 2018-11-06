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
              
                    $name=$_POST['fnaem'];
                    $email=$_POST['email'];
                    $number=$_POST['no'];
                    $post=$_POST['post'];
                    $address=$_POST['addrs'];
                   
                   $dept=$_POST['cls'];
                   $fac_id=$dept.'-'.rand(0,1000);               
                    $dob=$_POST['DOB'];
                    $jdate=$_POST['jdate'];
                    $user=$_POST['uname'];
                  
      
                    $stmt =$db->prepare("INSERT INTO `Faculty` VALUES(:id,:fname,:email,:addres,:dob,:jdate,:num,:post,:did)");
                    $stmt->bindParam(':id',$fac_id, PDO::PARAM_STR);
                    $stmt->bindParam(':fname',$name, PDO::PARAM_STR);
                    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt->bindParam(':addres',$address, PDO::PARAM_STR);
                   $stmt->bindParam(':dob',$dob, PDO::PARAM_STR);
                   $stmt->bindParam(':jdate',$jdate, PDO::PARAM_STR);
                   $stmt->bindParam(':num',$number, PDO::PARAM_STR);
                    $stmt->bindParam(':post',$post, PDO::PARAM_STR);
                    $stmt->bindParam(':did',$dept, PDO::PARAM_STR);
     
                    
                    $stmt->execute();
                    $rows = $stmt->rowCount();
                 try{  
                   

                         $sql =$db->prepare("INSERT INTO `Faculty_Login` VALUES(?,?,?,?)");

                $sql->bindValue(1, $fac_id);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $user);
                $sql->bindValue(4, $fac_id);                      

                $sql->execute();
                $row=$sql->rowCount();
                if($row>0)
                {
                   
                             header('location:listfaculties.php?dept='.$dept);
                            
                        

                  }
        }  catch(PDOException $e){
           echo $e->getMessage();
    }
                        }
        
  
   
        ?>  