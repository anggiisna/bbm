<?php include 'header.php';
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Daftar User</h4>
                </div>
            </div>
        </div>
        <a type="button" class="btn btn-primary mb-4" href="usertambah.php">Tambah User</a>
        <br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table" id="tabel">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        $ambildata = $koneksi->query("SELECT*FROM user order by iduser asc") or die(mysqli_error($koneksi));
                                        while ($data = $ambildata->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['foto'] != "") { ?>
                                                        <img src="assets/foto/<?php echo $data['foto'] ?>" width="50px" style="border-radius: 10px;">
                                                    <?php } else { ?>
                                                        <img src="assets/foto/user.png" width="50px" style="border-radius: 10px;">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="useredit.php?id=<?php echo $data['iduser']; ?>" class="btn btn-warning m-1">Edit</a>
                                                    <a href="userhapus.php?id=<?php echo $data['iduser']; ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $nomor = $nomor + 1;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>