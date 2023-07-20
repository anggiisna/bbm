<?php include 'headerhome.php';
$iduser = $_SESSION['user']['iduser'];
$ambildata = $koneksi->query("SELECT * FROM user join tb_alternatif on user.iduser = tb_alternatif.iduser WHERE user.iduser='$iduser'") or die(mysqli_error($koneksi));
$data = $ambildata->fetch_assoc();
if ($cek['total'] != "") {
    echo "<script> alert('Anda sudah pernah mendaftar');</script>";
    echo "<script> location ='tambahpengajuan.php';</script>";
}
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
                <form method="post" class="form-contact contact_form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" value="<?php echo $data['nama'] ?>" readonly class="form-control" placeholder="Masukkan Nama Anda" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Asal Sekolah</label>
                        <input type="text" class="form-control" placeholder="Masukkan Asal Sekolah Anda" name="asalsekolah">
                    </div>
                    <?php
                    $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub
                FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
                WHERE kode_alternatif='$data[kode_alternatif]' ORDER BY kode_kriteria");
                    foreach ($rows as $row) : ?>
                        <div class="form-group">
                            <label><?= $row->nama_kriteria ?></label>
                            <select class="form-control" name="nilai[<?= $row->ID ?>]">
                                <?= get_sub_option($row->kode_sub, $row->kode_kriteria) ?>
                            </select>
                        </div>
                    <?php endforeach ?>
                    <div class="form-group mt-3">
                        <button type="submit" name="simpan" value="simpan" class="button button-contactForm boxed-btn btn-block">Simpan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $asalsekolah = $_POST["asalsekolah"];
                    foreach ((array) $_POST['nilai'] as $key => $val) {
                        $db->query("UPDATE tb_rel_alternatif SET kode_sub='$val' WHERE ID='$key'");
                    }
                    $koneksi->query("UPDATE tb_alternatif SET statuspendaftaran='Menunggu Hasil Seleksi' WHERE iduser='$iduser'") or die(mysqli_error($koneksi));
                    $koneksi->query("UPDATE user SET asalsekolah='$asalsekolah' WHERE iduser='$iduser'") or die(mysqli_error($koneksi));
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