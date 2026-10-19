<?php
include "koneksi.php";
$id_nilai=$_GET['id_nilai'];
$query=mysqli_query($koneksi,"delete from nilai where id_nilai='$id_nilai'");
header('location:index.php');
?>