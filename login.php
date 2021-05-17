<?php
	session_start();
	if (isset($_SESSION['id'])){
		if(isset($_SESSION['error'])){
		}
		else{
			header("Refresh:0; index.php");
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 align="center">Webboard KakKak</h1>
	<div class="container">
		<nav class="navbar navbar-default">
					<ul class="nav navbar-nav">
					<li><a href="index.php">
								<span class="glyphicon glyphicon-home"> Home</span>
						</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php  
							echo '<ul class="nav navbar-nav"><li><a href= "login.php">
										<span class="glyphicon glyphicon-edit"> เข้าสู่ระบบ</span>
								</a></li></ul>';
						?><li>&nbsp;&nbsp;&nbsp;&nbsp;</li></ul>
		</nav>
	</div>

	<div class="container" >
		<div align="center">
		<?php  
			if(isset($_SESSION['error'])){
				echo '<div class="row">
					<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-danger">
						ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง
					</div>
					</div>
					</div>';
			session_destroy();
		}
		?></div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading" align="center">
				เข้าสู่ระบบ
			</div>
			<div class="panel-body">
				<form action="verify.php" method="post">
					<div class="form-group">
						<label for="txt_id">User id : </label>
						<input type="text" class="form-control" id="txt_id" name="id" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="txt_password">Password : </label>
						<input type="Password" class="form-control" id="txt_password" name="pass" placeholder="Password">
					</div>
					<div align="center">
						<button type="submit" class="btn btn-default">Login</button>
					</div>
				</form>
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>
	<br>
	<div align="center">
	ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php"><ins>กรุณาสมัครสมาชิก</ins></a></div>
</body>
</html>