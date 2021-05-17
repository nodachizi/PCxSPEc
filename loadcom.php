<?php  
	header("Access-Control-Allow-Origin: http://sstwork.thddns.net:7770");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Header: Content-Type");
	header("Access-Control-Max-Age: 86400");

	$_POST = json_decode(array_keys($_POST)[0],true);
	$response = array();

	$key = $_POST['key'];

	$conn = new PDO("mysql:host=localhost;dbname=comproduct;charset=utf8","root","");
	$sql = "SELECT * from savecom where com_key='$key'";
	$result=$conn->query($sql);
	$data = $result->fetch();

	$response['cpu_name'] = $data['cpu_name'];
	$response['gpu_name'] = $data['gpu_name'];
	$response['mtb_name'] = $data['mtb_name'];
	$response['ram_name'] = $data['ram_name'];
	$response['psu_name'] = $data['psu_name'];
	$response['str_name'] = $data['str_name'];

	$sql = "SELECT price from gpu where name ='".$response['gpu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['gpu_price'] = $data['price'];
	$sql = "SELECT price from ram where name ='".$response['ram_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['ram_price'] = $data['price'];
	$sql = "SELECT price from psu where name ='".$response['psu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['psu_price'] = $data['price'];
	$sql = "SELECT price from str where name ='".$response['str_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['str_price'] = $data['price'];

	if($response['cpu_name'] == null && $response['mtb_name'] != null){
	$sql = "SELECT price,socket from mtb where name ='".$response['mtb_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['mtb_price'] = $data['price'];
	$response['socket'] = $data['socket'];
}
	if($response['mtb_name'] == null && $response['cpu_name'] != null){
	$sql = "SELECT price,socket from cpu where name ='".$response['cpu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	if ($data['price'] == null) {
		$data['price'] = 0;
	}
	$response['cpu_price'] = $data['price'];
	$response['socket'] = $data['socket'];

}
	if ($response['cpu_name'] != null && $response['mtb_name'] != null) {
		$sql = "SELECT price,socket from cpu where name ='".$response['cpu_name']."' ";
		$result=$conn->query($sql);
		$data = $result->fetch();
		if ($data['price'] == null) {
			$data['price'] = 0;
		}
		$response['cpu_price'] = $data['price'];
		$response['socket'] = $data['socket'];
		$sql = "SELECT price from mtb where name ='".$response['mtb_name']."' ";
		$result=$conn->query($sql);
		$data = $result->fetch();
		if ($data['price'] == null) {
			$data['price'] = 0;
		}
		$response['mtb_price'] = $data['price'];
	}
	if ($response['mtb_name'] == null) {
			$response['mtb_price'] = 0;
		}
	if ($response['cpu_name'] == null) {
			$response['cpu_price'] = 0;
		}


	$sql = "SELECT icon from gpu where name ='".$response['gpu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['gpu_icon'] = $data['icon'];

	$sql = "SELECT icon from cpu where name ='".$response['cpu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['cpu_icon'] = $data['icon'];

	$sql = "SELECT icon from mtb where name ='".$response['mtb_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['mtb_icon'] = $data['icon'];

	$sql = "SELECT icon from ram where name ='".$response['ram_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['ram_icon'] = $data['icon'];

	$sql = "SELECT icon from psu where name ='".$response['psu_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['psu_icon'] = $data['icon'];

	$sql = "SELECT icon from str where name ='".$response['str_name']."' ";
	$result=$conn->query($sql);
	$data = $result->fetch();
	$response['str_icon'] = $data['icon'];


		echo json_encode($response);
		die();
?>
