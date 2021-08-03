<!doctype html>
<html lang="en">


<!-- Mirrored from technext.github.io/satner/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Aug 2021 05:58:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/frontend/img/favicon.png" type="image/png">
    <title>Satner Portfolio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" href="assets/frontend/vendors/linericon/style.css">
    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/frontend/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/frontend/vendors/nice-select/css/nice-select.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/frontend/css/style.css">
</head>

<body>
    <?php
    include "koneksi.php";
    ?>

    <!--================ Start Header Area =================-->
    <header class="header_area">

        <style type="text/css">
            s table tr .text2 {
                text-align: right;
                font-size: 13px;
            }

            table tr .text {
                text-align: center;
                font-size: 13px;
            }

            table tr td {
                font-size: 13px;
            }
        </style>



        <section class="features_area section_gap_top">
            <div class="container">

                <div class="container">

                    <div class="row justify-content-center">
                        <div style="background-color: #f0ebeb; width: 900px; padding-bottom:50px; padding-top:50px">

                            <form action="">

                                <?php
                                $id = $_GET['id'];
                                $sql = $koneksi->query("SELECT * FROM tbl_ijin a JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan WHERE id_ijin='$id'");
                                while ($data = $sql->fetch_assoc()) {
                                    # code...
                                ?>

                                    <center>
                                        <table>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <font size="4">SURAT IJIN KELUAR MES 2019</font><br>
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
                                                    <td class="text2">Purwakarta, 16 mei 2021</td>
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
                                                    <font size="2">Untuk melakukan keperuluan pribadi yaitu <?= $data['tujuan'] ?> pada tanggal <?= $data['waktu_keluar'] ?> sampai dengan tanggal <?= $data['waktu_masuk'] ?><br><br> Demikian untunk di pergunakan sebagai mestinya
                                                    </font>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table width="625">
                                            <tr>
                                                <td width="430"><br><br><br><br></td>
                                                <td class="text" align="center">Atasan<br><br>....<br></td>
                                                <td width="430"><br><br><br><br></td>
                                                <td class="text" align="center">Nik<br><br>.....<br></td>
                                            </tr>
                                        </table>
                                    </center>
                                <?php
                                } ?>
                            </form>

                            <script>
                                window.print()
                            </script>
                        </div>
                    </div>
                </div>
        </section>


        <script src="assets/frontend/js/jquery-3.2.1.min.js"></script>
        <script src="assets/frontend/js/popper.js"></script>
        <script src="assets/frontend/js/bootstrap.min.js"></script>
        <script src="assets/frontend/js/stellar.js"></script>
        <script src="assets/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/frontend/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="assets/frontend/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="assets/frontend/vendors/isotope/isotope-min.js"></script>
        <script src="assets/frontend/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/frontend/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/frontend/js/mail-script.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="assets/frontend/js/gmaps.min.js"></script>
        <script src="assets/frontend/js/theme.js"></script>
</body>


<!-- Mirrored from technext.github.io/satner/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Aug 2021 05:58:47 GMT -->

</html>