<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database

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
                                    <h4 class="modal-title" id="defaultModalLabel">Tambah data Karyawan</h4>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">


                                        <label for="no_mes">Nomer Mess</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="no_mes" id="no_mes" class="form-control" placeholder="Masukan no mess" required>
                                            </div>
                                        </div>


                                        <label for="no_kamar">Nomer Kamar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="no_kamar" id="no_kamar" class="form-control" placeholder="Masukan Nomer Kamar" required>
                                            </div>
                                        </div>


                                        <label for="kapasitas">Kapasitas</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukan Kapasitas" required>
                                            </div>
                                        </div>
                                        <label for="lokasi">Lokasi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukan Lokasi" required>
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