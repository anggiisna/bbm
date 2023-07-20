<?php include 'header.php';
if ($_SESSION['akun']['role'] != 'Admin') {
    echo "<script> alert('Maaf, anda tidak mempunyai hak untuk mengakses halaman ini');</script>";
    echo "<script> location ='dashboard.php';</script>";
}
?>
<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Ubah Nilai Bobot <?= $row->nama_alternatif ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="aksi.php?act=rel_alternatif_ubah">
                                    <?php
                                    $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub
                FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
                WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
                                    foreach ($rows as $row) : ?>
                                        <div class="form-group">
                                            <label><?= $row->nama_kriteria ?></label>
                                            <select class="form-control" name="nilai[<?= $row->ID ?>]">
                                                <?= get_sub_option($row->kode_sub, $row->kode_kriteria) ?>
                                            </select>
                                        </div>
                                    <?php endforeach ?>
                                    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>