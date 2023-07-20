<?php include 'headerhome.php';
$iduser = $_SESSION['user']['iduser'];
$ambildata = $koneksi->query("SELECT * FROM user join tb_alternatif on user.iduser = tb_alternatif.iduser WHERE user.iduser='$iduser'") or die(mysqli_error($koneksi));
$row = $ambildata->fetch_assoc();
?>
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Status Pendaftaran</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table" id="tabel">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <?php foreach ($KRITERIA as $key => $val) : ?>
                                                <th><?= $val ?></th>
                                            <?php endforeach ?>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data = get_rel_alternatifbyid($iduser);
                                    $no = 0;
                                    foreach ($data as $key => $val) :
                                        $ambildata = $koneksi->query("SELECT * FROM tb_alternatif WHERE kode_alternatif='$key'") or die(mysqli_error($koneksi));
                                        $row = $ambildata->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td><?= $row['nama_alternatif'] ?></td>
                                            <?php foreach ($val as $k => $v) : ?>
                                                <td><?= $SUB[$v]['nama'] ?></td>
                                            <?php endforeach ?>
                                            <td>
                                                <?= $row['statuspendaftaran'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['statuspendaftaran'] == 'Anda Memenuhi Kelayakan, Silahkan Daftar Ulang' or $row['statuspendaftaran'] == 'Daftar Ulang Berhasil, Menunggu Konfirmasi Admin') { ?>
                                                    <a class="btn btn-xs btn-primary" href="daftarulang.php?id=<?= $row['iduser'] ?>"><span class="glyphicon glyphicon-edit"></span> Form Daftar Ulang</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include 'footerhome.php'; ?>