<?php
session_start();
$barang_pilih = 0;
if(isset($_COOKIE['keranjang'])){
	$barang_pilih = $_COOKIE['keranjang'];
}
if(isset($_GET['idbarang'])){
	$idbarang = $_GET['idbarang'];
	$barang_pilih = $barang_pilih.",".$idbarang;
	setcookie('keranjang',$barang_pilih,time()+3600);
}
include "koneksiproduk.php";
$sql = "select * from barang where idbarang not in(".$barang_pilih.")
		and kategori='penyimpanan' order by idbarang desc";
$hasil = mysqli_query($conn, $sql);
if (!$hasil) {
	die("Gagal query..".mysqli_error());
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pemyimpanan</title>
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
  <table cellpadding="2px">
	  <?php
	  $jum_kolom=4;
		$no=0;
		while($row=mysqli_fetch_assoc($hasil)){
			if($no >=$jum_kolom){
				echo"<tr></tr>";
				$no=0;
			}$no++;
		?>
		<td>
		<?php
			echo "<a href='pict/{$row['foto']}'/>
				  <img src='thumb/t_{$row['foto']}'width='200' height='250'/>
				  </a>";
			echo "<br>".$row['nama']."<br/>";
			echo "".$row['harga']."<br/>";
			echo "".$row['stok']."<br/>";
			echo "<a href =' ".$_SERVER['PHP_SELF']."?idbarang=".
					$row['idbarang']." '>BELI</a><br/>";
		}?>
</table>
</div>
  <div class="footer"><p align="center">Copright &copy; by Haryanto,Dorik,Saodah,Andre</p></div>
</body>
</html>