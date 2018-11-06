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

   $stmt = $dbs->prepare("SELECT * from `Admin` where User_Name=:email and Password=:pass"); 
                
                $stmt->bindParam(":email",$user,PDO::PARAM_STR);
                $stmt->bindParam(":pass",$pass,PDO::PARAM_STR);
                $stmt->execute();
                $count=$stmt->rowCount();
                $data=$stmt->fetch(PDO::FETCH_OBJ);
               
          if($count>0)
                           {
                                if($data->User_Name==$user && $data->Password==$pass)
                                    {
                                        $_SESSION['uid']=$data->Admin_id;
                                                $temp=$_SESSION['uid'];
                                        header('location:Admin/index.php?msg='.'success');
                                    }
               
 
                           } 
   else
        {
            header("location:index.php?msg=failed");
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
$dbs->close();
?>