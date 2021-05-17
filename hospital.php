<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>WebKaKKaK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script>
		function mover(i){
			document.getElementById("ins"+i).style.backgroundColor="#c0c5ff";
		}
		function mout(i){
			document.getElementById("ins"+i).style.backgroundColor="#ffffff";
		}
		function moverp(i){
			document.getElementById("insp"+i).style.backgroundColor="#ffcece";
		}
		function moutp(i){
			document.getElementById("insp"+i).style.backgroundColor="#ffffff";
		}
		function clickp(i){

			alert("");
		}
	</script>
	
</head>
<body >
	
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-9">
		<table>
			<tbody>
				<tr>
					<th><label>หมวดหมู่:</label></th>
		<th>

<div class="dropdown">
  <button onclick="myFunction()"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	<?php 
  	if(isset($_GET['name'])){
  $cn = $_GET['name'];
  echo $cn;}
  else echo "--ทั้งหมด--";
	?>
	</button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  	<li><a class="dropdown-item" href="hospital.php ">--ทั้งหมด--</a></li>
  	<?php
					$conn = new PDO("mysql:host=localhost;dbname=hospital;charset=utf8","root","");
					$sql = "SELECT * from doctor";
					foreach ($conn->query($sql) as $row) {
						echo '<li><a class="dropdown-item" href="hospital.php?doctor_id='.$row['doctor_id'].'&name='.$row['d_name'].'">'.$row['d_name'].'</a></li>';
					}
					$conn = null;
				?>
  </div>
</div>

	</th>
		</tr>
		</tbody>
		</table>
		</div>
		</div>
	</div>
<br>
	<div class="container">
		<div class="table table-responsive">
		<table class="table table-striped">
			<tbody>
				<?php 
			if (!isset($_GET['doctor_id'])) {
				$conn = new PDO("mysql:host=localhost;dbname=hospital;charset=utf8","root","");
				$sql = "SELECT t2.d_name,t3.p_name,t1.symptom,t1.method,t1.datetime from profile as t1 INNER JOIN doctor as t2 ON(t1.doctor_id=t2.doctor_id) INNER JOIN patient as t3 ON(t1.patient_id=t3.patient_id) INNER JOIN skill as t4 ON(t2.skill_id=t4.skill_id) ORDER by t1.datetime DESC";
				$result=$conn->query($sql);
				$o = ($result->rowCount())+1;
				for ($i=1; $i < $o; $i++) { 
				$data = $result->fetch();
				echo "<tr><td >";
				echo "คุณหมอ ";
				echo '<ins id="ins'.$i.'" onmouseover ="mover('.$i.');" onmouseout="mout('.$i.');"><b>'.$data['d_name'].'</b></ins>';  
				echo " ผู้ป่วย ";
				echo '<ins id="insp'.$i.'" onmouseover ="moverp('.$i.');" onmouseout="moutp('.$i.');"><b>'.$data['p_name'].'</b></ins><br>';  
				echo "อาการ <b>".$data['symptom']."</b> วิธีรักษา <b>".$data['method']."</b> เข้ารักษาเมื่อ <b>".$data['datetime']."</b>";  
				echo '</tr>';
				} 
			}
			else{
				$conn = new PDO("mysql:host=localhost;dbname=hospital;charset=utf8","root","");
				$sql = "SELECT t2.d_name,t3.p_name,t1.symptom,t1.method,t1.datetime from profile as t1 INNER JOIN doctor as t2 ON(t1.doctor_id=t2.doctor_id) INNER JOIN patient as t3 ON(t1.patient_id=t3.patient_id) INNER JOIN skill as t4 ON(t2.skill_id=t4.skill_id) where t2.d_name = "."'".$_GET['name']."'"."ORDER by t1.datetime DESC";
				$result=$conn->query($sql);
				$o = ($result->rowCount())+1;
				for ($i=1; $i < $o; $i++) { 
				$data = $result->fetch();
				echo "<tr><td >";
				echo "คุณหมอ ";
				echo '<ins id="ins'.$i.'" onmouseover ="mover('.$i.');" onmouseout="mout('.$i.');" on><b>'.$data['d_name'].'</b></ins>';  
				echo " ผู้ป่วย ";
				echo '<ins id="insp'.$i.'" onmouseover ="moverp('.$i.');" onmouseout="moutp('.$i.');" onclick="clickp('.$i.');"><b>'.$data['p_name'].'</b></ins><br>';  
				echo "อาการ <b>".$data['symptom']."</b> วิธีรักษา <b>".$data['method']."</b> เข้ารักษาเมื่อ <b>".$data['datetime']."</b>";  
				echo '</tr>';
				} 	
			}

					?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>