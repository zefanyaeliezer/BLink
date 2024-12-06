<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}

$iduser = $_SESSION["user"]['id'];
$penguna = $koneksi->query("SELECT * FROM user WHERE id = $iduser");
$datapgn = $penguna->fetch_assoc();

// Pastikan idlink diterima dari parameter URL atau sumber lain
$idlink = isset($_GET['idlink']) ? $_GET['idlink'] : null;
if (!$idlink) {
    echo "<script>alert('ID Link tidak ditemukan!');</script>";
    echo "<script>location='linklist.php';</script>"; // Redirect jika ID Link tidak ada
    exit;
}
?>
<style>
    img {
        width: 100%;
    }
</style>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Tambah Link Detail</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Tambah Link Detail</li>
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
                                    <label class="mb-3">Judul Detail</label>
                                    <input type="text" class="form-control mb-3" name="juduldetail" value="" placeholder=" Contoh : Instagram" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="mb-3">Link</label>
                                    <input type="text" class="form-control mb-3" name="link" value="https://" placeholder="Contoh : https://google.com" required>
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
    $juduldetail = $_POST['juduldetail'];
    $link = $_POST['link'];

    // Query untuk menyimpan data
    $stmt = $koneksi->prepare("INSERT INTO linkdetail (idlink, juduldetail, link) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $idlink, $juduldetail, $link);

    if ($stmt->execute()) {
        echo "<script>alert('Link Detail Berhasil Disimpan.')</script>";
        echo "<script>location='riwayat.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
    $stmt->close();
}
?>