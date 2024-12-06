<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>location='login.php';</script>";
}

$idlink = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM link WHERE idlink='$idlink'");
$detail = $ambil->fetch_assoc();
?>

<style>
    img {
        width: 10%;
    }

    .my-custom-class {
        text-align: left;
    }
</style>

<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Edit Link</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Edit Link</li>
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
                                    <label class="mb-3">Judul</label>
                                    <input type="text" class="form-control mb-3" name="judul" value="<?= $detail['judul'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <img src="foto/<?php echo $detail['logo'] ?>" alt="Logo">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Ganti Logo</label>
                                    <input type="file" class="form-control mb-3" name="logo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <img src="foto/<?php echo $detail['foto'] ?>" alt="Foto">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Ganti Foto</label>
                                    <input type="file" class="form-control mb-3" name="foto">
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
<div style="padding-top: 100px;"></div>
<?php include_once('footer.php') ?>

<?php
if (isset($_POST["simpan"])) {
    $judul = $_POST['judul'];

    // Proses upload logo
    $namalogo = $_FILES['logo']['name'];
    $lokasilogo = $_FILES['logo']['tmp_name'];

    if (!empty($lokasilogo)) {
        move_uploaded_file($lokasilogo, "foto/" . $namalogo);
    } else {
        $namalogo = $detail['logo']; // Gunakan logo lama jika tidak ada file baru
    }

    // Proses upload foto
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    } else {
        $namafoto = $detail['foto']; // Gunakan foto lama jika tidak ada file baru
    }

    // Update database
    $koneksi->query("UPDATE link SET judul='$judul', logo='$namalogo', foto='$namafoto' WHERE idlink='$idlink'");

    echo "<script>alert('Edit link Berhasil')</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>