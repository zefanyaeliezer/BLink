<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>B Link</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets_home/assets/img/favicon.png" rel="icon">
  <link href="assets_home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets_home/assets/css/main.css" rel="stylesheet">
  <script src="admin/assets/ckeditor/ckeditor.js"></script>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <h3>B Link</h3>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="">Home</a></li>
          <?php
          if (isset($_SESSION["user"])) { ?>
            <?php
            $id = $_SESSION["user"]['id'];
            $ambil = $koneksi->query("SELECT *FROM user WHERE id='$id'");
            $row = $ambil->fetch_assoc(); ?>
            <li><a href="formlink.php">Form Link</a></li>
            <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="akun.php">Profil Akun</a></li>
                <li><a href="riwayat.php">Riwayat</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#daftar">Daftar Akun</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
          <?php } ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
  <!-- Modal -->
  <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="modalLabelDaftar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 15px; border: 3px solid transparent;">
        <div class="modal-header">
          <h5 class="modal-title text-warning" id="modalLabelDaftar">Silahkan Daftar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="tel" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No. HP" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" cols="30" rows="3" placeholder="Alamat" required></textarea>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100" name="daftar">Daftar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="modalLabelLogin" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 15px; border: 3px solid transparent;">
        <div class="modal-header">
          <h5 class="modal-title text-warning" id="modalLabelLogin">Silahkan Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" class="form" enctype="multipart/form-data">
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="text-center">
              <button class="btn btn-outline-primary" name="login" value="login" type="submit">Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->
  <?php
  if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM user
		WHERE email='$email' AND password='$password' limit 1");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok == 1) {
      $akun = $ambil->fetch_assoc();
      $_SESSION["user"] = $akun;
      echo "<script> alert('Login Berhasil');</script>";
      echo "<script> location ='index.php';</script>";
    } else {
      echo "<script> alert('Email atau password salah');</script>";
    }
  }
  if (isset($_POST["daftar"])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $ambil = $koneksi->query("SELECT*FROM user 
                WHERE email='$email'");
    $yangcocok = $ambil->num_rows;
    if ($yangcocok == 1) {
      echo "<script>alert('Pengaduan Gagal, email sudah ada')</script>";
    } else {
      $koneksi->query("INSERT INTO user	(nama, email,  password, alamat, nohp)
                  VALUES('$nama','$email','$password','$alamat','$nohp')");

      echo "<script>alert('Pengaduan Berhasil')</script>";
      echo "<script>location='index.php';</script>";
    }
  }
  ?>