<?php
	header("Access-Control-Allow-Origin: http://sstwork.thddns.net:7770");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	$_POST = json_decode(array_keys($_POST)[0],true);
	$type = $_POST['type'];
	
	$response = array();
	$name = array();
	$price = array();
	$socket = array();
	
	$itsocket = $_POST['socket'];

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$sql = "SELECT name,price,socket from $type where socket = '$itsocket' ";
	$result=$conn->query($sql);
	$o = ($result->rowCount());

	for ($i=0; $i < $o; $i++) { 
		$data = $result->fetch();
		$name[$i] = $data['name'];
		$price[$i] = $data['price'];
		$socket[$i] = $data['socket'];
	} 

		$response['name'] = $name;
		$response['price'] = $price;
		$response['socket'] = $socket;
		echo json_encode($response);
		die();
?>