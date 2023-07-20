<?php include 'header.php';
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div>
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Tambah User</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <form method="post">
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
                                $role = $_POST["role"];
                                $password = $_POST["password"];
                                $koneksi->query("INSERT INTO user(nama, jeniskelamin, email, nohp, alamat, password)
		                                VALUES ('$nama','$jeniskelamin','$email','$nohp', '$alamat', '$password')") or die(mysqli_error($koneksi));
                                $iduser = $koneksi->insert_id;
                                $kode = 'A_' . $iduser;
                                $db->query("INSERT INTO tb_alternatif (kode_alternatif,iduser, nama_alternatif, keterangan,statuspendaftaran) VALUES ('$kode','$iduser', '$nama', '$keterangan','Pengajuan Beasiswa Berhasil, silahkan menunggu pengumuman')");
                                $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_sub) 
    SELECT '$kode', kode_kriteria, 0 FROM tb_kriteria");
                                echo "<script> alert('Data Sudah Disimpan');</script>";
                                echo "<script> location ='userdaftar.php';</script>";
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