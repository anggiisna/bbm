<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Daftar Pengajuan BBM</h4>
                </div>
            </div>
        </div>
        <?php
        if ($_SESSION['user']['role'] == 'Admin') {
        ?>
            <a type="button" class="btn btn-primary mb-4" href="pengajuantambah.php">Tambah Pengajuan BBM</a>
            <br><br>
        <?php } ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table" id="tabel">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <?php foreach ($KRITERIA as $key => $val) : ?>
                                                <th><?= $val ?></th>
                                            <?php endforeach ?>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data = get_rel_alternatif();
                                    $no = 1;
                                    foreach ($data as $key => $val) :
                                        $ambildata = $koneksi->query("SELECT * FROM tb_alternatif WHERE kode_alternatif='$key'") or die(mysqli_error($koneksi));
                                        $row = $ambildata->fetch_assoc();
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $ALTERNATIF[$key] ?></td>
                                            <?php foreach ($val as $k => $v) : ?>
                                                <td><?= $SUB[$v]['nama'] ?></td>
                                            <?php endforeach ?>
                                            <td>
                                                <?= $row['statuspendaftaran'] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="rel_alternatifdetail.php?ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span> Detail</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach ?>
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