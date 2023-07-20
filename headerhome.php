<?php include 'koneksi.php';
include 'functions.php';
session_start();

function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = bulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi Pendaftaran Beasiswa Kota Madiun</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/logomadiun.jpg">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/assets_home/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets_home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/assets_home/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/assets_home/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/assets_home/css/themify-icons.css">
    <link rel="stylesheet" href="assets/assets_home/css/nice-select.css">
    <link rel="stylesheet" href="assets/assets_home/css/flaticon.css">
    <link rel="stylesheet" href="assets/assets_home/css/gijgo.css">
    <link rel="stylesheet" href="assets/assets_home/css/animate.css">
    <link rel="stylesheet" href="assets/assets_home/css/slicknav.css">
    <link rel="stylesheet" href="assets/assets_home/css/style.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <header>
        <div class="header-area ">

            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <h4 style="color: black;"><img src="assets/logomadiun.jpg" width="50px">&nbsp;&nbsp;&nbsp;<img src="assets/logo.png" width="50px"></h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">home</a></li>
                                        <?php
                                        if (isset($_SESSION["user"])) { ?>
                                            <?php
                                            $iduser = $_SESSION['user']['iduser'];
                                            $ambilcek = $koneksi->query("SELECT * FROM tb_alternatif WHERE iduser='$iduser'") or die(mysqli_error($koneksi));
                                            $cek = $ambilcek->fetch_assoc();
                                            if ($cek['total'] == "") { ?>
                                                <li><a href="tambahpengajuan.php">Pendaftaran Beasiswa</a></li>
                                            <?php } ?>
                                            <li><a href="pengumuman.php">Pengumuman</a></li>
                                            <li><a href="profiluser.php">Profil</a></li>
                                            <li><a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar dari Halaman ini ?')">Keluar</a></li>
                                        <?php } else { ?>
                                            <li><a href="daftar.php">Daftar</a></li>
                                            <li><a href="login.php">Login</a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->