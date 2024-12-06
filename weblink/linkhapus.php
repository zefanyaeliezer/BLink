
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM link WHERE idlink='$_GET[id]'");
echo "<script>alert('Link Berhasil Di Hapus');</script>";
echo "<script> location ='riwayat.php';</script>"; ?>