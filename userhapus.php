<?php
include 'koneksi.php';
session_start();
$ambildata = $koneksi->query("SELECT * FROM tb_alternatif WHERE iduser='$_GET[id]'") or die(mysqli_error($koneksi));
$row = $ambildata->fetch_assoc();
$koneksi->query("DELETE FROM user WHERE iduser='$_GET[id]'");
$koneksi->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='$row[kode_alternatif]'");
$koneksi->query("DELETE FROM tb_alternatif WHERE iduser='$_GET[id]'");
echo "<script>alert('Data Pegawai Berhasil Di Hapus');</script>";
echo "<script>location='userdaftar.php';</script>";
