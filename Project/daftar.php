<?php 
require 'functions.php';

if (isset($_POST["registrasi"])) {
	if (registrasi($_POST)>1) {
		echo "
		<script>
		alert('user baru berhasi ditambah!');
		</script>";
	}else{
		echo mysqli_error($conn);
	}
}
if (isset($_POST["registrasi"])) {
	
	header("location:login.php");		
	}
	$error=true;
?>
<!DOCTYPE html>
<html lang="en">

	<title>Sign Up</title>

		<!-- <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

	<head>
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="login.css" >
        
	</head>
	<body class="bg-login">
	<header>
		<div id="judul">
		<h1 align="center">Ansahado Elektro</h1></div>
		<div class="menu">
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
		  </div></div>
		</header>
		<div class="content">
			<div class="kotaklogin">
				<p class="tulisan"  >Sign Up</p>
	<div class="row daftarrow">
				<div class="col-md-5 center_div" >
 		<form role="form" method="post" style="margin-top: 30px; margin-right:20px">
												
							
 		<div class="form-group satu">
<label class="form">Username</label>
			<input type="text" name="username" class="formlogin" placeholder="Username atau email" />
			
			<label class="form">Password</label>
			<input type="password" name="password" class="formlogin" placeholder="Password" />
            <label class="form">Confirm Password</label>
				<input type="password" name="password2" class="formlogin" placeholder="confirmasi password">
			
			
				<input type="submit" class="tombolmasuk submit" name="registrasi" value="DAFTAR"/>
                <hr>
                <input type="submit" class="tombolmasuk submit" name="login" value="LOGIN"/>
			</form>
					
				</div>
					<br/>
					<br/>
					<center>
						<a class="link" href="login.php">Kembali</a>

		
		</p>
	</div>
	</body>
	 

</html>