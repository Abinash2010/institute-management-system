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
</script>
<body>
  <section id="container">

<?php include 'nav-header.php';
 ?>
 <?php include 'nav_sidebar.php' ; ?>
 <section id="main-content">

    <div class="row" style="padding-top: 100px;">
    <div class="col-lg-8 col-md-6 col-xs-12">
      <div class="jumbotron">
        <table class="table">
          <tr>
            <th >Department Name</th>
            <th>Department Code</th>
          </tr>
          <?php
    $sql=$db->query("SELECT * FROM `Department`");
    $sql->execute();
    $data=$sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $row)
    {
      echo '<tr><td>'.$row['Dept_name'].'</td>
      <td>'.$row['Dept_id'].'</td>
      <td><a class=" btn btn-success"  href="listclass.php?dept='.$row['Dept_id'].'" >'.'View'.'</a></tr>'; 
    }

  ?>

        </table>
  
 </div>
    </div>
    <div class="col-lg-3 col-md-6 col-xs-12">
  
 <div class="dashcard">
 	<center>Assign Subect</center><br/>
 		
 			<form action="add.php" method="post">

 				<label >Department Name:</label>
 				<select class="form-control" name="dept" id="dept" required=" " onchange="on();">
 				<option>Choose Department</option>	
 				<?php
 					foreach($data as $rows)
 					{
 						echo '<option value='.$rows['Dept_id'].'>'.$rows['Dept_name'].'</option>';
 					}
 				?>

 				</select>

 				<label >Select Semester:</label>
 				<select class="form-control" id="sem" required=" " name="sem" >
 					<option >Choose Semester</option>
 				</select>

 				<label >Subect Code:</label>
	 				<input type="text" class="form-control" name="sub_id" required=" " >

 				<label >Subect Name:</label>
	 				<input type="text" class="form-control" name="sub" required=" " >
            <label >Credit:</label>
          <input type="text" class="form-control" name="crdt" required=" " >
 				<button class="btn btn-primary" style="margin-top: 10px;">Add</button>
 			</form>
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