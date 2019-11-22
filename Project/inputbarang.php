<?php
include "koneksiproduk.php";
$sql = "select * from barang";
$hasil = mysqli_query($conn, $sql);
if (!$hasil) {
	die("Gagal query..".mysql_error());

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Input Produk</title>
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
<h2>.:: ISI BARANG ::.</h2>
<form action="simpanproduk.php" method="post" enctype="multipart/form-data">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"/></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td><input type="text" name="kategori"/></td>
	</tr>
	<tr>
		<td>Harga Jual</td>
		<td><input type="text" name="harga"/></td>
	</tr>
	<tr>
		<td>Stok</td>
		<td><input type="text" name="stok"/></td>
	</tr>
	<tr>
		<td>Gambar </td>
		<td><input type="file" name="foto"></td>
	</tr>
	<tr>
		<td>
		<input type="submit" value="Simpan" name="proses"/>
		<input type="reset" value="Reset" name="reset"/>
		</td></tr>
<form><br/><br/>
<table border="1">
	<tr>
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Operasi</th>
	</tr>
	<?php
		$no=0;
		while($row=mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['kategori']."</td>";
			echo "<td>Rp.".$row['harga']."</td>";
			echo "<td>".$row['stok']."</td>";
			echo "<td>";
			echo "<a href='barang_edit.php?idbarang=".$row['idbarang']."'>
					EDIT</a>";
			echo "&nbsp;&nbsp;";
			echo "<a href='barang_hapus.php?idbarang=".$row['idbarang']."'>
					HAPUS</a>";
			echo "</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>
  <div class="footer"><p align="center">Copright &copy; by Haryanto,Dorik,Saodah,Andre</p></div>
  </body>
</html>