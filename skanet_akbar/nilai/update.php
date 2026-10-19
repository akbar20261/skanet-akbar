<?php
include "koneksi.php";

$id_nilai   = $_POST['id_nilai'];
$nis        = $_POST['nis'];
$nip        = $_POST['nip'];
$id_mapel   = $_POST['id_mapel'];
$nilai      = $_POST['nilai'];

// Contoh jika ini file update.php (menggunakan id_nilai_lama sebagai acuan WHERE)
$id_nilai_lama = isset($_POST['id_nilai_lama']) ? $_POST['id_nilai_lama'] : $id_nilai;

$query = mysqli_query($koneksi, "UPDATE nilai SET 
    id_nilai = '$id_nilai', 
    nis = '$nis', 
    nip = '$nip', 
    id_mapel = '$id_mapel', 
    nilai = '$nilai' 
    WHERE id_nilai = '$id_nilai_lama'");

if ($query) {
    echo "<script>alert('Data berhasil diubah!'); window.location='index.php?page=nilai/index';</script>";
} else {
    echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
}
?>