<?php
session_start();
if (isset($_SESSION['admin'])) {
    echo "<script>location='.'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman login Asrama PT Elegant Textile Industry Purwakarta</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login bg-blue"><br><br><br>
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin Asrama</h1>
                                    </div>

                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>

                                    <?php
                                    // synatx untuk login
                                    include "../koneksi.php";
                                    if (isset($_POST['login'])) {
                                        $username = $_POST['username'];
                                        $pass = $_POST['pass'];

                                        $sql = $koneksi->query("SELECT * FROM tbl_user WHERE username='$username' AND pass='$pass'");
                                        $result = $sql->num_rows;

                                        if ($result == 1) {
                                            $admin = $sql->fetch_assoc();
                                            $_SESSION['admin'] = $admin;
                                            echo "<script>location='.'</script>";
                                        } else {
                                            echo "<script>alert('Login Gagal !, Silahkan Ulangi...')</script>";
                                            echo "<script>location='login.php'</script>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/ruang-admin.min.js"></script>
</body>