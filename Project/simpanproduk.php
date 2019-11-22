<?php
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok=$_POST['stok'];

$foto = $_FILES['foto'] ['name'];
$tmpName = $_FILES['foto'] ['tmp_name'];
$size = $_FILES['foto'] ['size'];
$type = $_FILES['foto'] ['type']; 

$maxsize = 20000000;
$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");

$dirFoto = "pict";
if(!is_dir($dirFoto))
	mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb="thumb";
if(!is_dir($dirThumb))
	mkdir($dirThumb);
$fileTujuanThumb = $dirThumb."/t_".$foto;

$dataValid = "YA";

if($size > 0) {
	if ($size > $maxsize) {
		echo "Ukuran File Terlalu Besar <br/>";
		$dataValid="TIDAK";
	}
	if (!in_array($type, $typeYgBoleh)) {
		echo "Type File Tidak Dikenal <br/>";
             $dataValid="TIDAK";
	}
}

if (strlen(trim($nama))==0) {
	echo "Nama Barang Harus Diisi! <br />";
	$dataValid = "TIDAK";
}

if (strlen(trim($harga))==0) {
	echo "Harga Harus Diisi! <br />";
	$dataValid = "TIDAK";
}

if (strlen(trim($stok))==0) {
	echo "Harga Harus Diisi! <br />";
	$dataValid = "TIDAK";
}

if ($dataValid =="TIDAK") {
	echo "Masih Ada Kesalahan, silahkan perbaiki! </br>";
	echo "<input type='button' value='Kembali'
			onClick='self.history.back()'>";
	exit;
}

include "koneksiproduk.php";

$sql = "insert into barang
		(nama,kategori,harga,stok,foto)
		values
		('$nama','$kategori',$harga,$stok,'$foto') ";
$hasil = mysqli_query($conn,$sql);

if (!$hasil) {
	echo "Gagal Simpan, silahkan diulangi! <br />";
	echo mysqli_error($conn);
	echo "<br /> <input type='button' value='Kembali'
			onClick='self.history.back()'>";
	exit;
} else {
	echo "SIMPAN Produk BERHASIL" ;
}
if ( $size >0) {
	if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal Upload gambar.. <br/>";
		echo "<a href='inputbarang.php'>Daftar barang</a>";
		exit;
	} else {
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
	}
}
echo "<br/>File Sudah diUpload. <br/>";

function buat_thumbnail ($file_src, $file_dst) {
	//hapus jika thumbail sebelumnya sudah ada
	list ($w_src, $h_src, $type) = getImageSize ($file_src);
	
	switch ($type){
		case 1: // gif -> jpg
			$img_src= imagecreatefromgif ($file_src);
			break;
		case 2: // jpeg -> jpg
			$img_src= imagecreatefromjpeg ($file_src);
			break;
		case 3: // gif -> jpg
			$img_src= imagecreatefrompng ($file_src);
			break;
	}
	
	$thumb = 500; //max. size untuk thumb
	if ($w_src > $h_src) {
		$w_dst = $thumb; //landscape
		$h_dst = round($thumb / $h_src * $w_src);
	} else {
		$w_dst = round($thumb / $h_src * $w_src); //portrait
		$h_dst = $thumb;
	}
	
	$img_dst = imagecreatetruecolor ($w_dst, $h_dst); // resample
	
	imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0,
			$w_dst, $h_dst, $w_src, $h_src);
		imagejpeg($img_dst, $file_dst); //simpan thumbnail
		//bersihkan memori
		imagedestroy($img_src);
		imagedestroy($img_dst);
}
?>
<hr/>
<a href="inputbarang.php"/>DAFTAR BARANG</a>