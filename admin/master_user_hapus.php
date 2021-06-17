<?php
// load konfigurasi koneksi ke database
include "../koneksi.php";

// get id dari url
$id = $_GET['id']; 

// query hapus data berdasarkan id
$sql = $koneksi->query("DELETE FROM tbl_user WHERE id_user='$id'");

if ($sql == '1'){
	echo "<script>alert('Data gagal dihapus !')</script>";
	echo "<script>location='master_user.php'</script>";
}else{
	echo "<script>location='master_user.php'</script>";
}

?>