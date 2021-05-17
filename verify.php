<?php
	session_start();
	if (isset($_SESSION['id'])){
		header("location: index.php");
		die();
	}
	if ((!isset($_POST['id'])) ||(!isset($_POST['pass']))){
		$_POST['id'] = null;
		$_POST['pass'] = null;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<body align="center">
	<h1 align="center">Webboard KakKak</h1>
	<hr>
<?php
		$id = $_POST['id'];
		$pass = $_POST['pass'];
	?>
	<?php  
	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
	$sql = "SELECT * from user where login='$id' and password=sha1('$pass') ";
	$result=$conn->query($sql);

	if($result->rowCount() == 1){
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$_SESSION['username'] = $data['login'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['id'] = session_id();
		header("Refresh:0; index.php");
		die();
	}
	else {
		echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
		$_SESSION['error'] = session_id();
		header("location: login.php");
		die();
	}
	?>
	<br>
	<a href="index.php" align="center"><ins >กลับไปหน้าหลัก</ins></a>
</body>
</html>