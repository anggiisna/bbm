<?php include 'header.php';
if ($_SESSION['akun']['role'] != 'Admin') {
    echo "<script> alert('Maaf, anda tidak mempunyai hak untuk mengakses halaman ini');</script>";
    echo "<script> location ='dashboard.php';</script>";
}
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Nilai Bobot Kriteria</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="tabel">
                                            <thead>
                                                <tr>
                                                    <th>Nama Alternatif</th>
                                                    <?php foreach ($KRITERIA as $key => $val) : ?>
                                                        <th><?= $val ?></th>
                                                    <?php endforeach ?>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $data = get_rel_alternatif();
                                            $no = 0;
                                            foreach ($data as $key => $val) : ?>
                                                <tr>
                                                    <td><?= $ALTERNATIF[$key] ?></td>
                                                    <?php foreach ($val as $k => $v) : ?>
                                                        <td><?= $SUB[$v]['nama'] ?></td>
                                                    <?php endforeach ?>
                                                    <td>
                                                        <a class="btn btn-xs btn-warning" href="rel_alternatifedit.php?ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
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
    </div>
</div>
<?php include 'footer.php'; ?>