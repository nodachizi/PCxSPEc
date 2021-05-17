<?php  
	header("Access-Control-Allow-Origin: https://www.google.co.th");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	//--//$_POST = json_decode(array_keys($_POST)[0],true);
	$response = array();

	//--//$type = $_POST['type'];
	//--//$name = $_POST['name'];

	$type = 'cpu';
	$name = 'INTEL_Core_i5-10400F';


	//$pic = $_POST['pic'];

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$sql = "SELECT icon from $type where name = '$name' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	//$data['icon'];
	//$pic = "/icon/".
		echo '<img src="/icon/'.$data['icon'].'">';
	die();
?>
