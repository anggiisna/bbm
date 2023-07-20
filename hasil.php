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
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <center>
                                            <h3 class="panel-title">Hasil Analisa</h3>
                                        </center>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Alternatif</th>
                                                    <?php foreach ($KRITERIA as $key => $val) : ?>
                                                        <th><?= $val ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <?php
                                            $data = get_rel_alternatif();
                                            foreach ($data as $key => $val) : ?>
                                                <tr>
                                                    <td><?= $ALTERNATIF[$key] ?></td>
                                                    <?php foreach ($val as $k => $v) : ?>
                                                        <td><?= $SUB[$v]['nama'] ?></td>
                                                    <?php endforeach ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                                <?php
                                function get_hasil_bobot($data)
                                {
                                    global $SUB;
                                    $arr = [];
                                    foreach ($data as $key => $val) {
                                        foreach ($val as $k => $v) {
                                            $arr[$key][$k] = $SUB[$v]['nilai_sub'];
                                        }
                                    }
                                    return $arr;
                                }
                                $hasil_bobot = get_hasil_bobot($data);
                                ?>

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <center>
                                            <h3 class="panel-title">Hasil Pembobotan</h3>
                                        </center>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <?php
                                                    $matriks = get_relkriteria();
                                                    $total = get_baris_total($matriks);
                                                    $normal = normalize($matriks, $total);
                                                    $rata = get_rata($normal);
                                                    foreach ($matriks as $key => $val) : ?>
                                                    <?php endforeach ?>
                                                    <th rowspan="2">Nama Alternatif</th>
                                                    <?php foreach ($KRITERIA as $key => $val) : ?>
                                                        <th><?= $val ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($rata as $key => $val) : ?>
                                                        <th><?= round($val, 4) ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach ($hasil_bobot as $key => $val) : ?>
                                                <tr>
                                                    <td><?= $ALTERNATIF[$key] ?></td>
                                                    <?php foreach ($val as $k => $v) : ?>
                                                        <td><?= round($v ?? 0, 3) ?></td>
                                                    <?php endforeach ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <center>
                                            <h3 class="panel-title">Perangkingan</h3>
                                        </center>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Ranking</th>
                                                    <th>Nama</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            function get_total($hasil_bobot, $rata)
                                            {
                                                global $SUB;
                                                $arr = [];

                                                foreach ($hasil_bobot as $key => $val) {
                                                    foreach ($val as $k => $v) {
                                                        $arr[$key] = isset($arr[$key]) ? ($arr[$key] += $v * $rata[$k]) : 0;
                                                    }
                                                }
                                                return $arr;
                                            }
                                            $total = get_total($hasil_bobot, $rata);
                                            FAHP_save($total);
                                            $rows = $db->get_results("SELECT * FROM tb_alternatif where statuspendaftaran!=''  ORDER BY total DESC");
                                            foreach ($rows as $row) : ?>
                                                <tr>
                                                    <td><?= $row->rank ?></td>
                                                    <td><?= $row->nama_alternatif ?></td>
                                                    <td><?= round($row->total, 5) ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        $best = $rows[0]->kode_alternatif;
                                        ?>
                                        <center>
                                            <p>Jadi pilihan terbaik adalah <strong><?= $ALTERNATIF[$best] ?></strong> dengan nilai <strong><?= round($total[$best], 5) ?></strong></p>
                                        </center>
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