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
$sql=$db->query("SELECT * FROM `Department`");
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html>
<head>
<title>DASHBOARD-ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../../css/bootstrap.min.css" >
<link rel="stylesheet" href="../../css/style1.css" >

<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<link href="../../css/style-responsive.css" rel="stylesheet"/>


<link rel="stylesheet" href="../../css/font.css" type="text/css"/>
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="../../css/morris.css" type="text/css"/>

<link rel="stylesheet" href="../../css/monthly.css">
<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../js/raphael-min.js"></script>
<script src="../../js/morris.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../js/scripts.js"></script>
<script src="../../js/jquery.slimscroll.js"></script>
<script src="../../js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../../js/jquery.scrollTo.js"></script>
<script type="text/javascript">
      function on()
      {
            var sel = document.getElementById("dept").value;
          
            $.ajax({
                type: "POST",
                url: "semester.php",
                data:{ class:sel },
                 success: function (data) {
                    var obj = $.parseJSON(data);
                var result = "";
                $.each( obj,function () {
                    result=result+'<option value=' + this["Class_Code"] +' >' + this["Class_name"] + '</option>';
                      $("#sem").html(result);
               
                });
                  

               
                 }

              
            });

        }
    </script>
</head>
  <section id="container">

<?php include 'nav-header.php';
 ?>
 <?php include 'nav_sidebar.php' ; ?>
 <section id="main-content">
  <div style="padding-top: 100px;">
 	<center><h2>REGISTER STUDENT</h2></center>
 
 		<form class="forms" action="add.php" method="post">
 		<div class="row">
      <div class="col-lg-6 col-md-5 col-xd-12">  <label >Roll No:</label>
      <input type="text" name="roll" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12">	<label >Student Name:</label>
 			<input type="text" name="sname" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>Email:</label>
 			<input type="email" name="email" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>Address:</label>
 			<input type="text" name="addrs" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>Guardien Name:</label>
 			<input type="text" name="parent" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12">	<label >DOB:</label>
 			<input type="date" name="DOB" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>Admission Date:</label>
 			<input type="date" name="adate" class="form-control" placeholder=" "></div>

 		

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>User Name:</label>
 			<input type="text" name="uname" class="form-control" placeholder=" "></div>

 			<div class="col-lg-6 col-md-5 col-xd-12"><label>Department:</label>
 		 <select class="form-control" name="id" id="dept" onchange="on();">
      <option>Choose Your Department</option>
      <?php 
      foreach($result as $rows)
      {
        echo '<option value="'.$rows['Dept_id'].'">'.$rows['Dept_name'].'</option>';
      }
      ?>
    </select>
</div>
    <div class="col-lg-6 col-md-5 col-xd-12">  <label >Semester:</label>
     <select class="form-control" name="cls" id="sem">
      <option>Choose Your Class</option>
    
    </select>
     </div>
 		<div  style="margin-top:5px;" class="col-lg-offset-4 col-md-offset-4 col-xs-12"><button class="btn btn-primary">Submit</button></div>
 		</div>
 		</form>
 
 
 </div>
</section>
</section>
 
</body>
</html>
<?php
}
?>