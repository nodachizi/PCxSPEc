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
		function admindelete(){
			var txt;
			var r = confirm("Delete post?");
			return r;
		}
	</script>
	
</head>
<body >
	<h1 align="center">Webboard KakKak</h1>
	<div class="container">
		<nav class="navbar navbar-default">
					<ul class="nav navbar-nav">
					<li><a href="index.php">
								<span class="glyphicon glyphicon-home"> Home</span>
						</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php  
						if (!isset($_SESSION['id'])){
							echo '<ul class="nav navbar-nav"><li><a href= "login.php">
										<span class="glyphicon glyphicon-edit"> เข้าสู่ระบบ</span>
								</a></li></ul>';
						}
						elseif ($_SESSION['role'] == "a"){
							$username = $_SESSION['username'];
							echo '<li><div class="dropdown">
								<ul class="nav navbar-nav"><li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'.
								" $username".'<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li><a href= "logout.php" ><span class="glyphicon glyphicon-off"> </span> ออกจากระบบ</a></li></li></ul>
							</div></li>';
						}
						elseif ($_SESSION['role'] == "m"){
							$username = $_SESSION['username'];
							echo '<li><div class="dropdown">
								<ul class="nav navbar-nav"><li><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'.
								" $username".'<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li><a href= "logout.php" ><span class="glyphicon glyphicon-off"> </span> ออกจากระบบ</a></li></li></ul>
							</div></li>';
						}
					?><li>&nbsp;&nbsp;&nbsp;&nbsp;</li></ul>
		</nav>
	</div>
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
  	<li><a class="dropdown-item" href="index.php ">--ทั้งหมด--</a></li>
  	<?php
					$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
					$sql = "SELECT * from category";
					foreach ($conn->query($sql) as $row) {
						echo '<li><a class="dropdown-item" href="index.php?catid='.$row['id'].'&name='.$row['name'].'">'.$row['name'].'</a></li>';
					}
					$conn = null;
				?>
  </div>
</div>
<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
	</th>
		</tr>
		</tbody>
		</table>
		</div>
		<div class="col-md-2">
			<?php 
			if (isset($_SESSION['id'])){
				echo '<a href= "newpost.php" ><button class="btn btn-success"><span class="glyphicon glyphicon-plus">สร้างกระทู้ใหม่</button></a>';
			}
			?>
		</div></div>
	</div>
<br>
	<div class="container">
		<div class="table table-responsive">
		<table class="table table-striped">
			<tbody>
				<?php 
				if (!isset($_GET['catid'])) {
				$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
				$sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date from post as t1 INNER JOIN user as t2 ON(t1.user_id=t2.id) INNER JOIN category as t3 ON(t1.cat_id=t3.id) ORDER by t1.post_date DESC";
				$result=$conn->query($sql);
				$o = ($result->rowCount())+1;
				for ($i=1; $i < $o; $i++) { 
				$data = $result->fetch();
				echo "<tr><td >";
				echo "[".$data['name']."] "."<a href="."post.php?id=".$data['id'].">".$data['title']."</a><br>".$data['login']." - ".$data['post_date']."</td>"; 
				if (!isset($_SESSION['id']));
				elseif ($_SESSION['role'] == "a"){
				echo " ";
				echo '<td align="center"><a href='.'delete.php?id='.$data['id']." onclick='return admindelete();'".'>
				<button class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span> ลบ</button></a></td>';
				} 
				echo '</tr>';
				} 
				}
				else {
					$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
					$sql = 'SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date from post as t1 INNER JOIN user as t2 ON(t1.user_id=t2.id) INNER JOIN category as t3 ON(t1.cat_id=t3.id) where t3.name = "'.$cn.'"  ORDER by t1.post_date DESC';
					$result=$conn->query($sql);
				$o = ($result->rowCount())+1;
				for ($i=1; $i < $o; $i++) { 
				$data = $result->fetch();
				echo "<tr><td >";
				echo "[".$data['name']."] "."<a href="."post.php?id=".$data['id'].">".$data['title']."</a><br>".$data['login']." - ".$data['post_date']."</td>"; 
				if (!isset($_SESSION['id']));
				elseif ($_SESSION['role'] == "a"){
				echo " ";
				echo '<td align="center"><a href='.'delete.php?id='.$data['id']." onclick='return admindelete();'".'>
				<button class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span> ลบ</button></a></td>';
				} 
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