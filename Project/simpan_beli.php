<?php
	$namacust=$_POST['namacust'];
	$alamat =$_POST['alamat'];
	$notelp=$_POST['notelp'];
	$tanggal=date("Y-m-d");
	$barang_pilih='';
	$qty =1;

$dataValid="YA";	
if (strlen(trim($namacust))==0) {
	echo "Nama Harus Diisi... <br />";
	$dataValid = "TIDAK";
}
if (strlen(trim($alamat))==0) {
	echo "Alamat Harus Diisi... <br />";
	$dataValid = "TIDAK";
}
if (strlen(trim($notelp))==0) {
	echo "No. Telp Harus Diisi! <br />";
	$dataValid = "TIDAK";
}
if (isset($_COOKIE['keranjang'])) {
	$barang_pilih=$_COOKIE['keranjang'];
}else{
	echo"Keranjang Belanja Kosong </br>";
	$dataValid="TIDAK";
}
if ($dataValid=="TIDAK"){
	echo"Masih ada kesalahan,silakan perbaiki!</br>";
	echo"<input type='button' value='kembali'
			onClick='self.history.back()'>";
	exit;
}
include "koneksiproduk.php";

$simpan=true;
$mulai_transaksi=mysqli_begin_transaction($conn);
$sql = "insert into hjual (tanggal,namacust,alamat,notelp)
		values ('$tanggal','$namacust','$alamat','$notelp')";
$hasil=mysqli_query($conn,$sql);
if(!$hasil){
	echo "Data Customer Gagal Disimpan <br/>";
	$simpan=false;
	}
$idhjual=mysqli_insert_id($conn);
if($idhjual==0){
	echo "Data Customer Tidak Ada<br/>";
	$simpan=false;
	}
$barang_array = explode(",",$barang_pilih);
$jumlah =count($barang_array);

if($jumlah <=1){
	echo "Tidak Ada Barang Yang Dipilih <br/>";
	$simpan=false;
}else{
	foreach($barang_array as $idbarang){
	if($idbarang==0){
		continue;
	}
	$sql ="select * from barang where idbarang = $idbarang";
	$hasil =mysqli_query($conn,$sql);
	if(!$hasil){
		echo "Barang Tidak Ada<br/>";
		$simpan=false;
		break;
	}else{
		$row =mysqli_fetch_assoc($hasil);
		$stok =$row['stok'] - 1;
		if($stok<0){
			echo "Stok Barang ".$row['nama']." Kosong <br/>";
			$simpan=false;
			break;
			}$harga=$row['harga'];
		}
	$sql = "insert into djual (idhjual,idbarang,qty,harga)
			values ('$idhjual','$idbarang','$qty','$harga')";
	$hasil = mysqli_query($conn,$sql);
	if(!$hasil){
		echo "Detail Jual Gagal Simpan";
		$simpan=false;
		break;
	}
	$sql ="update barang set stok = $stok where idbarang=$idbarang";
	$hasil =mysqli_query($conn,$sql);
	if(!$hasil){
		echo "Update Stok Barang Gagal <br/>";
		$simpan=false;
		break;
		}
		}
		}
	if($simpan){
		$komit=mysqli_commit($conn);
	}else{
		$rollback=mysqli_rollback($conn);
		echo "Pemelian Gagal <br/>
			<input type='button' value='Kembali'
			OnClick='self.history.back()'>";
		exit;
}
header("location: berhasil.php?idhjual=$idhjual");	
setcookie("keranjang",$barang_pilih,time()-3600);
?>