<?php
	header("Access-Control-Allow-Origin: http://sstwork.thddns.net:7770");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	$type = "cpu";
	
	$response = array();
	$name = array();
	$price = array();
	$socket = array();
	$icon = array();
	if(!isset($_POST['socket']) || $_POST['socket'] == null){

		if ($type == "cpu" || $type == "mtb") {
			$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
			$sql = "SELECT name,price,socket,icon from $type ";
			$result=$conn->query($sql);
			$o = ($result->rowCount());

			for ($i=0; $i < $o; $i++) { 
				$data = $result->fetch();
				$name[$i] = $data['name'];
				$price[$i] = $data['price'];
				$socket[$i] = $data['socket'];
				$icon[$i] = $data['icon'];
				} 

			$response['name'] = $name;
			$response['price'] = $price;
			$response['socket'] = $socket;
			$response['icon'] = $icon;
			echo json_encode($response);
			die();
			}
	

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$sql = "SELECT name,price,icon from $type ";
	$result=$conn->query($sql);
	$o = ($result->rowCount());

	for ($i=0; $i < $o; $i++) { 
		$data = $result->fetch();
		$name[$i] = $data['name'];
		$price[$i] = $data['price'];
		$icon[$i] = $data['icon'];
	} 

		$response['name'] = $name;
		$response['price'] = $price;
		$response['icon'] = $icon;
		echo json_encode($response);
		die();
	}

	else{
	$itsocket = $_POST['socket'];

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$sql = "SELECT name,price,socket,icon from $type where socket = '$itsocket' ";
	$result=$conn->query($sql);
	$o = ($result->rowCount());

	for ($i=0; $i < $o; $i++) { 
		$data = $result->fetch();
		$name[$i] = $data['name'];
		$price[$i] = $data['price'];
		$socket[$i] = $data['socket'];
		$icon[$i] = $data['icon'];
	} 

		$response['name'] = $name;
		$response['price'] = $price;
		$response['socket'] = $socket;
		$response['icon'] = $icon;
		echo json_encode($response);
		die();
	}
?>