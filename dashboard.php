<?php include 'header.php'; ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="main-header">
        <h4><?php
            if ($_SESSION['akun']['role'] == 'Admin') {
              echo "Selamat Datang";
            } elseif ($_SESSION['akun']['role'] == 'Pegawai') {
              echo "Selamat Datang";
            }
            ?>
        </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Selamat Datang <b><?= $_SESSION['akun']['nama'] ?></b> di Website Pengajuan Be SMART KOTA MADIUN </h4>
        <br>
        <img src="assets/welcome.webp" width="100%" style="border-radius: 10px;">
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>