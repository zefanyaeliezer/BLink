<?php
include 'header.php';
include 'koneksi.php';
if (!isset($_SESSION["user"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script> location ='login.php';</script>";
}
$id = $_SESSION["user"]['id'];
$ambil = $koneksi->query("SELECT * FROM user WHERE id='$id'");
$row = $ambil->fetch_assoc(); ?>
<main class="main">

    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
        <div class="container position-relative">
            <h1>Profil</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Profil</li>
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
                                    <label class="mb-3">Nama</label>
                                    <input type="text" value="<?php echo $row['nama']; ?>" class="form-control mb-3" name="nama">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label  class="mb-3">Email</label>
                                    <input type="email" class="form-control mb-3" name="email" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  class="mb-3">Password</label>
                                    <input type="text" class="form-control" name="password">
                                    <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $row['password']; ?>">
                                    <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                </div>
                            </div>
                            <div style="padding-top: 20px;"></div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  class="mb-3">No. HP</label>
                                    <input type="number" class="form-control mb-3" name="nohp" value="<?php echo $row['nohp']; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  class="mb-3">Alamat</label>
                                    <textarea class="form-control mb-3" name="alamat" required cols="30" rows="10"><?php echo $row['alamat']; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('alamat');
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
if (isset($_POST['ubah'])) {
    if ($_POST['password'] == "") {
        $password = $_POST['passwordlama'];
    } else {
        $password = $_POST['password'];
    }
    $koneksi->query("UPDATE user SET password='$password',nama='$_POST[nama]', email='$_POST[email]',nohp='$_POST[nohp]', alamat='$_POST[alamat]' WHERE id='$id'") or die(mysqli_error($koneksi));
    echo "<script>alert('Profil Berhasil Di Ubah');</script>";
    echo "<script>location='akun.php';</script>";
}
include 'footer.php';
?>