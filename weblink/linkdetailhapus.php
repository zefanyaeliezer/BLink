
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM linkdetail WHERE idlinkdetail='$_GET[id]'");
echo "<script>alert('Link detail Berhasil Di Hapus');</script>";
echo "<script> location ='riwayat.php';</script>"; ?>