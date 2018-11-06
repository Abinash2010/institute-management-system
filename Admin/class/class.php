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
$sql=$db->query("SELECT * FROm `Department`");
$sql->execute();
$data=$sql->fetchAll(PDO::FETCH_ASSOC);

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

          function on1()
      {
            var sel = document.getElementById("dept").value;
          
            $.ajax({
                type: "POST",
                url: "faculty.php",
                data:{ class:sel },
                 success: function (data) {
                    var obj = $.parseJSON(data);
                var result = "";
                $.each( obj,function () {
                    result=result+'<option value=' + this["Faculty_id"] +' >' + this["Name"] + '</option>';
                      $("#faculty").html(result);
               
                });
                  

               
                 }

              
            });

        }


         function on2()
      {
            var sel = document.getElementById("sem").value;
          
            $.ajax({
                type: "POST",
                url: "subject.php",
                data:{ class:sel },
                 success: function (data) {
                    var obj = $.parseJSON(data);
                var result = "";
                $.each( obj,function () {
                    result=result+'<option value=' + this["Subject_Code"] +' >' + this["Subject_name"] + '</option>';
                      $("#sub").html(result);
               
                });
                  

               
                 }

              
            });

        }
    </script>
</head>
<body>
  <section id="container">

<?php include 'nav-header.php';
 ?>
 <?php include 'nav_sidebar.php' ; ?>
 <section id="main-content">
  	<div class="panel panel-success">
 	<div class="row " style="padding-top: 100px;">
 		<div class="col-lg-offset-1 col-lg-3 col-md-6 col-xs-12">
 		
 				
 				<center>Add Class</center><br/>
 			<form action="addclass.php" method="post">

 				<label >Department Name:</label>
 				<select class="form-control" name="dept">
 				<option>Choose Department</option>	
 				<?php
 					foreach($data as $row)
 					{
 						echo '<option value='.$row['Dept_id'].'>'.$row['Dept_name'].'</option>';
 					}
 				?>

 				</select>
 			
 				<label >Semester Name:</label>
 				<input type="text" class="form-control" name="sem" required=" ">
 				<label >Semester Id:</label>
 				<input type="text" class="form-control" name="sem_id" required=" ">
 				<button class="btn btn-primary" style="margin-top: 10px;">Add</button>
 			</form>
 		</div>
 		
 
 		
 	<div class="col-lg-offset-1 col-lg-3 col-md-6 col-xs-12">
 
 	<center>Assign Faculty </center><br/>
 		
 			<form action="classSchedule.php" method="post">

 				<label >Department Name:</label>
 				<select class="form-control" name="dept" id="dept" required=" " onchange="on();on1();">
 				<option>Choose Department</option>	
 				<?php
 					foreach($data as $row)
 					{
 						echo '<option value='.$row['Dept_id'].'>'.$row['Dept_name'].'</option>';
 					}
 				?>

 				</select>
 			
 				<label >Select Faculty:</label>
 				<select class="form-control" name="fid" id="faculty" required=" ">
 				<option>Select Faculty</option>
 			</select>

 				<label >Select Semester:</label>
 				<select class="form-control" id="sem" required=" " name="sem" onchange="on2();">
 					<option >Choose Semester</option>
 				</select>

 				<label >Select Subect:</label>
 				<select class="form-control" id="sub" required=" " name="sub">
 					<option >Choose Subject</option>
 				</select>

 			
 				<button class="btn btn-primary" style="margin-top: 10px;">Add</button>
 			</form>
 		</div>
 		</div>
 		
 	</div>
 	</div>
 </section>
</section>
</body>
</html>
<?php
}
?>