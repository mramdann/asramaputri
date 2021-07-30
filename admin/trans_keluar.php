<?php



include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database

if (isset($_POST['simpan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tujuan = $_POST['tujuan'];
    $catatan = $_POST['catatan'];
    $waktu_masuk = $_POST['waktu_masuk'];
    $waktu_keluar = $_POST['waktu_keluar'];
    $status_ijin = 'Menunggu Persetujuan..!';

    $query = $koneksi->query("INSERT INTO tbl_ijin (id_karyawan, tujuan, catatan, waktu_masuk, waktu_keluar, status_ijin) VALUES ('$id_karyawan','$tujuan','$catatan','$waktu_masuk','$waktu_keluar','$status_ijin')");

    echo "<script>alert('data berhasil di tambahkan ! ...')</script>";
    echo "<script>location='trans_keluar.php'</script>";
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
                    <h2>Table Ijin Keluar</h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_tambah_data">
                                <i class="material-icons">add_box</i>
                            </a>
                        </li>
                    </ul>

                    <!-- Modal ambah data -->
                    <div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="defaultModalLabel">Tambah data Ijin Karyawan</h4>

                                    <form method="POST">
                                        <div class="modal-body">


                                            <label for="id_karyawan">Nama Karyawan</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="id_karyawan" id="id_karyawan">
                                                        <option selected>Nama Karyawan</option>
                                                        <?php
                                                        $sql = $koneksi->query("SELECT * FROM tbl_karyawan");
                                                        while ($data = $sql->fetch_assoc()) {
                                                            # code...
                                                        ?>
                                                            <option value="<?= $data['id_karyawan'] ?>"><?= $data['nama'] . " - " . $data['jabatan'] . " - " . $data['jenis_kelamin'] ?></option>
                                                        <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="tujuan">Tujuan</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukan Tujuan" required>
                                                </div>
                                            </div>
                                            <label for="catatan">Catatan</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea class="form-control" name="catatan" id="catatan" placeholder="Masukan Catatan" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <label for="waktu_keluar">Waktu Keluar</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" name="waktu_keluar" id="waktu_keluar" class="form-control" placeholder="Masukan waktu keluar" required>
                                                </div>
                                            </div>

                                            <label for="waktu_masuk">Waktu Masuk</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" name="waktu_masuk" id="waktu_masuk" class="form-control" placeholder="Masukan Waktu Masuk" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" name="simpan" class="btn btn-link waves-effect">SIMPAN</button>
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Modal ambah data -->

                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>Nama Karyawan</th>
                                        <th>Tujuan</th>
                                        <th>Catatan</th>
                                        <th>Waktu Keluar</th>
                                        <th>Waktu Masuk</th>
                                        <th>Status Ijin</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- konfigurasi pagination -->

                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM tbl_ijin a JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan");
                                    while ($data = $sql->fetch_assoc()) {
                                        # code...


                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>

                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['tujuan'] ?></td>
                                            <td><?= $data['catatan'] ?></td>
                                            <td><?= $data['waktu_masuk'] ?> </td>
                                            <td><?= $data['waktu_keluar'] ?> </td>
                                            <td><?= $data['status_ijin'] ?></td>
                                            <td>
                                                <a href="master_aksi.php?aksi=hapus_ijin&id=<?= $data['id_ijin'] ?>">
                                                    <span></span>
                                                    <i class="material-icons">delete_forever</i>
                                                </a>

                                                <a href="master_aksi.php?aksi=terima&id=<?= $data['id_ijin'] ?>">
                                                    <span></span>
                                                    <i class="material-icons">done</i>
                                                </a>
                                                <a href="master_aksi.php?aksi=tolak&id=<?= $data['id_ijin'] ?>">
                                                    <span></span>
                                                    <i class="material-icons">clear</i>
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