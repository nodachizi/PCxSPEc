<?php
	session_start();
	if(!isset($_POST['comment'])){
		header("location: index.php?");
	die();
	}
	$comment = $_POST['comment'];
	$post_id = $_POST['post_id'];
	$user_id = $_SESSION['user_id'];

	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
	$sql="INSERT into comment (content, post_date , user_id, post_id) values ('$comment', NOW(),'$user_id','$post_id')";

	$conn->exec($sql);
	header("location: post.php?id=$post_id");
	die();
?>
