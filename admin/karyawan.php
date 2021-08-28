<?php

$view = $_GET['aksi'];
$judul = " Data Karyawan";
echo "<title>" . $view . $judul . "</title>";
include "_header.php";
include "../koneksi.php";
?>


<?php if ($view == 'List') { ?>

    <!-- tampilan data -->
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
                <a href="karyawan.php?aksi=Tambah" class="btn btn-sm btn-success">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Shift</th>
                            <th>No Telpon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $query = $koneksi->query("select * from tbl_karyawan order by id_karyawan desc");
                        while ($data = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nik'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jenis_kelamin'] ?></td>
                                <td><?= $data['jabatan'] ?></td>
                                <td><?= $data['shift'] ?></td>
                                <td><?= $data['tlp'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td>
                                    <a href="karyawan.php?aksi=Hapus&id=<?= $data['id_karyawan'] ?>" onclick="return confirm('Yakin akan mengahapus data ini ?')" class="btn btn-sm btn-danger"> Hapus </a>
                                    <a href="karyawan.php?aksi=Edit&id=<?= $data['id_karyawan'] ?>" class="btn btn-sm btn-primary">Edit</a>
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
    <!-- # tampilan data -->


<?php } else if ($view == 'Tambah') {

    // Syntax untuk menyimpan data ke tbl_karyawan jika tombol simpan ditekan
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nik = $_POST['nik'];
        $jabatan = $_POST['jabatan'];
        $alamat = $_POST['alamat'];
        $shift = $_POST['shift'];
        $tlp = $_POST['tlp'];

        $query_simpan = $koneksi->query("INSERT INTO tbl_karyawan (nik, nama, jenis_kelamin, jabatan, shift, alamat, tlp) VALUES ('$nik','$nama','$jenis_kelamin','$jabatan','$shift','$alamat','$tlp')");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil disimpan !')</script>";
            echo "<script>location='karyawan.php?aksi=List'</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !')</script>";
            echo "<script>location='karyawan.php?aksi=Tambah'</script>";
        }
    } ?>

    <!-- # tampilan Tambah data -->
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
                            <label for="nik"> NIK </label>
                            <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan No Identitas Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Karyawan </label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option> - Pilih - </option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan" required>
                                <option> - Pilih - </option>
                                <option>Operator</option>
                                <option>QC</option>
                                <option>Maintenance</option>
                                <option>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select class="form-control" name="shift" id="shift" required>
                                <option> - Pilih - </option>
                                <option>Shift A</option>
                                <option>Shift B</option>
                                <option>Shift C</option>
                                <option>Shift GS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tlp">No Telpon</label>
                            <input type="number" name="tlp" id="tlp" class="form-control" placeholder="Masukan No Telpon" required>
                        </div>
                    </fieldset>
                    <div class="form-actions text-center">
                        <button class="btn btn-primary mr-4" type="submit" name="simpan">Simpan</button>
                        <a href="karyawan.php?aksi=List" class="btn btn-warning" name="simpan">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- # tampilan Tambah data -->

<?php } else if ($view == 'Edit') {
    // menangkap id yang akan di edit dari url 
    $id = $_GET['id'];
    // ambil data berdasarkan id yang dikirim url lalu tampilkan di form edit
    $sql = $koneksi->query("SELECT * FROM tbl_karyawan WHERE id_karyawan = '$id'");
    $data = $sql->fetch_assoc();

    // Syntax untuk update/edit data ke tbl_karyawan jika tombol simpan di tekan
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nik = $_POST['nik'];
        $jabatan = $_POST['jabatan'];
        $shift = $_POST['shift'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['tlp'];

        $query_simpan = $koneksi->query("UPDATE tbl_karyawan SET nama='$nama',jenis_kelamin='$jenis_kelamin',nik='$nik',jabatan='$jabatan',alamat='$alamat',tlp='$tlp',shift='$shift' where id_karyawan='$id'");

        if ($query_simpan) {
            echo "<script>alert('Data berhasil diedit !')</script>";
            echo "<script>location='karyawan.php?aksi=List'</script>";
        } else {
            echo "<script>alert('Data gagal diedit !')</script>";
            echo "<script>location='karyawan.php?aksi=Edit&id=$id'</script>";
        }
    }  ?>

    <!-- # tampilan Edit data -->
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
                            <label for="nik"> NIK </label>
                            <input type="number" name="nik" id="nik" class="form-control" value="<?= $data['nik'] ?>" placeholder="Masukan No Identitas Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Karyawan </label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" placeholder="Masukan nama Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option> - Pilih - </option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                                <option> - Pilih - </option>
                                <option>Operator</option>
                                <option>QC</option>
                                <option>Maintenance</option>
                                <option>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select class="form-control" id="shift" name="shift" required>
                                <option> - Pilih - </option>
                                <option>Shift A</option>
                                <option>Shift B</option>
                                <option>Shift C</option>
                                <option>Shift GS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tlp">No Telpon</label>
                            <input type="number" name="tlp" id="tlp" class="form-control" value="<?= $data['tlp'] ?>" placeholder="Masukan No Telpon" required>
                        </div>
                    </fieldset>
                    <div class="form-actions text-center">
                        <button class="btn btn-primary mr-4" type="submit" name="update">Simpan</button>
                        <a href="karyawan.php?aksi=List" class="btn btn-warning" name="simpan">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- # tampilan Edit data -->

<?php } else if ($view == 'Hapus') { ?>
    <!-- # syntax Hapus data -->
    <?php
    $id = $_GET['id'];
    $query_hapus = $koneksi->query("delete from tbl_karyawan where id_karyawan = '$id' ");
    if ($query_hapus) {
        echo "<script>alert('Data berhasil dihapus dari database !')</script>";
    } else {
        echo "<script>alert('Data gagal dihapus dari database !')</script>";
    }
    echo "<script>location='karyawan.php?aksi=List'</script>";
    ?>
    <!-- # Syntax Hapus data -->
<?php } ?>



<?php
include "_footer.php";
?>