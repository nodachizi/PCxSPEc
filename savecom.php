<?php  
	header("Access-Control-Allow-Origin: http://sstwork.thddns.net:7770");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	$_POST = json_decode(array_keys($_POST)[0],true);
	$response = array();

	$cpu = $_POST['cpu'];
	$gpu = $_POST['gpu'];
	$mtb = $_POST['mtb'];
	$ram = $_POST['ram'];
	$psu = $_POST['psu'];
	$str = $_POST['str'];

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$key = sha1("".$cpu.$gpu.$mtb.$ram.$psu.$str."");

$sql = "SELECT * from savecom where com_key='$key'";
$result=$conn->query($sql);
	if($result->rowCount() == 1){
		$response['key'] = $key;
		echo json_encode($response);
		die();
	}
	else{
		$sql = "INSERT into savecom (com_key,cpu_name,gpu_name,mtb_name,ram_name,psu_name,str_name) values('$key','$cpu','$gpu','$mtb','$ram','$psu','$str')";
		$conn->exec($sql);
		$response['key'] = $key;
		echo json_encode($response);
		die();
	}
$conn = null;
?>
