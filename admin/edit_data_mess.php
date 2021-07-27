<?php

include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database



$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $no_mes = $_POST['no_mes'];
    $kamar = $_POST['kamar'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];



    $query = $koneksi->query("UPDATE tbl_mess SET no_mes='$no_mes', kamar='$kamar' ,kapasitas='$kapasitas',lokasi='$lokasi' where id_mess='$id'");
    // var_dump($query);
    echo "<script>alert('data berhasil di ubah ! ...')</script>";
    echo "<script>location='data_mes.php'</script>";
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
                    $query = $koneksi->query("select * from tbl_mess WHERE id_mess= '$id'");
                    while ($data = $query->fetch_assoc()) {
                    ?>

                        <form method="POST">
                            <div class="modal-body">


                                <label for="no_mes">Nomer Mess</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="no_mes" id="no_mes" class="form-control" value="<?= $data['no_mes'] ?>" required>
                                    </div>
                                </div>


                                <label for=" no_kamar">Jumlah Kamar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="kamar" id="no_kamar" class="form-control" value="<?= $data['kamar'] ?>" required>
                                    </div>
                                </div>


                                <label for="kapasitas">Kapasitas</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" value="<?= $data['kapasitas'] ?>" required>
                                    </div>
                                </div>
                                <label for="lokasi">Lokasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $data['lokasi'] ?>" required>
                                    </div>
                                </div>



                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="simpan" class="btn btn-link waves-effect">SIMPAN</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
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