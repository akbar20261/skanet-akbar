<?php
include "koneksi.php";

// Tangkap data dari form
// Jika di edit.php Anda menggunakan input name="nip_baru", maka gunakan $_POST['nip_baru']
$nip_lama = $_POST['nip_lama']; 
$nip_baru = $_POST['nip_baru'];
$nama     = $_POST['nama'];
$alamat   = $_POST['alamat'];

// Gunakan 'NIP' (huruf besar) agar sesuai dengan database
// Update NIP, nama, dan alamat sekaligus
$query = mysqli_query($koneksi, "UPDATE guru SET NIP='$nip_baru', nama='$nama', alamat='$alamat' WHERE NIP='$nip_lama'");

if($query) {
    header('Location: index.php');
} else {
    echo "Gagal Update: " . mysqli_error($koneksi);
}
?>