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
                    <a class="primary_btn" href="trans_ijin_keluar_mes.php"><span>Kembali</span></a>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include  "footer.php"; ?>