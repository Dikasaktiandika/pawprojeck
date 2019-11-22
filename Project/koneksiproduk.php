<?php
include "functions.php";
$sqlTabelBarang = " create table if not exists barang(
						idbarang int auto_increment not null primary key,
						nama varchar(40) not null,
						kategori varchar(30) not null,
						harga int not null default 0,
						stok int not null default 0,
						foto varchar(70) not null default ' ',
						KEY(nama))";
	mysqli_query($conn, $sqlTabelBarang) or die ("Gagal Buat Tabel barang");
$sqlTabelHjual = "create table if not exists hjual (
				idhjual int auto_increment not null primary key,
				tanggal date not null,
				namacust varchar(40) not null,
				alamat varchar(50) not null default '',
				notelp varchar(20) not null default ''
				)";

mysqli_query ($conn, $sqlTabelHjual) or die ("Gagal Buat Tabel Header Jual");

$sqlTabelDjual = "create table if not exists djual (
				iddjual int auto_increment not null primary key,
				idhjual int not null,
				idbarang int not null,
				qty int not null,
				harga int not null
				)";

mysqli_query ($conn, $sqlTabelDjual) or die ("Gagal Buat Tabel Detail Jual");
?>