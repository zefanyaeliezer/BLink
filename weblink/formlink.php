<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}

$iduser = $_SESSION["user"]['id'];
$penguna = $koneksi->query("SELECT * FROM user where id = $iduser");
$datapgn = $penguna->fetch_assoc();
?>
<style>
    img {
        width: 100%;
    }
</style>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Form Link</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Form Link</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 100px;"></div>
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-12">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="mb-3">Judul </label>
                                    <input type="text" class="form-control mb-3" name="judul" value="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="mb-3">Logo</label>
                                    <input type="file" class="form-control mb-3" name="logo" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Background</label>
                                    <input type="file" class="form-control mb-3" name="foto" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<div style="padding-top: 200px;"></div>
<?php include_once('footer.php') ?>
<?php
if (isset($_POST["simpan"])) {
    $namalogo = $_FILES['logo']['name'];
    $lokasilogo = $_FILES['logo']['tmp_name'];
    move_uploaded_file($lokasilogo, "foto/" . $namalogo);
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    $judul = $_POST['judul'];
    $koneksi->query("INSERT INTO link (judul, iduser, logo, foto) VALUES('$judul', '$iduser', '$namalogo', '$namafoto')");


    echo "<script>alert('Link Berhasil Di Simpan.')</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>