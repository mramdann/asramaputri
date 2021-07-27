<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database
$id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $no_mes = $_POST['no_mes'];
    $no_kamar = $_POST['no_kamar'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];



    $query = $koneksi->query("INSERT INTO tbl_mess (no_mes, no_kamar, kapasitas, lokasi) VALUES ('$no_mes','$no_kamar','$kapasitas','$lokasi')");
    // print_r($query);
    echo "<script>alert('data berhasil di tambahkan ! ...')</script>";
    echo "<script>location='data_mes.php'</script>";
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TRANSAKSI KARYAWAN</h2>
        </div>

        <div class="row clearfix">
            <!-- Table User -->



            <div class="card">
                <div class="header">


                    <div class="body">
                        <div class="table-responsive">



                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>Nama Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Kamar</th>

                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <tbody>


                                    <!-- konfigurasi pagination -->

                                    <?php
                                    $id = $_GET['id'];
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM tbl_trans a JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan WHERE a.id_mess = '$id'");
                                    while ($data = $sql->fetch_assoc()) {
                                        # code...

                                    ?>


                                        <tr>
                                            <td><?= $no ?></td>

                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['no_kamar'] ?></td>

                                            <td>
                                                <a href="master_hapus.php?aksi=hapus_transaksi&id=<?= $data['id_karyawan'] ?>">
                                                    <span></span>
                                                    <i class="material-icons">delete_forever</i>
                                                </a>


                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>

                                </tbody>
                            </table>



                        </div>

                    </div>

                </div>
                <!-- #END# Table User -->

            </div>


        </div>
</section>

<?php
include "_footer.php";
?>