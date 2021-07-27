<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];

    $query = $koneksi->query("INSERT INTO tbl_karyawan (nama, jenis_kelamin, nik, jabatan, alamat, tlp) VALUES ('$nama','$jenis_kelamin','$nik','$jabatan','$alamat','$tlp')");
    // print_r($query);
    echo "<script>alert('data berhasil di tambahkan ! ...')</script>";
    echo "<script>location='data_karyawan.php'</script>";
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA KARYAWAN</h2>
        </div>

        <div class="row clearfix">
            <!-- Table User -->
            <div class="card">
                <div class="header">
                    <h2>Table Data Karyawan</h2>
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


                                        <label for="nama">Nama Karyawan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama Karyawan" required>
                                            </div>
                                        </div>


                                        <label for="jabatan">Jabatan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="jabatan" id="jabatan">
                                                    <option selected> </option>
                                                    <option>oprator</option>
                                                    <option>produksi</option>
                                                    <option>kadip</option>
                                                    <option>admin</option>
                                                </select>
                                            </div>
                                        </div>


                                        <label for="nik">No Identitas Karyawan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan No Identitas Karyawan" required>
                                            </div>
                                        </div>
                                        <label for="alamat">Alamat</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required>
                                            </div>
                                        </div>
                                        <label for="tlp">No Telpon</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="tlp" id="tlp" class="form-control" placeholder="Masukan No Telpon" required>
                                            </div>
                                        </div>


                                        <label for="nik">Jenis Kelamin</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki">
                                            <label class="form-check-label" for="laki">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
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
                                    <th>Jenis Kelamin</th>
                                    <th>No Identitas Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>No Telpon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                $sql = $koneksi->query("select * from tbl_karyawan");
                                while ($data = $sql->fetch_assoc()) {
                                    # code...
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['nik'] ?></td>
                                        <td><?= $data['jabatan'] ?></td>
                                        <td><?= $data['tlp'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td>
                                            <a href="master_hapus.php?aksi=hapus_karyawan&id=<?= $data['id_karyawan'] ?>">
                                                <span></span>
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                            <a href="edit_data_karyawan.php?id=<?= $data['id_karyawan'] ?>">
                                                <i class="material-icons">edit</i>
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