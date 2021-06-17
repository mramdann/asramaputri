<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

// syntax untuk menyimpan data ke database
if(isset($_POST['simpan'])){
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$nama_user = $_POST['nama_user'];

	$query = $koneksi->query("INSERT INTO tbl_user (username, pass, nama_user) VALUES ('$username','$pass','$nama_user')");
	print_r($query);
	// echo "<script>alert('Login Berhasil ! ...')</script>";
 //    echo "<script>location='admin/'</script>";

}
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DATA USER</h2>
            </div>

            <div class="row clearfix">
                <!-- Table User -->
                <div class="card">
                    <div class="header">
                        <h2>Table Data User</h2>
                        <ul class="header-dropdown">
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_tambah_data">
                                    <i class="material-icons">add_box</i>
                                </a>
                            </li>
                        </ul>

                        <!-- Modal ambah data -->
			            <div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog">
			                <div class="modal-dialog" role="document">
			                    <div class="modal-content">
			                        <div class="modal-header">
			                            <h4 class="modal-title" id="defaultModalLabel">Tambah data user</h4>
			                        </div>
			                        <form method="POST">
				                        <div class="modal-body">
			                            	<label for="username">Username</label>
			                            	<div class="form-group">
			                                    <div class="form-line">
			                                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" required>
			                                    </div>
			                                </div>
			                                <label for="pass">Password</label>
			                            	<div class="form-group">
			                                    <div class="form-line">
			                                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Masukan Password" required>
			                                    </div>
			                                </div>
			                                <label for="nama_user">Nama User</label>
			                            	<div class="form-group">
			                                    <div class="form-line">
			                                        <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukan nama user" required>
			                                    </div>
			                                </div>
				                        </div>
				                        <div class="modal-footer">
				                            <button type="submit" name="simpan" class="btn btn-link waves-effect">SIMPAN</button>
				                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
				                        </div>
			                        </form>
			                    </div>
			                </div>
			            </div>
			            <!-- Modal ambah data -->

                    </div>
                    <div class="body">
                    	<div class="table-responsive">
	                        <table class="table table-hover dashboard-task-infos">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Username</th>
	                                    <th>Nama User</th>
	                                    <th>Aksi</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php 
	                            	$no = 1;
	                            	$sql = $koneksi->query("select * from tbl_user");
	                            	while ($data = $sql->fetch_assoc()) {
	                            		# code...
	                            	 ?>
	                                <tr>
	                                    <td><?= $no ?></td>
	                                    <td><?= $data['username'] ?></td>
	                                    <td><?= $data['nama_user'] ?></td>
	                                    <td>
			                                <a href="master_user_hapus.php?id=<?= $data['id_user'] ?>">
			                                	<span></span>
			                                    <i class="material-icons">delete_forever</i>
			                                </a>
			                                <a href="master_user_edit.php?id=<?= $data['id_user'] ?>">
			                                    <i class="material-icons">edit</i>
			                                </a>
				                    	</td>
	                                </tr>
	                            	<?php $no++; } ?>
	                            </tbody>
	                        </table>
	                    </div>
                    </div>
                    
                </div>
                <!-- #END# Table User -->

            </div>
        </div>
    </section>

<?php 
include "_footer.php";
?>