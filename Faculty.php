<!DOCTYPE html>
<html>
<head>
		<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
		
		@media (min-width: 1000px) {

  			body{
			background: url('images.jpg') no-repeat;
			background-size: cover;
			overflow-x: hidden;
			
			
		}
		}
	</style>
</head>
<body>
	
		<div class="row">
			<center><h1 class="h1">University</h1></center>
			<div class="col-lg-8 col-md-12 col-xs-12 ">
				<div class="left">
					<div class="Card">
						<h1 style="color: white;font-size: 43px;padding:30px;">University</h1>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-xs-12">
				<div class="right">


				<center><div class="login">
					<center><h3>FACULTY</h3></center>
					<?php
		global $failed;
		if(isset($_GET["msg"]) && $_GET["msg"]=='failed')
		{
			echo '<p style="color: red">'.'You entered wrong password or id'.'<br/></p>';
		}
		
	?>
						<form action="facultyLogin.php" method="post"> 
							<input type="text" name="uname" placeholder="user name" class="form-control">
							<br/>
							<input type="password" name="Password" placeholder="Password" class="form-control">
							<br/>
							<button class="btn btn-success" style="width: 100%;color: white;">Login</button> 
						</form>
						</center>	
					</div>

				</div>
		</div>
	</div>
</body>

</html>