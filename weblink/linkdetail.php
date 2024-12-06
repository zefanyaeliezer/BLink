<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>location='login.php';</script>";
}

// Ambil idlink dari URL
$idlink = $_GET['id'];

// Ambil detail data link berdasarkan idlink
$ambil = $koneksi->query("SELECT * FROM link WHERE idlink = '$idlink'");
$detail = $ambil->fetch_assoc();

if (!$detail) {
    echo "<script>alert('Data tidak ditemukan!');</script>";
    echo "<script>location='linklist.php';</script>";
    exit;
}
?>
<style>
    img {
        width: 20%;
    }
</style>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Detail Link</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Detail Link</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 100px;"></div>
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">
                                    Data
                                    <a class="btn btn-primary float-right" href="linkedit.php?id=<?= $idlink ?>">Edit</a>
                                </th>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td><?= $detail['judul'] ?></td>
                            </tr>
                            <tr>
                                <td>Logo</td>
                                <td><img src="foto/<?= $detail['logo'] ?>" width="50%"></td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td><img src="foto/<?= $detail['foto'] ?>" width="50%"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="linkdetailtambah.php?idlink=<?= $idlink ?>">Tambah Link Detail</a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th width="10px">No</th>
                                    <th>Judul Detail</th>
                                    <th>Link</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $ambilriwayat = $koneksi->query("SELECT * FROM linkdetail WHERE idlink = '$idlink' ORDER BY idlinkdetail DESC");
                                while ($data = $ambilriwayat->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td><?= $data['juduldetail'] ?></td>
                                        <td><a href="<?= $data['link'] ?>" target="_blank"><?= $data['link'] ?></a></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary m-1" href="linkdetailedit.php?id=<?= $data['idlinkdetail'] ?>">Edit</a>
                                            <a class="btn btn-danger m-1" href="linkdetailhapus.php?id=<?= $data['idlinkdetail'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php include_once('footer.php') ?>