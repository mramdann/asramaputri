<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $nama_user = $_POST['nama_user'];

    $query = $koneksi->query("UPDATE tbl_user SET username='$username',pass='$pass',nama_user='$nama_user' where id_user='$id'");
    print_r($query);
    if ($query) {
        echo "<script>alert('Data user berhasil diubah !')</script>";
    } else {
        echo "<script>alert('Data user gagal diubah !')</script>";
    }
    echo "<script>location='master_user.php'</script>";
    // echo "<script>alert('Login Berhasil ! ...')</script>";
    // echo "<script>location='master_user.php'</script>";
}
?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT USER USER</h2>
        </div>

        <div class="row clearfix">
            <!-- Table User -->
            <div class="card">
                <div class="header">



                </div>
                <div class="body">

                    <?php
                    $id = $_GET['id'];
                    $query = $koneksi->query("select * from tbl_user WHERE id_user= '$id'");
                    while ($data = $query->fetch_assoc()) {
                    ?>

                        <form method="POST">
                            <div class="modal-body">
                                <label for="nama_user">Nama User</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $data['nama_user'] ?>" required>
                                    </div>
                                </div>
                                <label for="username">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" required>
                                    </div>
                                </div>
                                <label for="pass">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="pass" id="pass" class="form-control" value="<?= $data['pass'] ?>">
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