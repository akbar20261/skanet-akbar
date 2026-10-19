<?php

include "../koneksi.php";

$id_mapel = $_GET['id_mapel'];

$query = mysqli_query(
    $koneksi,
    "DELETE FROM mapel WHERE id_mapel='$id_mapel'"
);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Hapus gagal: " . mysqli_error($koneksi);
}
?>