<?php
      
 
    
 session_start();
    include '../connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../Admin.php');
       }
  else
    {
              
               $db=getDB();
              
                    $name=$_POST['fnaem'];
                    $email=$_POST['email'];
                    $number=$_POST['no'];
                    $post=$_POST['post'];
                    $address=$_POST['addrs'];
                   
                  
                             $pass=$_POST['password'];
                    $dob=$_POST['DOB'];
                    $jdate=$_POST['jdate'];
                    
                  
      
                    $stmt =$db->prepare("UPDATE `Faculty` SET Name=:fname,Email=:email,Address=:addres,DOB=:dob,Joining_date=:jdate,Contact_no=:num,Post=:post WHERE Faculty_id=:id");
                    $stmt->bindParam(':id',$temp, PDO::PARAM_STR);
                    $stmt->bindParam(':fname',$name, PDO::PARAM_STR);
                    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt->bindParam(':addres',$address, PDO::PARAM_STR);
                   $stmt->bindParam(':dob',$dob, PDO::PARAM_STR);
                   $stmt->bindParam(':jdate',$jdate, PDO::PARAM_STR);
                   $stmt->bindParam(':num',$number, PDO::PARAM_STR);
                    $stmt->bindParam(':post',$post, PDO::PARAM_STR);
                             
                    $stmt->execute();
                    $rows = $stmt->rowCount();
             

                         $sql =$db->prepare("UPDATE `Faculty_Login` SET Email=:emails ,Password=:pass WHERE Faculty_id=:fids");

                $sql->bindValue(':fids', $temp,PDO::PARAM_STR);
                $sql->bindValue(':emails', $email,PDO::PARAM_STR);
                   $sql->bindValue(':pass', $pass,PDO::PARAM_STR);
             
                $sql->execute();
                $row=$sql->rowCount();
                if($row>0 || $rows>0)
                {
                   
                             header('location:index.php');
                            
                        

                  }
      
                        }
        
  
   
        ?>  