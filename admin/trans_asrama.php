<?php

$view = $_GET['aksi'];
$judul = " Penghuni Asrama";
echo "<title>" . $view . $judul . "</title>";
include "_header.php";
include "../koneksi.php";
?>


<?php if ($view == 'List') { ?>

    <!-- tampilan data user -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $view . $judul ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item"><?= $judul ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $view . $judul ?></li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?= $view . $judul ?></h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Kapasitas</th>
                            <th>Jumlah Penghuni</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_asrama");
                        while ($data = $query->fetch_assoc()) {

                            $id_asrama = $data['id_asrama'];
                            $sql = $koneksi->query("select * from tbl_trans where id_asrama='$id_asrama'");
                            $jumlah_penghuni = $sql->num_rows;

                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['no_kamar'] ?> </td>
                                <td> <?= $data['kapasitas'] ?> Orang </td>
                                <td> <?= $jumlah_penghuni ?> Orang </td>
                                <td>
                                    <?php if ($data['kapasitas'] == $jumlah_penghuni) {
                                        echo '<span class="badge badge-danger">Penuh</span>';
                                    } else {
                                        echo '<span class="badge badge-success">Tersedia</span>';
                                    } ?>
                                </td>
                                <td>
                                    <a href="trans_asrama.php?aksi=Lihat&id=<?= $data['id_asrama'] ?>" class="btn btn-sm btn-primary">Lihat</a>
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
    <!-- # tampilan data user -->

<?php } else if ($view == 'Lihat') {
    // menangkap id dari url 
    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tbl_asrama WHERE id_asrama = '$id'");
    $data = $sql->fetch_assoc();
    $sql2 = $koneksi->query("select * from tbl_trans where id_asrama='$id'");
    $jumlah_penghuni = $sql2->num_rows;

    if (isset($_POST['simpan'])) {
        $id_asrama = $_POST['id_asrama'];
        $id_karyawan = $_POST['id_karyawan'];
        $tgl_masuk = $_POST['tgl_masuk'];

        $query_simpan = $koneksi->query("INSERT INTO tbl_trans (id_asrama, id_karyawan, tgl_masuk) VALUES ('$id_asrama','$id_karyawan','$tgl_masuk')");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil disimpan !')</script>";
            echo "<script>location='trans_asrama.php?aksi=Lihat&id=$id'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !')</script>";
            echo "<script>location='trans_asrama.php?aksi=Lihat&id=$id'</script>";
        }
    } ?>

    <!-- # tampilan -->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $view . $judul ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item"><?= $judul ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $view . $judul ?></li>
            </ol>
        </div>

        <!-- Tambah data penghuni -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penghuni Asrama <?= $data['no_kamar'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_asrama">No Kamar Asrama </label>
                            <input type="hidden" name="id_asrama" id="id_asrama" value="<?= $data['id_asrama'] ?>">
                            <input type="text" value="<?= $data['no_kamar'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_karyawan">Karyawan </label>
                            <select class="form-control" id="id_karyawan" name="id_karyawan" required>
                                <option selected> - Pilih Karyawan - </option>
                                <?php $sql = $koneksi->query("select * from tbl_karyawan where id_karyawan not in (select id_karyawan from tbl_trans)");
                                while ($kar = $sql->fetch_assoc()) { ?>
                                    <option value="<?= $kar['id_karyawan'] ?>"><?= $kar['nama'] ?> | <?= $kar['jabatan'] ?> | <?= $kar['shift'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tgl Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body bg-danger">
                        <div class="alert alert-danger text-center" role="alert">
                            <h6><i class="fas fa-exclamation-triangle"></i><b> Informasi !</b></h6>
                            Oppss.. Kamar ini sudah penuh, silahkan cari kamar lain.
                        </div>
                        <center><button type="button" class="btn btn-light" data-dismiss="modal">Close</button></center>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Penghuni Asrama <?= $data['no_kamar'] ?></h6>
                <?php if ($data['kapasitas'] == $jumlah_penghuni) {
                    echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" id="#myBtn"> Tambah Data Penghuni </button>';
                } else {
                    echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="#myBtn"> Tambah Data Penghuni </button>';
                } ?>

            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Shift</th>
                            <th>No Telpon</th>
                            <th>Tgl Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_trans a join tbl_karyawan b on a.id_karyawan=b.id_karyawan where a.id_asrama = '$id'");
                        while ($data = $query->fetch_assoc()) {

                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['nama'] ?> </td>
                                <td> <?= $data['shift'] ?> </td>
                                <td> <?= $data['tlp'] ?> </td>
                                <td> <?= $data['tgl_masuk'] ?> </td>
                                <td>
                                    <a href="trans_asrama.php?aksi=Hapus&id=<?= $data['id_trans'] ?>" onclick="return confirm('Yakin akan mengahapus data ini dari asrama ?')" class="btn btn-sm btn-danger">Hapus</a>
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
    <!-- # tampilan Edit data user -->

<?php } else if ($view == 'Hapus') { ?>
    <!-- # syntax Hapus data user -->
    <?php
    $id = $_GET['id'];
    $query_hapus = $koneksi->query("delete from tbl_trans where id_trans = '$id' ");
    if ($query_hapus) {
        echo "<script>alert('Data berhasil dihapus dari database !')</script>";
    } else {
        echo "<script>alert('Data gagal dihapus dari database !')</script>";
    }
    echo "<script>location='trans_asrama.php?aksi=List'</script>";
    ?>
    <!-- # Syntax Hapus data user -->
<?php } ?>



<?php
include "_footer.php";
?>