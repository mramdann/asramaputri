<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman login Asrama Putri PT Elegant Textile Industry Purwakarta</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>FORM LOGIN</b></a>
            <small>Silahkan Masukan Username dan Password anda</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">ASRAMA PUTRI </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Username</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Pasword</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <center><button class="btn btn-lg bg-pink waves-effect" name="login" type="submit">SIGN IN</button></center>
                    </div>
                </form>
                <?php
                include "koneksi.php";
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $pass = $_POST['pass'];

                    $sql = $koneksi->query("SELECT * FROM tbl_user WHERE username='$username' AND pass='$pass'");
                    $result = $sql->num_rows;

                    if ($result == 1) {
                        $admin = $sql->fetch_assoc();
                        $_SESSION['admin'] = $admin;

                        echo "<script>alert('Login Berhasil ! ...')</script>";
                        echo "<script>location='admin/'</script>";
                    } else {
                        echo "<script>alert('Login Gagal ! ...')</script>";
                        echo "<script>location='login.php'</script>";
                    }
                }
                ?>


            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>

</html>