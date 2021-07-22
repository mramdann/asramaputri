<?php

include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database



$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];

    $query = $koneksi->query("UPDATE tbl_karyawan SET nama='$nama',jenis_kelamin='$jenis_kelamin',nik='$nik',jabatan='$jabatan',alamat='$alamat',tlp=$tlp where id_karyawan='$id'");
    // print_r($query);
    if ($query) {
        echo "<script>alert('Data karyawan berhasil diubah !')</script>";
    } else {
        echo "<script>alert('Data karyawan gagal diubah !')</script>";
    }

    echo "<script>location='data_karyawan.php'</script>";
}
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT DATA KARYAWAN</h2>
        </div>

        <div class="row clearfix">
            <!-- Table User -->
            <div class="card">

                <div class="body">

                    <?php
                    $id = $_GET['id'];
                    $query = $koneksi->query("select * from tbl_karyawan WHERE id_karyawan= '$id'");
                    while ($data = $query->fetch_assoc()) {
                    ?>

                        <form method="POST">
                            <div class="modal-body">
                                <label for="nama">Nama Karyawan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                                    </div>
                                </div>

                                <label for="jabatan">Jabatan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required>
                                    </div>
                                </div>
                                <label for="nik">No Identitas Karyawan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="nik" id="nik" class="form-control" value="<?= $data['nik'] ?>" required>
                                    </div>
                                </div>

                                <label for="alamat">Alamat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data['alamat'] ?>" required>
                                    </div>
                                </div>

                                <label for="tlp">No Telpon</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="tlp" id="tlp" class="form-control" value="<?= $data['tlp'] ?>" required>
                                    </div>
                                </div>

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
                                <a href="data_karyawan.php"> <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button></a>

                            </div>
                        </form>
                    <?php } ?>

                </div>

            </div>
            <!-- #END# Table User -->

        </div>
    </div>
</section>



<?php
include "_footer.php";
?>