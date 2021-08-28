<?php

$view = $_GET['aksi'];
$judul = " Penghuni Asrama";
echo "<title>" . $view . $judul . "</title>";
include "_header.php";
include "koneksi.php";
?>


<?php if ($view == 'List') { ?>

    <!-- tampilan data user -->
    <div class="container my-5" id="container-wrapper">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?= $view . $judul ?></h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Kapasitas</th>
                            <th>Jumlah Penghuni</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_asrama");
                        while ($data = $query->fetch_assoc()) {

                            $id_asrama = $data['id_asrama'];
                            $sql = $koneksi->query("select * from tbl_trans where id_asrama='$id_asrama'");
                            $jumlah_penghuni = $sql->num_rows;

                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['no_kamar'] ?> </td>
                                <td> <?= $data['kapasitas'] ?> Orang </td>
                                <td> <?= $jumlah_penghuni ?> Orang </td>
                                <td>
                                    <?php if ($data['kapasitas'] == $jumlah_penghuni) {
                                        echo '<span class="badge badge-danger">Penuh</span>';
                                    } else {
                                        echo '<span class="badge badge-success">Tersedia</span>';
                                    } ?>
                                </td>
                                <td>
                                    <a href="penghuni.php?aksi=Lihat&id=<?= $data['id_asrama'] ?>" class="btn btn-sm btn-primary">Lihat</a>
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

<?php } else if ($view == 'Lihat') {
    // menangkap id dari url 
    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tbl_asrama WHERE id_asrama = '$id'");
    $data = $sql->fetch_assoc();
    $sql2 = $koneksi->query("select * from tbl_trans where id_asrama='$id'");
    $jumlah_penghuni = $sql2->num_rows;

    if (isset($_POST['simpan'])) {
        $id_asrama = $_POST['id_asrama'];
        $id_karyawan = $_POST['id_karyawan'];
        $tgl_masuk = $_POST['tgl_masuk'];

        $query_simpan = $koneksi->query("INSERT INTO tbl_trans (id_asrama, id_karyawan, tgl_masuk) VALUES ('$id_asrama','$id_karyawan','$tgl_masuk')");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil disimpan !')</script>";
            echo "<script>location='penghuni.php?aksi=Lihat&id=$id'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !')</script>";
            echo "<script>location='penghuni.php?aksi=Lihat&id=$id'</script>";
        }
    } ?>

    <!-- # tampilan -->
    <div class="container my-5" id="container-wrapper">

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Penghuni Asrama <?= $data['no_kamar'] ?></h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Shift</th>
                            <th>No Telpon</th>
                            <th>Tgl Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_trans a join tbl_karyawan b on a.id_karyawan=b.id_karyawan where a.id_asrama = '$id'");
                        while ($data = $query->fetch_assoc()) {

                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['nama'] ?> </td>
                                <td> <?= $data['shift'] ?> </td>
                                <td> <?= $data['tlp'] ?> </td>
                                <td> <?= $data['tgl_masuk'] ?> </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <!-- # tampilan Edit data user -->
<?php } ?>



<?php
include "_footer.php";
?>