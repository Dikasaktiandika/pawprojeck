<?php
session_start();
$barang_pilih = 0;
if(isset($_COOKIE['keranjang'])){
	$barang_pilih = $_COOKIE['keranjang'];
}
if(isset($_GET['idbarang'])){
	$idbarang = $_GET['idbarang'];
	$barang_pilih = str_replace((",".$idbarang),"",$barang_pilih);
	setcookie('keranjang',$barang_pilih,time()+3600);
}
include "koneksiproduk.php";
$sql = "select * from barang where idbarang in(".$barang_pilih.")
		 order by idbarang desc";
$hasil = mysqli_query($conn, $sql);
if (!$hasil) {
	die("Gagal query..".mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="tabel.css">
</head>
<body>
<header>
<div id="judul">
<h1 align="center">Ansahado Elektro</h1></div>
<div class="menu">
	<button class="tombol"><a href="logout.php">Logout</a></button>
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
	<div id="databeli">
		<h2>DATA PEMBELI</h2>
		<form action='simpan_beli.php' method="post" float="left">
		<table border="0">
		<tr>
			<td>Nama : <input type="text" name="namacust"/></td>
		</tr>
		<tr>
			<td>Alamat : <input type="text" name="alamat"/></td>
		</tr>
		<tr>
			<td>No. Telp : <input type="text" name="notelp"/></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
			<input type="submit" value="Beli"/></td>
			<td></td>
		</tr>
		</table>
		</form>
	</div>
<table cellpadding="5" cellspacing="1">
<?php
		$no=0;
		while($row=mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td><a href='pict/{$row['foto']}'/>
				  <img src='thumb/t_{$row['foto']}'width='100'/>
				  </a></td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>Rp.".$row['harga']."</td>";
			echo "<td>";
			echo "<a href ='".$_SERVER['PHP_SELF']."?idbarang=".
					$row['idbarang']." '>BATAL</a>";
			echo "</td>";
			echo "</tr>";
		}
	?>
</table>		
</div>
  <div class="footer"><p align="center">Copright &copy; by Haryanto,Dorik,Saodah,Andre</p></div>
</body>
</html>