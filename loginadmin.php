<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Pendaftaran Beasiswa Kota Madiun</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="codedthemes">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes">
    <link rel="shortcut icon" type="image/x-icon" href="assets/logomadiun.jpg">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    <link href="assets/assets_admin/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/plugins/Waves/waves.min.css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/css/color/color-1.min.css" id="color" />
</head>

<body>
    <section class="login p-fixed d-flex text-center common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block">
                        <form method="post" class="md-float-material">
                            <h3 class="text-center txt-primary">
                                Login Admin
                            </h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control" placeholder="Masukkan Email Anda" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="md-input-wrapper">
                                        <input type="password" name="password" class="md-form-control" placeholder="Masukkan Password Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-10 offset-xs-1">
                                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST["simpan"])) {
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $ambil = $koneksi->query("SELECT * FROM akun
		WHERE email='$email' AND password='$password'");
                            $akunyangcocok = $ambil->num_rows;
                            if ($akunyangcocok >= 1) {
                                $akun = $ambil->fetch_assoc();
                                if ($akun['role'] == "Mahasiswa") {
                                    $_SESSION["akun"] = $akun;
                                    echo "<script> alert('Anda sukses login sebagai mahasiswa');</script>";
                                    echo "<script> location ='index.php';</script>";
                                } else {
                                    $_SESSION['akun'] = $akun;
                                    echo "<script> alert('Anda sukses login sebagai Admin');</script>";
                                    echo "<script> location ='dashboard.php';</script>";
                                }
                            } else {
                                echo "<script> alert('Email atau Password anda salah');</script>";
                                echo "<script> location ='login.php';</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/assets_admin/assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/assets_admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/assets_admin/assets/plugins/tether/dist/js/tether.min.js"></script>
    <script src="assets/assets_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/assets_admin/assets/plugins/Waves/waves.min.js"></script>
    <script type="text/javascript" src="assets/assets_admin/assets/pages/elements.js"></script>
</body>

</html>