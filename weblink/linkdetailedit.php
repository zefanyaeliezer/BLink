<?php
include 'koneksi.php';
include 'header.php';

if (!isset($_SESSION["user"])) {
    echo "<script>location='login.php';</script>";
    exit;
}

// Ambil ID linkdetail dari URL
$idlinkdetail = $_GET['id'];

// Ambil data berdasarkan ID linkdetail
$ambil = $koneksi->query("SELECT * FROM linkdetail WHERE idlinkdetail = '$idlinkdetail'");
$data = $ambil->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!');</script>";
    echo "<script>location='linkdetail.php';</script>";
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $juduldetail = $_POST['juduldetail'];
    $link = $_POST['link'];

    // Update data ke database
    $koneksi->query("UPDATE linkdetail SET 
        juduldetail = '$juduldetail',
        link = '$link'
        WHERE idlinkdetail = '$idlinkdetail'") or die(mysqli_error($koneksi));

    echo "<script>alert('Data berhasil diperbarui!');</script>";
    echo "<script>location='linkdetail.php?id=" . $data['idlink'] . "';</script>";
    exit;
}
?>
<style>
    img {
        width: 50%;
    }

    .my-custom-class {
        text-align: left;
    }
</style>

<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Edit Link Detail</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Edit Link Detail</li>
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
                                    <input type="text" class="form-control mb-3" id="juduldetail" name="juduldetail" value="<?= $data['juduldetail'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="mb-3">Link</label>
                                    <input type="text" class="form-control mb-3" id="link" name="link" value="<?= $data['link'] ?>" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                <a href="linkdetail.php?id=<?= $data['idlink'] ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<div style="padding-top: 200px;"></div>

<?php include 'footer.php'; ?>