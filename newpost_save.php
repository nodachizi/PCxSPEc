<?php  
	session_start();
		if (!isset($_SESSION['role'])){
			header("Refresh:0; index.php");
			die();
		}
		if (!isset($_POST['category'])){
			echo "ควย";
			die();
		}
	$cat_id = $_POST['category'];
	$header = $_POST['header'];
	$info = $_POST['info'];
	$user_id = $_SESSION['user_id'];

	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
	$sql = "INSERT into post (title,content,post_date,cat_id,user_id) values('$header','$info',NOW(),'$cat_id','$user_id')";
	$conn->exec($sql);
	header("location: index.php");
	die();
?>
