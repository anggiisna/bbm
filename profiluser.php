<?php include 'headerhome.php';
error_reporting(0);
ini_set('display_errors', 0);
$iduser = $_SESSION['user']['iduser'];
$ambildata = $koneksi->query("SELECT * FROM user WHERE iduser='$iduser'");
$data = $ambildata->fetch_assoc();
?>
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Profil</h3>
                    <p><a href="index.php">Home /</a> Profil</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Ubah Profil</h2>
            </div>
            <div class="col-lg-12">
                <form class="form-contact contact_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" placeholder="Masukkan Nama Anda" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control valid" name="jeniskelamin" required>
                                            <option <?php if ($data['jeniskelamin'] == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                            <option <?php if ($data['jeniskelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if ($data['foto'] != "") { ?>
                                <img src="assets/foto/<?php echo $data['foto'] ?>" width="100%" style="border-radius: 10px;">
                            <?php } else { ?>
                                <img src="assets/foto/user.png" width="100%" style="border-radius: 10px;">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="<?php echo $data['email'] ?>" class="form-control" placeholder="Masukkan Email Anda" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. HP</label>
                                <input type="number" value="<?php echo $data['nohp'] ?>" class="form-control" placeholder="Masukkan No. HP Anda" name="nohp" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea class="form-control mb-4" rows="3" placeholder="Masukkan Alamat Anda" name="alamat" required><?php echo $data['alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" value="<?php echo $data['password'] ?>" class="form-control" placeholder="Masukkan Password Anda" name="password" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="simpan" value="simpan" class="button button-contactForm boxed-btn btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['simpan'])) {
                $nama = $_POST["nama"];
                $jeniskelamin = $_POST["jeniskelamin"];
                $email = $_POST["email"];
                $nohp = $_POST["nohp"];
                $jabatan = $_POST["jabatan"];
                $alamat = $_POST["alamat"];
                $password = $_POST["password"];

                // upload foto
                $lokasifoto = $_FILES['foto']['tmp_name'];
                if (!empty($lokasifoto)) {
                    $bukti = $_FILES['foto']['name'];
                    move_uploaded_file($lokasifoto, "assets/foto/" . $bukti);
                } else {
                    $bukti = $data['foto'];
                }

                $koneksi->query("UPDATE user SET nama='$nama',jeniskelamin='$jeniskelamin',email='$email',nohp='$nohp', alamat='$alamat',  password='$password', foto='$bukti' WHERE iduser='$iduser'") or die(mysqli_error($koneksi));

                echo "<script> alert('Profil Berhasil Di Ubah');</script>";
                echo "<script> location ='profiluser.php';</script>";
            }
            ?>
        </div>
    </div>
    </div>
</section>
<?php include 'footerhome.php'; ?>