<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css">
		body{
			background: url('images.jpg') no-repeat;
			background-size: cover;
			
		}
		.Card{
			background-color: black;
			opacity: 0.9;
			width: 96%;
			height: 200px;
			margin-top: 100px;
			
			
		}
		.login{
			width: 100%;
			height: 120px;
			background-color: #009688;
			margin-top: 40px;
			opacity: 1


		}
			.login1{
			width: 100%;
			height: 120px;
			background-color: #00BCD4;
			margin-top: 40px;
			opacity: 1


		}
			.login2{
			width: 100%;
			height: 120px;
			background-color: #03A9F4;
			margin-top: 40px;
			


		}
		.bottom{
			width: 100%;
			height: 20px;
			background-color: #004D40;
			margin-top: 40px;
		}
			.bottom1{
			width: 100%;
			height: 20px;
			background-color: #006064;
			margin-top: 40px;
		}
			.bottom2{
			width: 100%;
			height: 20px;
			background-color:#01579B;
			margin-top: 40px;
		}
		@media (min-width: 1000px) {

  			.Card{
  				margin-top: 17%;
  				margin-left: 16px;
  			}
  			.login,.login1,.login2{
  				margin-left: 150px;
  			}
  			
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="Card">
				<div class="row">
				<div class="col-lg-3 col-md-12 col-xs-12">
				 <a style="color: white;text-decoration: none;" href="Admin.php">	<div class="login">
		
				<center><h2 style="padding-top: 30px;">ADMIN</h2></center>
			</div></a>
			
		</div>
		<div class="col-lg-3 col-md-12 col-xs-12">
		<a style="color: white;text-decoration: none;" href="Faculty.php">	<div class="login1">
				
				<center><h2 style="padding-top: 30px;">FACULTY</h2></center>
			</div></a>
			
		</div>
		<div class="col-lg-3 col-md-12 col-xs-12">
			<a style="color: white;text-decoration: none;" href="Student.php"><div class="login2">
				
				<center><h2 style="padding-top: 30px;">STUDENT</h2></center>
			</div>
			</a>
		</div>
			</div>
	</div>
</div>
</body>

</html>