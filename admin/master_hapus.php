<?php

$aksi = $_GET['aksi'];
// load konfigurasi koneksi ke database
include "../koneksi.php";

// get id dari url

if ($aksi == 'hapus') {
	$id = $_GET['id'];

	// query hapus data berdasarkan id
	$sql = $koneksi->query("DELETE FROM tbl_user WHERE id_user='$id'");

	if ($sql == '1') {
		echo "<script>alert('Data berhasil dihapus !')</script>";
		echo "<script>location='master_user.php'</script>";
	} else {
		echo "<script>location='master_user.php'</script>";
	}
}

if ($aksi == 'hapus_karyawan') {
	$id = $_GET['id'];

	// query hapus data berdasarkan id
	$sql = $koneksi->query("DELETE FROM tbl_karyawan WHERE id_karyawan='$id'");

	if ($sql == '1') {
		echo "<script>alert('Data berhasil dihapus !')</script>";
		echo "<script>location='data_karyawan.php'</script>";
	} else {
		echo "<script>location='data_karyawan.php'</script>";
	}
}

if ($aksi == 'hapus_mess') {
	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM tbl_mess WHERE id_mess= '$id'");
	if ($sql == '1') {
		echo "<script>alert('Data berhasil dihapus !')</script>";
		echo "<script>location='data_mes.php'</script>";
	} else {
		echo "<script>location='data_mes.php'</script>";
	}
}
