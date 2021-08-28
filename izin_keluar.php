<?php

$view = $_GET['aksi'];
$judul = " Izin Keluar Asrama";
echo "<title>" . $view . $judul . "</title>";
include "_header.php";
include "koneksi.php";
?>


<?php if ($view == 'Daftar') { ?>

    <!-- # tampilan -->
    <div class="container my-5" id="container-wrapper">

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?= $view . $judul ?></h6>
                <a href="izin_keluar.php?aksi=Pengajuan" class="btn btn-sm btn-success">Ajukan Izin Keluar</a>
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
                                    <?php if ($data['status_izin'] == "Diizinkan") { ?>
                                        <a href="izin_keluar.php?aksi=Cetak&id=<?= $data['id_ijin'] ?>" class="btn btn-sm btn-primary">Cetak</a>
                                    <?php } ?>
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

<?php } else if ($view == 'Pengajuan') {

    if (isset($_POST['ajukan'])) {
        $id_karyawan = $_POST['id_karyawan'];
        $tujuan = $_POST['tujuan'];
        $catatan = $_POST['catatan'];
        $waktu_masuk = $_POST['waktu_masuk'];
        $waktu_keluar = $_POST['waktu_keluar'];
        $status_ijin = 'Menunggu Persetujuan';

        $query_simpan = $koneksi->query("INSERT INTO tbl_izin (id_karyawan, tujuan, catatan, waktu_masuk, waktu_keluar, status_izin) VALUES ('$id_karyawan','$tujuan','$catatan','$waktu_masuk','$waktu_keluar','$status_ijin')");

        if ($query_simpan) {
            echo "<script>alert('Data pengajuan izin keluar asrama berhasil diajukan !')</script>";
            echo "<script>location='izin_keluar.php?aksi=Daftar'</script>";
        } else {
            echo "<script>alert('Data pengajuan izin keluar asrama gagal diajukan !')</script>";
            // echo "<script>location='izin_keluar.php?aksi=Pengajuan'</script>";
        }
    }
?>

    <div class="container my-5" id="container-wrapper">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form <?= $view . $judul ?></h6>
            </div>
            <div class="card-body">
                <form method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="id_karyawan">Karyawan </label>
                            <select class="form-control" name="id_karyawan" id="id_karyawan" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql = $koneksi->query("SELECT * FROM tbl_karyawan");
                                while ($data = $sql->fetch_assoc()) {
                                ?>
                                    <option value="<?= $data['id_karyawan'] ?>"><?= $data['nama'] . " - " . $data['jabatan'] . " - " . $data['shift'] ?></option>
                                <?php
                                } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan </label>
                            <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukan Tujuan" required>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan </label>
                            <textarea type="text" name="catatan" id="catatan" class="form-control" placeholder="Masukan Catatan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="waktu_keluar">Waktu Keluar </label>
                            <input type="text" class="form-control" name="waktu_keluar" id="waktu_keluar" value="<?= date("Y-m-d H:i") ?>" placeholder="<?= date("Y-m-d H:i") ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_masuk">Waktu Masuk </label>
                            <input type="text" class="form-control" name="waktu_masuk" id="waktu_masuk" value="<?= date("Y-m-d H:i") ?>" placeholder="<?= date("Y-m-d H:i") ?>" required>
                        </div>
                    </fieldset>
                    <div class="form-actions text-center">
                        <button class="btn btn-primary mr-4" type="submit" name="ajukan">Ajukan</button>
                        <a href="izin_keluar.php?aksi=Daftar" class="btn btn-warning">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } else if ($view == 'Cetak') { ?>

    <div class="container my-5" id="container-wrapper">
        <div class="row justify-content-center">
            <div style="background-color: #f0ebeb; width: 900px; padding-bottom:50px; padding-top:50px">

                <form action="">

                    <?php
                    $id = $_GET['id'];
                    $sql = $koneksi->query("SELECT * FROM tbl_izin a LEFT JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan LEFT JOIN tbl_user c ON a.id_user=c.id_user WHERE id_ijin='$id'");
                    while ($data = $sql->fetch_assoc()) {   ?>

                        <center>
                            <table>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center>
                                            <font size="4">SURAT IJIN KELUAR MES <?= date("Y") ?></font><br>
                                            <font size="5"><b>Asrama putri <br> PT Elegant Textile Industry Purwakarta</b></font><br>
                                            <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi tetile dan Kain</font><br>
                                            <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Purwakarta Jawa Barat</i></font>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                                <table width="625">
                                    <tr>
                                        <td class="text2">Purwakarta, <?= date("d F Y") ?></td>
                                    </tr>
                                </table>
                            </table>
                            <table>
                                <tr class="text2">
                                    <td>Nomer</td>
                                    <td width="572">: -</td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td width="564">: -</td>
                                </tr>
                            </table>
                            <br>

                            <table width="625">
                                <tr>
                                    <td>
                                        <font size="2">Yang bertanda tangan di bawah ini memberikan ijin kepada<br></font>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            </table>
                            <table>
                                <tr class="text2">
                                    <td>Nama</td>
                                    <td width="541">: <b><?= $data['nama'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Nik</td>
                                    <td width="525">: <?= $data['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td width="525">: <?= $data['jabatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td width="525">: <?= $data['waktu_keluar'] ?></td>
                                </tr>
                            </table>
                            <br>
                            <table width="625">
                                <tr>
                                    <td>
                                        <font size="2">Untuk melakukan keperuluan yaitu <?= $data['tujuan'] ?> pada tanggal <?= $data['waktu_keluar'] ?> sampai dengan tanggal <?= $data['waktu_masuk'] ?><br><br> Demikian untunk di pergunakan sebagai mestinya
                                        </font>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table width="625">
                                <tr>
                                    <td width="430"><br><br><br><br></td>
                                    <td class="text" align="center">Atasan<br><br><br><?= $data['nama_user'] ?><br></td>
                                    <td width="430"><br><br><br><br></td>
                                    <td class="text" align="center">Nik<br><br><br><?= $data['nik'] ?><br></td>
                                </tr>
                            </table>
                        </center>
                    <?php } ?>
                </form>

                <script>
                    window.print()
                </script>
            </div>
        </div>
    </div>

<?php } ?>

<?php
include "_footer.php";
?>