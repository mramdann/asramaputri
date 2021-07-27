<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database

if (isset($_POST['simpan'])) {
    $no_mes = $_POST['no_mes'];
    $no_kamar = $_POST['no_kamar'];
    $no_kamar = $_POST['id_transaksi'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];



    $query = $koneksi->query("INSERT INTO tbl_mess (no_mes, no_kamar, kapasitas, lokasi, id_transaksi) VALUES ('$no_mes','$no_kamar','$kapasitas','$lokasi','$id_transaksi')");
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
                    <h2>Table Transaksi Karyawan</h2>
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
                                    <h4 class="modal-title" id="defaultModalLabel">Tambah data Mess Karyawan</h4>
                                </div>



                                <form method="POST">
                                    <div class="modal-body">


                                        <label for="no_mes">Nama Karyawan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected>Nama Karyawan</option>
                                                    <?php
                                                    $sql = $koneksi->query("SELECT * FROM tbl_karyawan");
                                                    while ($data = $sql->fetch_assoc()) {
                                                        # code...
                                                    ?>
                                                        <option><?= $data['nama'] . " - " . $data['jabatan'] . " - " . $data['jenis_kelamin'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <label for="lokasi">No mess</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected>Pilih No Mess</option>
                                                    <?php
                                                    $sql = $koneksi->query("SELECT * FROM tbl_mess");
                                                    while ($data = $sql->fetch_assoc()) {
                                                        # code...

                                                    ?>
                                                        <option><?= $data['no_mes'] . " - " . $data['kapasitas'] . " - " . $data['lokasi'] ?></option>

                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <label for="lokasi">NO Kamar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected>Pilih No Kamar</option>

                                                    <?php
                                                    for ($no = 1; $no
                                                        <= 20; $kata++) {
                                                        echo "<option>$no</option>" . "<br />";
                                                    }
                                                    ?>

                                                </select>
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

                                    <th>Nomber Mess</th>
                                    <th>Kapasitas</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>


                                <!-- konfigurasi pagination -->

                                <?php

                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tbl_mess");
                                while ($data = $sql->fetch_assoc()) {
                                    # code...

                                ?>
                                    <tr>
                                        <td><?= $no ?></td>

                                        <td><?= $data['no_mes'] ?></td>
                                        <td><?= $data['kapasitas'] ?></td>
                                        <td><?= $data['lokasi'] ?></td>
                                        <td>
                                            <a href="master_hapus.php?aksi=hapus_mess&id=<?= $data['id_mess'] ?>">
                                                <span></span>
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                            <a href="edit_data_mess.php?id=<?= $data['id_mess'] ?>">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="detail_transaksi_karyawan.php?id=<?= $data['id_mess'] ?>">
                                                <button class="bottom-success">view</button>
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