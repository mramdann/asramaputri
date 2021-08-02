<?php

$aksi = $_GET['aksi'];

include  "header.php";
include "../koneksi.php";



if (isset($_POST['simpan'])) {
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

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Form Ijin Keluar Mess</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="services.html">Form</a>
                </div>
            </div>
        </div>
    </div>
</section>
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


                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
<!--================ End Features Area =================-->

<!--================ Start Testimonial Area =================-->
<div class="testimonial_area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>client say about me</h2>
                    <p>Is give may shall likeness made yielding spirit a itself togeth created after sea is in beast <br>
                        beginning signs open god you're gathering ithe</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testi_slider owl-carousel">
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t1.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t2.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t1.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t2.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t1.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Elite Martin</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi_item">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="img/testimonials/t2.jpg" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="testi_text">
                                <h4>Davil Saden</h4>
                                <p>Him, made can't called over won't there on divide there male fish beast own his day third seed sixth seas unto. Saw from </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================ End Testimonial Area =================-->

<!--================ Start Newsletter Area =================-->


<?php include  "footer.php"; ?>