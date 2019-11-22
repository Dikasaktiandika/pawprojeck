<?php 
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE["id"])&&isset($_COOKIE["key"])) {
	$id=$_COOKIE['id'];
	$key=$_COOKIE['key'];

	// ambil username bedasarkan id
	$result = mysqli_query($conn,"SELECT username FROM user WHERE id =$id");
	$row=mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key===hash('sha256', $row['username'])) {
		$_SESSION['login']=true;
	}
	}

if (isset($_POST["login"])) {
	$username=$_POST["username"];
	$password=$_POST["password"];

	$result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

	// cek username
	if (mysqli_num_rows($result)>0) {

		// cek password
		$row= mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			//set session
			$_SESSION["login"]=true;
			$_SESSION["error"]=false;

			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookies
				setcookie('id',$row['id'],time()+60);
				setcookie('key',hash('sha256', $row['username'])); 
			}
			if($row['level']="pembeli"){
				header("location:index.php");
				exit;
			}else if($row['level']="admin"){
				header("location:inputbarang.php");
				exit;
			}
		}
	}else{
		$_SESSION["error"]=true;
	}

}
if (isset($_POST["registrasi"])) {
	header("location:daftar.php");	
}	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	 <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="login.css" >
</head>
<body>

	<div id="judul" style=background-color:#006faa; >
	<h1 align="center" >Ansahado Elektro</h1>
	</div>
	<div class="menu" style=background-color:#006faa;>
	<input type="checkbox" id="tag-menu"/>
		  <label class="fa fa-bars menu-bar" for="tag-menu"><a>&#9776; Menu</a>
		  </label>
		  <div class="jw-drawer">
			<nav>
			  <ul>
				<li><a href="index.php">Home</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <li class="dropdown"><a href="#">Kategori</a>
        	<ul class="isi">
        		<li><a href="memory.php">Penyimpanan</a></li>
            	<li><a href="lain.php">Lain-Lain</a></li>
        	</ul></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
			  </ul>
			</nav>
		  </div>
		  </div>
	<div class="content">
	<div class="kotaklogin" style="background-color:white;" >
		<form class="px-4" style="background-color:white;" method="POST">
			<p class="tulisan">Silahkan Login</p>
			<div class="form-group">
			<!---- <?php if(isset($_SESSION["error"])){?>
				<p style="color: red;font-style: italic;text-align:center;">usename / password salah</p>
			 <?php } ?>
			 ---------->
			
			<label class="form">Username</label>
			<input type="text" name="username" class="formlogin" placeholder="Username atau email" />
			
			<label class="form">Password</label>
			<input type="password" name="password" class="formlogin" placeholder="Password" />
			
			
			</div>
			
			<input type="submit" class="tombolmasuk submit" name="login" value="LOGIN"/>
			<hr>
				<input type="submit" class="tombolmasuk submit" name="registrasi" value="DAFTAR"/>
			</form>
		  </div>
	</div>


</body>


	</html> 