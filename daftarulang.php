<?php include 'headerhome.php';
$iduser = $_SESSION['user']['iduser'];
$ambildata = $koneksi->query("SELECT * FROM user join tb_alternatif on user.iduser = tb_alternatif.iduser WHERE user.iduser='$iduser'") or die(mysqli_error($koneksi));
$data = $ambildata->fetch_assoc();
$rowalternatif = $db->get_row("SELECT * FROM tb_alternatif join user on tb_alternatif.iduser = user.iduser WHERE tb_alternatif.iduser='$iduser'");
$ambilpendaftar = $koneksi->query("SELECT * FROM tb_alternatif");
$total = $ambilpendaftar->num_rows;
?>
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Form Pengajuan BBM</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                WHERE kode_alternatif='$rowalternatif->kode_alternatif' ORDER BY kode_kriteria");
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $row->nama_kriteria ?></td>
                                <td>
                                    <?= get_sub_optiondetail($row->kode_sub, $row->kode_kriteria) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <form method="post" class="form-contact contact_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perguruan Tinggi</label>
                        <input type="text" value="<?php echo $data['perguruantinggi'] ?>" class="form-control" name="perguruantinggi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apakah sudah lulus kuliah ?</label>
                        <select class="form-control" name="statuslulus">
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apakah mendapatkan bantuan lain ?</label>
                        <select class="form-control" name="statusbantuanlain">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Strata</label>
                        <select class="form-control" name="strata">
                            <option value="DIII">DIII</option>
                            <option value="DIV">DIV</option>
                            <option value="S1">S1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fakultas</label>
                        <input type="text" value="<?php echo $data['fakultas'] ?>" class="form-control" name="fakultas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jurusan</label>
                        <input type="text" value="<?php echo $data['jurusan'] ?>" class="form-control" name="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Semester</label>
                        <select class="form-control" name="semester">
                            <?php
                            $semester = 1;
                            while ($semester <= 10) {
                            ?>
                                <option <?php if ($data['semester'] == $semester) echo 'selected'; ?> value="<?= $semester ?>"><?= $semester ?></option>
                            <?php
                                $semester++;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">IPK</label>
                        <input type="number" value="<?php echo $data['ipk'] ?>" class="form-control" name="ipk" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bukti IPK Terakhir PDF</label>
                        <input type="file" class="form-control" name="buktiipk">
                        <?php
                        if ($data['buktiipk'] != "") { ?>
                            <a class="btn btn-success mt-3" href="assets/foto/<?= $rowalternatif->buktiipk ?>" target="_blank">Download</a>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Scan Rekening</label>
                        <input type="file" value="<?php echo $data['scanrekening'] ?>" class="form-control" name="scanrekening">
                        <?php
                        if ($data['scanrekening'] != "") { ?>
                            <a class="btn btn-success mt-3" href="assets/foto/<?= $rowalternatif->scanrekening ?>" target="_blank">Download</a>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
                        <input type="file" value="<?php echo $data['buktipembayaran'] ?>" class="form-control" name="buktipembayaran">
                        <?php
                        if ($data['buktipembayaran'] != "") { ?>
                            <a class="btn btn-success mt-3" href="assets/foto/<?= $rowalternatif->buktipembayaran ?>" target="_blank">Download</a>
                        <?php } ?>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="simpan" value="simpan" class="button button-contactForm boxed-btn btn-block">Simpan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $perguruantinggi = $_POST['perguruantinggi'];
                    $statuslulus = $_POST['statuslulus'];
                    $statusbantuanlain = $_POST['statusbantuanlain'];
                    $strata = $_POST['strata'];
                    $fakultas = $_POST['fakultas'];
                    $jurusan = $_POST['jurusan'];
                    $semester = $_POST['semester'];
                    $ipk = $_POST['ipk'];

                    // Handle file uploads (buktiipk, scanrekening, buktipembayaran) if needed.

                    $lokasifotobuktiipk = $_FILES['buktiipk']['tmp_name'];
                    if (!empty($lokasifotobuktiipk)) {
                        $buktiipk = $_FILES['buktiipk']['name'];
                        move_uploaded_file($lokasifotobuktiipk, "assets/foto/" . $buktiipk);
                    } else {
                        $buktiipk = $data['buktiipk'];
                    }

                    $lokasifotoscanrekening = $_FILES['scanrekening']['tmp_name'];
                    if (!empty($lokasifotoscanrekening)) {
                        $scanrekening = $_FILES['scanrekening']['name'];
                        move_uploaded_file($lokasifotoscanrekening, "assets/foto/" . $scanrekening);
                    } else {
                        $scanrekening = $data['scanrekening'];
                    }

                    $lokasifotobuktipembayaran = $_FILES['buktipembayaran']['tmp_name'];
                    if (!empty($lokasifotobuktipembayaran)) {
                        $buktipembayaran = $_FILES['buktipembayaran']['name'];
                        move_uploaded_file($lokasifotobuktipembayaran, "assets/foto/" . $buktipembayaran);
                    } else {
                        $buktipembayaran = $data['buktipembayaran'];
                    }

                    $koneksi->query("UPDATE user SET perguruantinggi='$perguruantinggi', statuslulus='$statuslulus', statusbantuanlain='$statusbantuanlain', strata='$strata', fakultas='$fakultas', jurusan='$jurusan', semester='$semester', ipk='$ipk', buktiipk='$buktiipk', scanrekening='$scanrekening', buktipembayaran='$buktipembayaran' WHERE iduser='$iduser'") or die(mysqli_error($koneksi));
                    $koneksi->query("UPDATE tb_alternatif SET statuspendaftaran='Daftar Ulang Berhasil, Menunggu Konfirmasi Admin' WHERE iduser='$iduser'") or die(mysqli_error($koneksi));
                    echo "<script> alert('Pengajuan Beasiswa Berhasil, silahkan menunggu pengumuman');</script>";
                    echo "<script> location ='pengumuman.php';</script>";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php include 'footerhome.php'; ?>
<script>
    const tanggalInput = document.getElementById("tanggal");
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const tomorrowFormatted = tomorrow.toISOString().split("T")[0];
    tanggalInput.setAttribute("min", tomorrowFormatted);
</script>
<script>
    const jamawalSelect = document.getElementById("mulailembur");
    const jamakhirSelect = document.getElementById("akhirlembur");
    jamawalSelect.addEventListener("change", function() {
        jamakhirSelect.disabled = false;
        const selectedJamawal = jamawalSelect.value;
        jamakhirSelect.innerHTML = "";
        for (let i = parseInt(selectedJamawal) + 1; i <= 23; i++) {
            const option = document.createElement("option");
            const value = i.toString().padStart(2, "0") + ":00";
            option.value = value;
            option.text = value;
            jamakhirSelect.appendChild(option);
        }
        if (parseInt(jamakhirSelect.value) <= parseInt(selectedJamawal)) {
            jamakhirSelect.value = selectedJamawal;
        }
    });
</script>