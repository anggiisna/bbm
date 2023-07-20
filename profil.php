<?php include 'header.php';
error_reporting(0);
ini_set('display_errors', 0);
$idakun = $_SESSION['akun']['idakun'];
$ambildata = $koneksi->query("SELECT * FROM akun WHERE idakun='$idakun'");
$data = $ambildata->fetch_assoc();
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div>
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Edit Profil</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" placeholder="Masukkan Nama Anda" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" required>
                                        <option <?php if ($data['jeniskelamin'] == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                        <option <?php if ($data['jeniskelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" value="<?php echo $data['email'] ?>" class="form-control" placeholder="Masukkan Email Anda" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No. HP</label>
                                    <input type="number" value="<?php echo $data['nohp'] ?>" class="form-control" placeholder="Masukkan No. HP Anda" name="nohp" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Anda" name="alamat" required><?php echo $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" value="<?php echo $data['password'] ?>" class="form-control" placeholder="Masukkan Password Anda" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Profil</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                    <button type="submit" name="simpan" value="simpan" class="btn btn-success waves-effect waves-light float-right pull-right">Simpan</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['simpan'])) {
                                $nama = $_POST["nama"];
                                $jeniskelamin = $_POST["jeniskelamin"];
                                $email = $_POST["email"];
                                $nohp = $_POST["nohp"];
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

                                $koneksi->query("UPDATE akun SET nama='$nama',jeniskelamin='$jeniskelamin',email='$email',nohp='$nohp', alamat='$alamat',  password='$password', foto='$bukti' WHERE idakun='$idakun'") or die(mysqli_error($koneksi));

                                echo "<script> alert('Profil Berhasil Di Ubah');</script>";
                                echo "<script> location ='profil.php';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>