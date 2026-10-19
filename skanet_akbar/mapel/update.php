<?php
include "../koneksi.php";

// 1. Ambil data umum (Sesuaikan dengan name di form: id_mapel_baru)
$id_mapel_baru = $_POST['id_mapel_baru'];
$nama_mapel    = $_POST['nama_mapel'];
$guru          = $_POST['guru'];

// 2. Cek apakah ini mode EDIT atau TAMBAH
if (isset($_POST['id_mapel_lama']) && !empty($_POST['id_mapel_lama'])) {
    
    $id_mapel_lama = $_POST['id_mapel_lama'];

    // Proses UPDATE
    $query = "UPDATE mapel SET 
              id_mapel='$id_mapel_baru', 
              nama_mapel='$nama_mapel', 
              guru='$guru' 
              WHERE id_mapel='$id_mapel_lama'";
    
    $pesan = "mengupdate";

} else {
    
    // Proses INSERT (Tambah Data Baru)
    $query = "INSERT INTO mapel (id_mapel, nama_mapel, guru) 
              VALUES ('$id_mapel_baru', '$nama_mapel', '$guru')";
    
    $pesan = "menambah";
}

// 3. Eksekusi query
$eksekusi = mysqli_query($koneksi, $query);

if ($eksekusi) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal $pesan data: " . mysqli_error($koneksi);
    echo "<br><a href='index.php'>Kembali</a>";
}
?>