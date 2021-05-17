<?php
	header("Access-Control-Allow-Origin: http://sstwork.thddns.net:7770");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	$_POST = json_decode(array_keys($_POST)[0],true);
	$response = array();
		$id = $_POST['id'];
		$pass = $_POST['pass']; 
	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
	$sql = "SELECT * from user where login='$id' and password=sha1('$pass') ";
	$result=$conn->query($sql);

	if($result->rowCount() == 1){
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$response['role'] = $data['role'];
		echo json_encode($response);
		die();
	}
	else {
		$response['role'] = "unknown";
		echo json_encode($response);
		die();
	}
?>