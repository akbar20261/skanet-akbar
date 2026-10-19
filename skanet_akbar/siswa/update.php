<?php
include "koneksi.php";

$nis=$_POST['nis'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];

$query = mysqli_query($koneksi, "update siswa set nama='$nama', alamat='$alamat'  where nis='$nis'");
    header('Location: index.php');
?>