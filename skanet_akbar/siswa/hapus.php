<?php
include "koneksi.php";
$nis=$_GET['nis'];
$query=mysqli_query($koneksi, "delete from siswa where nis='$nis'");
header('location:index.php');

?>