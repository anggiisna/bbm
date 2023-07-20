<?php
session_start();
include 'functions.php';
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
    <section class="login text-center common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block">
                        <form method="post" class="md-float-material">
                            <h3 class="text-center txt-primary">
                                Aplikasi Pendaftaran Beasiswa Kota Madiun
                            </h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Anda" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select class="form-control" name="jeniskelamin" required>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email Anda" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. HP</label>
                                <input type="number" class="form-control" placeholder="Masukkan No. HP Anda" name="nohp" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Anda" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan Password Anda" name="password" required>
                            </div>
                            <button type="submit" name="simpan" value="simpan" class="btn btn-success waves-effect waves-light float-right pull-right">Simpan</button>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $nama = $_POST["nama"];
                            $jeniskelamin = $_POST["jeniskelamin"];
                            $email = $_POST["email"];
                            $nohp = $_POST["nohp"];
                            $alamat = $_POST["alamat"];
                            $password = $_POST["password"];
                            $ambil = $koneksi->query("SELECT*FROM user 
							WHERE email='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok == 1) {
                                echo "<script>alert('Pendaftaran Gagal, email sudah ada')</script>";
                                echo "<script>location='daftar.php';</script>";
                            } else {
                                $koneksi->query("INSERT INTO user(nama, jeniskelamin, email, nohp, alamat, password)
		                                VALUES ('$nama','$jeniskelamin','$email','$nohp', '$alamat', '$password')") or die(mysqli_error($koneksi));
                                $iduser = $koneksi->insert_id;
                                $kode = 'A_' . $iduser;
                                $db->query("INSERT INTO tb_alternatif (kode_alternatif,iduser, nama_alternatif, keterangan) VALUES ('$kode','$iduser', '$nama', '$keterangan')");
                                $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_sub) 
    SELECT '$kode', kode_kriteria, 0 FROM tb_kriteria");
                                echo "<script> alert('Daftar Berhasil');</script>";
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