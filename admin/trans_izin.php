<?php

$view = $_GET['aksi'];
$judul = " Data Izin Keluar";
echo "<title>" . $view . $judul . "</title>";
include "_header.php";
include "../koneksi.php";
?>


<?php if ($view == 'List') { ?>

    <!-- tampilan data user -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $view . $judul ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item"><?= $judul ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $view . $judul ?></li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?= $view . $judul ?></h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Shift</th>
                            <th>Tujuan</th>
                            <th>Catatan</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Status Izin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_izin a join tbl_karyawan b on a.id_karyawan=b.id_karyawan order by a.id_ijin desc");
                        while ($data = $query->fetch_assoc()) {

                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['nama'] ?> </td>
                                <td> <?= $data['shift'] ?> </td>
                                <td> <?= $data['tujuan'] ?> </td>
                                <td> <?= $data['catatan'] ?> </td>
                                <td> <?= $data['waktu_masuk'] ?> </td>
                                <td> <?= $data['waktu_keluar'] ?> </td>
                                <td>
                                    <?php if ($data['status_izin'] == "Diizinkan") {
                                        echo '<span class="badge badge-success">Diizinkan</span>';
                                    } else if ($data['status_izin'] == "Menunggu Persetujuan") {
                                        echo '<span class="badge badge-warning">Menunggu Persetujuan</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Ditolak</span>';
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($data['status_izin'] == "Menunggu Persetujuan") { ?>
                                        <a href="trans_izin.php?aksi=Izinkan&id=<?= $data['id_ijin'] ?>" class="btn btn-sm btn-success">Izinkan</a>
                                        <a href="trans_izin.php?aksi=Tolak&id=<?= $data['id_ijin'] ?>" class="btn btn-sm btn-warning">Tolak</a>
                                    <?php } ?>
                                    <a href="trans_izin.php?aksi=Hapus&id=<?= $data['id_ijin'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>

    </div>
    <!-- # tampilan data user -->

<?php } else if ($view == 'Izinkan') {
    $id = $_GET['id'];
    $id_user = $_SESSION['admin']['id_user'];
    $query_update = $koneksi->query("update tbl_izin set status_izin='Diizinkan', id_user='$id_user' where id_ijin = '$id' ");
    if ($query_update) {
        echo "<script>alert('Data pengajuan berhasil diupdate !')</script>";
    } else {
        echo "<script>alert('Data pengajuan gagal diupdate!')</script>";
    }
    echo "<script>location='trans_izin.php?aksi=List'</script>";
} else if ($view == 'Tolak') {
    $id = $_GET['id'];
    $id_user = $_SESSION['admin']['id_user'];
    $query_update = $koneksi->query("update tbl_izin set status_izin='Ditolak', id_user='$id_user' where id_ijin = '$id' ");
    if ($query_update) {
        echo "<script>alert('Data pengajuan berhasil diupdate !')</script>";
    } else {
        echo "<script>alert('Data pengajuan gagal diupdate!')</script>";
    }
    echo "<script>location='trans_izin.php?aksi=List'</script>";
} else if ($view == 'Hapus') {
    $id = $_GET['id'];
    $query_hapus = $koneksi->query("delete from tbl_izin where id_ijin = '$id' ");
    if ($query_hapus) {
        echo "<script>alert('Data berhasil dihapus dari database !')</script>";
    } else {
        echo "<script>alert('Data gagal dihapus dari database !')</script>";
    }
    echo "<script>location='trans_izin.php?aksi=List'</script>";
} ?>



<?php
include "_footer.php";
?>