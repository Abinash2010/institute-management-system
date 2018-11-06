<?php
session_start();
include 'connection.php';
class admin{
	
	public function Admins()
	{
		try{
			
			$dbs=getDB();
			$user=$_POST['uname'];
			$pass=$_POST['Password'];
 $stmt2 = $dbs->prepare("SELECT * from `faculty_Login` where User_Name=:emai and Password=:pas");  
                      $stmt2->bindParam(":emai",$user,PDO::PARAM_STR);
                        $stmt2->bindParam(":pas",$pass,PDO::PARAM_STR);
                         $stmt2->execute();
                       $count2=$stmt2->rowCount();
                          $data2=$stmt2->fetch(PDO::FETCH_OBJ);
if($count2>0)
                           {
                               if($data2->User_Name==$user && $data2->Password==$pass)
                                                {
                                                    $_SESSION['uid']=$data2->Faculty_id;
                                                            $temp=$_SESSION['uid'];
                                                    header('location:Faculty/index.php?msg='.'success');
                                                }
                           }  
  else
        {
            header("location:Faculty.php?msg=failed");
        }
              
			
			
	}
	catch(Exception $e)
		{
				die("connection-failed".$e->getmessage());
		}
		
			

	}
}
$admin=new admin();
$admin->Admins();

$db->close();


?>