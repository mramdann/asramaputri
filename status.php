<?php

include  "header.php";
include "koneksi.php";

?>

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>STATUS IJIN</h2>
                <div class="page_link">

                    <?php
                    $id = $_GET['id'];
                    $sql = $koneksi->query("SELECT * FROM tbl_ijin WHERE id_ijin='$id'");
                    while ($data = $sql->fetch_assoc()) {
                        # code...
                    ?>
                        <a href="index.html">
                            <h4><?= $data['status_ijin'] ?></h4>
                        </a>
                    <?php
                    } ?>
                    <br><br>

                </div>
            </div>

        </div>
    </div>
</section>


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
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>SURAT IJIN KELUAR MESS</h2>

                    </div>
                </div>
            </div>



            <div class="row justify-content-center">


                <?php
                $id = $_GET['id'];
                $sql = $koneksi->query("SELECT * FROM tbl_ijin a JOIN tbl_karyawan b ON a.id_karyawan = b.id_karyawan WHERE id_ijin='$id'");
                while ($data = $sql->fetch_assoc()) {
                    # code...
                ?>

                    <div style="background-color: #f0ebeb; width: 900px; padding-bottom:50px; padding-top:50px">
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


                    </div>
                    <div class="col-lg-8 text-center mt-4">
                        <div class="main_title">
                            <div class="d-flex align-items-center">
                                <a class="primary_btn mr-2" href="trans_ijin_keluar_mes.php"><span>Kembali</span></a>
                                <a class="primary_btn tr-bg" href="print_surat.php?id=<?= $data['id_ijin'] ?>"><span>Cetak Surat</span></a>
                            </div>
                        </div>
                    </div>
            </div>

        <?php
                } ?>

        </div>
    </div>
</section>


<?php include  "footer.php"; ?>