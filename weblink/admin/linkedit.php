<?php

$idlink = $koneksi->query("SELECT * FROM link WHERE idlink = '$_GET[id]'");
$data = $idlink->fetch_assoc();
$pgn = $koneksi->query("SELECT * FROM user");
$user = $pgn->fetch_assoc();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Link</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Link</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <div class="contact-form-area2 mb-100">
                                    <div class="alert alert-primary">
                                        <strong>Data Link</strong>
                                    </div>
                                    <form method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 my-custom-class mb-3 mt-3">
                                                <img src="../foto/<?php echo $data['logo'] ?>" alt="Logo">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Ganti Logo</label>
                                                    <input type="file" class="form-control" name="logo">
                                                </div>
                                            </div>
                                            <div class="col-12 my-custom-class mb-3 mt-3">
                                                <img src="../foto/<?php echo $data['foto'] ?>" alt="Foto">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Ganti Foto</label>
                                                    <input type="file" class="form-control" name="foto">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary float-right" name="ubah">Simpan</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['ubah'])) {
    $judul = $_POST['judul'];
    $namalogo = $_FILES['logo']['name'];
    $lokasilogo = $_FILES['logo']['tmp_name'];
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    // Cek jika ada file logo baru yang diunggah
    if (!empty($lokasilogo)) {
        $namalogo = time() . "_logo_" . $namalogo; // Rename file untuk menghindari duplikasi
        move_uploaded_file($lokasilogo, "../foto/$namalogo");
        $koneksi->query("UPDATE link SET judul='$judul', logo='$namalogo' WHERE idlink='$_GET[id]'");
    }

    // Cek jika ada file foto baru yang diunggah
    if (!empty($lokasifoto)) {
        $namafoto = time() . "_foto_" . $namafoto; // Rename file untuk menghindari duplikasi
        move_uploaded_file($lokasifoto, "../foto/$namafoto");
        $koneksi->query("UPDATE link SET judul='$judul', foto='$namafoto' WHERE idlink='$_GET[id]'");
    }

    // Jika tidak ada file baru yang diunggah
    if (empty($lokasilogo) && empty($lokasifoto)) {
        $koneksi->query("UPDATE link SET judul='$judul' WHERE idlink='$_GET[id]'");
    }

    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=linkdaftar';</script>";
}
?>