<!DOCTYPE html>
<html>
<head>
	<title>WebKaKKaK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body align="center">
	<h1 align="center">Webboard KakKak</h1>
	
ต้องการดูกระทู้หมายเลข <?php  
		$num = $_GET['id'];
		if(is_string($num)){
			$num = -1;
		}
		echo "$num";
	?>
	<br><?php 
		if (($num %2) == 0) {
			echo "เป็นกระทู้หมายเลขคู่";
		}
		else echo "เป็นกระทู้หมายเลขคี่";
	 ?>
	<br>
	<br>
	<div class="container" >
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-group">
		<div class="panel panel-primary">
			<div class="panel-heading" align="left" >
				<b><?php
					$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
					$sql = "SELECT t1.title,t1.content,t2.login,t1.post_date from post as t1 INNER JOIN user as t2 ON(t1.user_id=t2.id)   where t1.id =".$num." ";
					$result=$conn->query($sql);
					$data = $result->fetch();
					echo "".$data['title']."";
					if ($data == null) {
						echo "ไม่พบกระทู้";
					}
				?></b>
			</div>
			<div class="panel-body" align="left">
				<?php
				 echo "".$data['content']."<br>".$data['login']." - ".$data['post_date'];
				?>
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>
<?php
	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
					$sql = "SELECT t1.id,t1.content,t2.login,t1.post_date from comment as t1 INNER JOIN user as t2 ON(t1.user_id=t2.id)   where t1.post_id =".$num." ";
					$result=$conn->query($sql);
					$o = ($result->rowCount())+1;
				for ($i=1; $i < $o; $i++) {
					$data = $result->fetch();
					echo '<div class="container" >
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-group">
		<div class="panel panel-info">
			<div class="panel-heading" align="left" >
				<b> ความคิดเห็นที่ '.$i.'</b>
				</div>
			<div class="panel-body" align="left"> 
				'.$data['content']."<br><br>".$data['login']." - ".$data['post_date'].'
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>';
				}
?>
<br>
	<?php
	if(isset($_SESSION['role'])){
		echo '
	<div class="container" >
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel-group">
		<div class="panel panel-success">
			<div class="panel-heading" align="left" >
				<b>แสดงความคิดเห็น</b>
			</div>
			<div class="panel-body">
				<form action="post_save.php" method="post" class="form-horizontal">
					<input type="hidden" name="post_id" value="'.$num.'">
					<div class="form-group">
						<div >
							<textarea name="comment" placeholder="" style="width: 90%" required></textarea>
						</div>
					</div>
					<div align="center">
						<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-send"></span> ส่งข้อความ</button>
					</div>
				</form>
			</div>
		</div>
				</div>
			</div>
		</div>
		
	</div>';
	} ?>

	<br>

</body>
</html>