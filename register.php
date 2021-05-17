<?php
	session_start();
	if (isset($_SESSION['role'])){
			header("Refresh:0; index.php");
			die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body align="center">
	<h1 align="center">สมัครสมาชิก</h1>
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
			if(isset($_SESSION['success'])){
				echo '<div class="row">
					<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-success">
						เพิ่มบัญชีเรียบร้อยแล้ว
					</div>
					</div>
					</div>';
			unset($_SESSION["success"]);}

			elseif(isset($_SESSION['error'])){
				echo '<div class="row">
					<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-danger">
						ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา
					</div>
					</div>
					</div>';
					unset($_SESSION["error"]);
			session_destroy();
			
		}
		?></div></div>
	<div class="container" >
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel-group">
		<div class="panel panel-primary">
			<div class="panel-heading align="center" >
				<b>กรอกข้อมูล</b>
			</div>
			<div class="panel-body">
				<form action="register_save.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="txt_id" class="col-md-4 control-label">ชื่อบัญชี : </label>
						<div class="col-md-8">
							<input type="id" class="form-control" id="txt_id" placeholder="User-id" name="login" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txt_password" class="col-md-4 control-label">รหัสผ่าน : </label>
						<div class="col-md-8">
							<input type="Password" class="form-control" id="txt_password" name="pwd" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txt_password" class="col-md-4 control-label">ชื่อ-นามสกุล : </label>
						<div class="col-md-8">
							<input type="name-surname" class="form-control" id="txt_name-surname" name="name" placeholder="Name-Surname" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txt_password" class="col-md-4 control-label">เพศ : </label>
						<div class="col-md-8" align="left">
							<input type="radio" name="gender" id ="m" value="m" required> ชาย
							<br><input type="radio" name="gender" id ="f" value="f" required> หญิง
							<br><input type="radio" name="gender" id ="o" value="o" required> อื่นๆ
						</div>
					</div>
					<div class="form-group">
						<label for="txt_mail" class="col-md-4 control-label">อีเมล : </label>
						<div class="col-md-8">
							<input type="email" class="form-control" id="txt_email" placeholder="E-mail" name="email" required>
						</div>
					</div>

					<div align="center">
						<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> สมัครสมาชิก</button>
					</div>
				</form>
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>

	<br>
	<a href="index.php" align="center"><ins >กลับไปหน้าหลัก</ins></a>
</body>
</html>