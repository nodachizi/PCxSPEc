<?php  
session_start();
$login = $_POST['login'];
$passwd = $_POST['pwd'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$passwd = sha1($passwd);

$sql = "SELECT * from user where login='$login'";
$result=$conn->query($sql);
	if($result->rowCount() == 1){

		$_SESSION['error'] = session_id();
		header("location: register.php");
		die();
	}
	else{
		$sql = "INSERT into user (login,password,name,gender,email,role) values('$login','$passwd','$name','$gender','$email','m')";
		$conn->exec($sql);
		
		$_SESSION['success'] = session_id();
		header("location: register.php");
		die();
	}
$conn = null;
?>
