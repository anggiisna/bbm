<?php include 'koneksi.php';
include 'functions.php';
session_start();
if (empty($_SESSION['akun'])) {
   echo "<script> alert('Maaf, anda belum login, silahkan login terlebih dahulu');</script>";
   echo "<script> location ='login.php';</script>";
}
function rupiah($angka)
{
   if ($angka != "") {
      $angkafix = $angka;
   } else {
      $angkafix = 0;
   }
   $hasilrupiah = "Rp " . number_format($angkafix, 2, ',', '.');
   return $hasilrupiah;
}
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
//
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Aplikasi Pendaftaran Beasiswa Kota Madiun</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <link rel="shortcut icon" type="image/x-icon" href="assets/logomadiun.jpg">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/icon/themify-icons/themify-icons.css">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/icon/icofont/css/icofont.css">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/icon/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/plugins/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/assets_admin/assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">
   <link href="assets/assets_admin/assets/css/svg-weather.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/css/main.css">
   <link rel="stylesheet" type="text/css" href="assets/assets_admin/assets/css/responsive.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <style>
      .m-1 {
         margin: 5px;
      }
   </style>
</head>
<?php
if ($_SESSION['akun']['role'] == 'Admin') {
   $bg = "bg-info";
} elseif ($_SESSION['akun']['role'] == 'Kepala Bagian') {
   $bg = "bg-primary";
} elseif ($_SESSION['akun']['role'] == 'Keuangan') {
   $bg = "bg-success";
} elseif ($_SESSION['akun']['role'] == 'Direksi') {
   $bg = "bg-danger";
} else {
   $bg = "bg-warning";
}
?>

<body class="sidebar-mini fixed">
   <div class="wrapper ">
      <header class="main-header-top hidden-print <?= $bg ?>">
         <a href="dashboard.php" class="logo"> <?php if ($_SESSION['akun']['role'] == 'Admin') { ?>
               <div>Halaman Admin / HRD</div>
            <?php } elseif ($_SESSION['akun']['role'] == 'Kepala Bagian') { ?>
               <div>Halaman Kepala Bagian</div>
            <?php } elseif ($_SESSION['akun']['role'] == 'Keuangan') { ?>
               <div>Halaman Keuangan</div>
            <?php } elseif ($_SESSION['akun']['role'] == 'Direksi') { ?>
               <div>Halaman Direksi</div>
            <?php } else { ?>
               <div>Halaman</div>
            <?php } ?>
         </a>
         <nav class="navbar navbar-static-top <?= $bg ?>">
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <div class="navbar-custom-menu f-right ">
               <ul class="top-nav">
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <?php
            $idakun = $_SESSION['akun']['idakun'];
            $ambildataakun = $koneksi->query("SELECT * FROM akun WHERE idakun='$idakun'");
            $akun = $ambildataakun->fetch_assoc();
            ?>
            <?php if ($akun['foto'] != '') { ?>
               <li class="nav-level">--- <?php echo $akun['nama']; ?></li>
            <?php } else { ?>
               <li class="nav-level">--- <?php echo $akun['nama']; ?></li>
            <?php } ?>
            <ul class="sidebar-menu">
               <li class=" treeview">
                  <a class="waves-effect waves-dark" href="dashboard.php">
                     <i class="icon-speedometer"></i><span> Dashboard</span>
                  </a>
               </li>
               <li class=" treeview">
                  <a class="waves-effect waves-dark" href="profil.php">
                     <i class="icon-user"></i><span> Profil</span>
                  </a>
               </li>
               <li class=" treeview">
                  <a class="waves-effect waves-dark" href="userdaftar.php">
                     <i class="icon-user"></i><span> User</span>
                  </a>
               </li>
               <li class=" treeview">
                  <a class="waves-effect waves-dark" href="pengajuandaftar.php">
                     <i class="icon-notebook"></i><span>Data Pengajuan</span>
                  </a>
               </li>
               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>AHP</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                     <li><a class="waves-effect waves-dark" href="rel_kriteria.php"><i class="icon-arrow-right"></i>Nilai Bobot Kriteria</a></li>
                     <li><a class="waves-effect waves-dark" href="rel_sub.php"><i class="icon-arrow-right"></i>Nilai Bobot Subkriteria</a></li>
                     <li><a class="waves-effect waves-dark" href="rel_alternatif.php"><i class="icon-arrow-right"></i>Nilai Bobot Alternatif</a></li>
                  </ul>
               </li>
               <li class=" treeview">
                  <a class="waves-effect waves-dark" href="hasil.php">
                     <i class="icon-notebook"></i><span>Hasil</span>
                  </a>
               </li>
               <li class="treeview">
                  <a class="waves-effect waves-dark" href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar dari Halaman ini ?')">
                     <i class="icon-logout"></i><span> Keluar</span>
                  </a>
               </li>
            </ul>
         </section>
      </aside>