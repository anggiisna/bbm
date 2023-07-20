<?php include 'header.php';
?>
<?php
$rowalternatif = $db->get_row("SELECT * FROM tb_alternatif join user on tb_alternatif.iduser = user.iduser WHERE kode_alternatif='$_GET[ID]'");
$ambilpendaftar = $koneksi->query("SELECT * FROM tb_alternatif");
$total = $ambilpendaftar->num_rows;
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Konfirmasi Pendaftaran Beasiswa <?= $rowalternatif->nama_alternatif ?><br>
                        Ranking <?= $rowalternatif->rank ?> dari <?= $total ?> Pendaftar</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?php echo $rowalternatif->nama; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $rowalternatif->jeniskelamin; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $rowalternatif->email; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Hp</td>
                                            <td><?php echo $rowalternatif->nohp; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?php echo $rowalternatif->alamat; ?></td>
                                        </tr>
                                        <?php
                                        $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub
                FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
                WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
                                        foreach ($rows as $row) : ?>
                                            <tr>
                                                <td><?= $row->nama_kriteria ?></td>
                                                <td>
                                                    <?= get_sub_optiondetail($row->kode_sub, $row->kode_kriteria) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <th>Status Pendaftaran</th>
                                            <th><?php echo $rowalternatif->statuspendaftaran; ?></th>
                                        </tr>
                                    </tbody>
                                    <?php
                                    if ($rowalternatif->statuspendaftaran == 'Daftar Ulang Berhasil, Menunggu Konfirmasi Admin' or $rowalternatif->statuspendaftaran == 'Pendaftaran Beasiswa Di Terima') {
                                    ?>
                                        <tr>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Perguruan Tinggi</th>
                                            <td><?php echo $rowalternatif->perguruantinggi; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Apakah sudah lulus kuliah ?</th>
                                            <td><?php echo $rowalternatif->statuslulus; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Apakah mendapatkan bantuan lain ?</th>
                                            <td><?php echo $rowalternatif->statusbantuanlain; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Strata</th>
                                            <td><?php echo $rowalternatif->strata; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fakultas</th>
                                            <td><?php echo $rowalternatif->fakultas; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jurusan</th>
                                            <td><?php echo $rowalternatif->jurusan; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Semester</th>
                                            <td><?php echo $rowalternatif->semester; ?></td>
                                        </tr>
                                        <tr>
                                            <th>IPK</th>
                                            <td><?php echo $rowalternatif->ipk; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Bukti IPK Terakhir PDF</th>
                                            <td>
                                                <?php
                                                if ($rowalternatif->buktiipk != "") { ?>
                                                    <a class="btn btn-success" href="assets/foto/<?= $rowalternatif->buktiipk ?>" target="_blank">Download</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Scan Rekening</th>
                                            <td>
                                                <?php
                                                if ($rowalternatif->scanrekening != "") { ?>
                                                    <a class="btn btn-success" href="assets/foto/<?= $rowalternatif->scanrekening ?>" target="_blank">Download</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Upload Bukti Pembayaran</th>
                                            <td>
                                                <?php
                                                if ($rowalternatif->buktipembayaran != "") { ?>
                                                    <a class="btn btn-success" href="assets/foto/<?= $rowalternatif->buktipembayaran ?>" target="_blank">Download</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="statuspendaftaran">
                                            <option value="">Belum di Konfirmasi</option>
                                            <option <?php if ($rowalternatif->statuspendaftaran == 'Anda Memenuhi Kelayakan, Silahkan Daftar Ulang') echo 'selected'; ?> value="Anda Memenuhi Kelayakan, Silahkan Daftar Ulang">Anda Memenuhi Kelayakan, Silahkan Daftar Ulang</option>
                                            <option <?php if ($rowalternatif->statuspendaftaran == 'Di Tolak, Anda Tidak Memenuhi Kelayakan') echo 'selected'; ?> value="Di Tolak, Anda Tidak Memenuhi Kelayakan">Di Tolak, Anda Tidak Memenuhi Kelayakan</option>
                                            <option <?php if ($rowalternatif->statuspendaftaran == 'Pendaftaran Beasiswa Di Terima') echo 'selected'; ?> value="Pendaftaran Beasiswa Di Terima">Pendaftaran Beasiswa Di Terima</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="simpan" value="simpan" class="btn btn-success waves-effect waves-light float-right pull-right">Simpan</button>
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
<?php
if (isset($_POST['simpan'])) {
    $koneksi->query("UPDATE tb_alternatif SET statuspendaftaran='$_POST[statuspendaftaran]' WHERE kode_alternatif='$_GET[ID]'") or die(mysqli_error($koneksi));
    echo "<script> alert('Status Pendaftaran Beasiswa Berhasil di Perbarui');</script>";
    echo "<script> location ='pengajuandaftar.php';</script>";
}
?>