<?php

$view = $_GET['aksi'];
$judul = " Data User";
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
                <a href="user.php?aksi=Tambah" class="btn btn-sm btn-success">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th> No </th>
                            <th> Username </th>
                            <th> Password </th>
                            <th> Nama User </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_user order by id_user desc");
                        while ($data = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td> <?= $no ?> </td>
                                <td> <?= $data['username'] ?> </td>
                                <td> <?= $data['pass'] ?> </td>
                                <td> <?= $data['nama_user'] ?> </td>
                                <td>
                                    <a href="user.php?aksi=Hapus&id=<?= $data['id_user'] ?>" onclick="return confirm('Yakin akan mengahapus data ini ?')" class="btn btn-sm btn-danger">Hapus</a>
                                    <a href="user.php?aksi=Edit&id=<?= $data['id_user'] ?>" class="btn btn-sm btn-primary">Edit</a>
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


<?php } else if ($view == 'Tambah') {

    // Syntax untuk menyimpan data ke tbl_user jika tombol simpan ditekan
    if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $nama_user = $_POST['nama_user'];
        $pass = $_POST['pass'];

        $query_simpan = $koneksi->query("INSERT INTO tbl_user (username, pass, nama_user) VALUES ('$username','$pass','$nama_user')");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil disimpan !')</script>";
            echo "<script>location='user.php?aksi=List'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !')</script>";
            echo "<script>location='user.php?aksi=Tambah'</script>";
        }
    } ?>

    <!-- # tampilan Tambah data user -->
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
                <h6 class="m-0 font-weight-bold text-primary">Form <?= $view . $judul ?></h6>
            </div>
            <div class="card-body">
                <form method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">Username </label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Input username" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_user">Nama Lengkap </label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Input nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password </label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Input password" required>
                        </div>
                    </fieldset>
                    <div class="form-actions text-center">
                        <button class="btn btn-primary mr-4" type="submit" name="simpan">Simpan</button>
                        <a href="user.php?aksi=List" class="btn btn-warning" name="simpan">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- # tampilan Tambah data user -->

<?php } else if ($view == 'Edit') {
    // menangkap id yang akan di edit dari url 
    $id = $_GET['id'];
    // ambil data berdasarkan id yang dikirim url lalu tampilkan di form edit
    $sql = $koneksi->query("SELECT * FROM tbl_user WHERE id_user = '$id'");
    $data = $sql->fetch_assoc();

    // Syntax untuk update/edit data ke tbl_user jika tombol simpan di tekan
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $nama_user = $_POST['nama_user'];
        $pass = $_POST['pass'];

        $query_simpan = $koneksi->query("UPDATE tbl_user SET username='$username', pass='$pass', nama_user='$nama_user' WHERE id_user = '$id'");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil diedit !')</script>";
            echo "<script>location='user.php?aksi=List'</script>";
        } else {
            echo "<script>alert('Data gagal diedit !')</script>";
            echo "<script>location='user.php?aksi=Edit&id=$id'</script>";
        }
    }  ?>

    <!-- # tampilan Edit data user -->
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
                <h6 class="m-0 font-weight-bold text-primary">Form <?= $view . $judul ?></h6>
            </div>
            <div class="card-body">
                <form method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">Username </label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $data['username'] ?>" placeholder="Input username" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_user">Nama Lengkap </label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user" value="<?= $data['nama_user'] ?>" placeholder="Input nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password </label>
                            <input type="password" class="form-control" name="pass" id="pass" value="<?= $data['pass'] ?>" placeholder="Input password" required>
                        </div>
                    </fieldset>
                    <div class="form-actions text-center">
                        <button class="btn btn-primary mr-4" type="submit" name="simpan">Simpan</button>
                        <a href="user.php?aksi=List" class="btn btn-warning" name="simpan">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- # tampilan Edit data user -->

<?php } else if ($view == 'Hapus') { ?>
    <!-- # syntax Hapus data user -->
    <?php
    $id = $_GET['id'];
    $query_hapus = $koneksi->query("delete from tbl_user where id_user = '$id' ");
    if ($query_hapus) {
        echo "<script>alert('Data berhasil dihapus dari database !')</script>";
    } else {
        echo "<script>alert('Data gagal dihapus dari database !')</script>";
    }
    echo "<script>location='user.php?aksi=List'</script>";
    ?>
    <!-- # Syntax Hapus data user -->
<?php } ?>



<?php
include "_footer.php";
?>