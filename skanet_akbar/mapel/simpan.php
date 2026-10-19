<?php
include "../koneksi.php";

// Gunakan isset untuk memastikan data yang dikirim benar-benar ada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Pastikan key $_POST sesuai dengan atribut 'name' di form HTML
    $id_mapel   = $_POST['id_mapel'] ?? '';
    $nama_mapel = $_POST['nama_mapel'] ?? '';
    $guru       = $_POST['guru'] ?? '';

    // Cek apakah data kosong
    if (empty($id_mapel) || empty($nama_mapel) || empty($guru)) {
        echo "Semua field harus diisi! <br><a href='tambah.php'>Kembali</a>";
        exit;
    }

    // Query Tambah Data
    $query = "INSERT INTO mapel (id_mapel, nama_mapel, guru) VALUES ('$id_mapel', '$nama_mapel', '$guru')";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("location:index.php");
        exit;
    } else {
        // Tampilkan error asli dari MySQL agar Anda tahu apa masalahnya
        echo "Gagal menambah data: " . mysqli_error($koneksi);
        echo "<br><a href='tambah.php'>Kembali ke Form</a>";
    }
} else {
    // Jika user mengakses file simpan.php langsung tanpa submit form
    header("location:tambah.php");
    exit;
}
?>