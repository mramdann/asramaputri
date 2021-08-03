<?php

include  "header.php";
include "koneksi.php";



if (isset($_POST['ajukan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tujuan = $_POST['tujuan'];
    $catatan = $_POST['catatan'];
    $waktu_masuk = $_POST['waktu_masuk'];
    $waktu_keluar = $_POST['waktu_keluar'];
    $status_ijin = 'Menunggu Persetujuan..!';

    $query = $koneksi->query("INSERT INTO tbl_ijin (id_karyawan, tujuan, catatan, waktu_masuk, waktu_keluar, status_ijin) VALUES ('$id_karyawan','$tujuan','$catatan','$waktu_masuk','$waktu_keluar','$status_ijin')");

    echo "<script>alert('data berhasil di tambahkan ! ...')</script>";
    echo "<script>location='trans_ijin_keluar_mes.php'</script>";
}


?>

<!--================ End Banner Area =================-->

<!--================ Start Features Area =================-->
<section class="features_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>IJIN KELUAR MESS</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">


                <div class="col-lg-9">
                    <form method="POST" action="trans_ijin_keluar_mes.php">
                        <div class="row mb-3">

                            <label for="id_karyawan" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <select class="form-select form-select-lg mb-3" name="id_karyawan" id="id_karyawan" aria-label=".form-select-lg example">
                                    <option form-control selected>Nama Karyawan</option>

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

                        <div class="row mb-3">
                            <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-10">
                                <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukan Tujuan" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waktu_keluar" class="col-sm-2 col-form-label">Waktu Keluar</label>
                            <div class="col-sm-10">
                                <input type="date" name="waktu_keluar" id="waktu_keluar" class="form-control" placeholder="Masukan waktu keluar" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Waktu_Masuk" class="col-sm-2 col-form-label">Waktu Masuk</label>
                            <div class="col-sm-10">
                                <input type="date" name="waktu_masuk" id="waktu_masuk" class="form-control" placeholder="Masukan Waktu Masuk" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="catatan" id="catatan" placeholder="Masukan Catatan" rows="3"></textarea>
                            </div>
                        </div>

                        <button type="submit" name="ajukan" class="btn btn-primary">Ajukan</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
<!--================ End Features Table =================-->

<!--================ Start Testimonial Table =================-->

<section class="features_area section_gap_top">

    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="main_title">
                <h2>STATUS IJIN KELUAR MESS</h2>

            </div>
        </div>
    </div>

    <div class="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tgl Ijin</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = $koneksi->query("SELECT * FROM tbl_ijin a JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan");
                while ($data = $sql->fetch_assoc()) {
                    # code...
                ?>
                    <tr>

                        <td><?= $no ?></td>
                        <td><a href="status.php?id=<?= $data['id_ijin'] ?>"><?= $data['nama'] ?><a href="status.php?id=<?= $data['id_ijin'] ?>"></td>
                        <td><?= $data['jenis_kelamin'] ?></a></td>
                        <td><?= $data['waktu_keluar'] ?></td>

                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
</section>



<!--================ End Testimonial Table =================-->

<!--================ Start Newsletter Table =================-->


<?php include  "footer.php"; ?>