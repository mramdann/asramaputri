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
if ($aksi == 'hapus_transaksi') {
	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM tbl_trans WHERE id_trans= '$id'");
	if ($sql == '1') {
		echo "<script>alert('Data berhasil dihapus !')</script>";
		echo "<script>location='trans_karyawan.php'</script>";
	} else {
		echo "<script>location='trans_karyawan.php'</script>";
	}
}
if ($aksi == 'hapus_transaksi') {
	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM tbl_trans WHERE id_trans= '$id'");
	if ($sql == '1') {
		echo "<script>alert('Data berhasil dihapus !')</script>";
		echo "<script>location='trans_karyawan.php'</script>";
	} else {
		echo "<script>location='trans_karyawan.php'</script>";
	}
}


if ($aksi == 'hapus_ijin') {
	$id = $_GET['id'];
	$status_ijin = 'Di Tolak';
	$sql = $koneksi->query("DELETE FROM tbl_ijin WHERE id_ijin='$id'");
	if ($sql == '1') {
		echo "<script>alert('Data berhasil diterima !')</script>";
		echo "<script>location='trans_keluar.php'</script>";
	} else {
		echo "<script>location='trans_keluar.php'</script>";
	}
}

if ($aksi == 'terima') {
	$id = $_GET['id'];
	$status_ijin = 'Terima';
	$sql = $koneksi->query("UPDATE tbl_ijin SET status_ijin='$status_ijin' WHERE id_ijin='$id'");
	if ($sql == '1') {
		echo "<script>alert('Data diterima !')</script>";
		echo "<script>location='trans_keluar.php'</script>";
	} else {
		echo "<script>location='trans_keluar.php'</script>";
	}
}

if ($aksi == 'tolak') {
	$id = $_GET['id'];
	$status_ijin = 'Di Tolak';
	$sql = $koneksi->query("UPDATE tbl_ijin SET status_ijin='$status_ijin' WHERE id_ijin='$id'");
	if ($sql == '1') {
		echo "<script>alert('Data ditolak !')</script>";
		echo "<script>location='trans_keluar.php'</script>";
	} else {
		echo "<script>location='trans_keluar.php'</script>";
	}
}
