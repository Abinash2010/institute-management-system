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

 $stmt1 = $dbs->prepare("SELECT * from `Student_Login` where User_Name=:emails and Password=:passs"); 
                   $stmt1->bindParam(":emails",$user,PDO::PARAM_STR);
                   $stmt1->bindParam(":passs",$pass,PDO::PARAM_STR);
                   $stmt1->execute();
                   $count1=$stmt1->rowCount();
                   $data1=$stmt1->fetch(PDO::FETCH_OBJ);  
                                    
if($count1>0)
                           {
                                if($data1->User_Name==$user && $data1->Password==$pass)
                                     {
                                        $_SESSION['uid']=$data1->Student_id;
                                           $temp=$_SESSION['uid'];
                                         header('location:Student/index.php?msg='.'success');
                                 }
                           }    
 else
        {
            header("location:Student.php?msg=failed");
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