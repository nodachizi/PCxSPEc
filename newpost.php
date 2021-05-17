<?php
	session_start();
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
<body>
	<?php 
		if (!isset($_SESSION['id'])){
				header("Refresh:0; index.php");
		}
	 ?>
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
						if ($_SESSION['role'] == "a"){
							$username = $_SESSION['username'];
							echo '<li><div class="dropdown">
								<ul class="nav navbar-nav"><li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'.
								" $username".'<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li><a href= "logout.php" ><span class="glyphicon glyphicon-off"> </span> ออกจากระบบ</a></li></li></ul>
							</div></li>';
						}
						elseif ($_SESSION['role'] == "m"){
							$username = $_SESSION['username'];
							echo '<li><div class="dropdown">
								<ul class="nav navbar-nav"><li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'.
								" $username".'<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li><a href= "logout.php" ><span class="glyphicon glyphicon-off"> </span> ออกจากระบบ</a></li></li></ul>
							</div></li>';
						}
					?><li>&nbsp;&nbsp;&nbsp;&nbsp;</li></ul>
		</nav>
	</div>
	<br>
	<div class="container" >
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-group">
		<div class="panel panel-primary">
			<div class="panel-heading align="center" >
				<b>ตั้งกระทู้ใหม่</b>
			</div>
			<div class="panel-body">
				<form action="newpost_save.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="txt_id" class="col-md-3 control-label">หมวดหมู่ : </label>
						<div class="col-md-9">
							<select name="category" class="form-control" id="category">
								<?php
									$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
									$sql = "SELECT * from category";
									foreach ($conn->query($sql) as $row) {
										echo "<option value=".$row['id'].">".$row['name']."</option>";
									}
									$conn = null;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txt_head" class="col-md-3 control-label">หัวข้อ : </label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="txt_header" name="header" placeholder="" required>
						</div>
					</div>
					<div class="form-group">
						<label for="txt_password" class="col-md-3 control-label">เนื้อหา : </label>
						<div class="col-md-9">
							<textarea name="info" placeholder="" style="width: 100%" required></textarea>
						</div>
					</div>
					<div align="center">
						<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-bullhorn"></span> บันทึกข้อความ</button>
					</div>
				</form>
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>