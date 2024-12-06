<?php
include 'koneksi.php';
include 'header.php'; ?>
<div class="breadcrumb-area">
	<div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(foto/bgnav.jpeg);">
		<h2>Login</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Login</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<section class="contact-area">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-6 col-lg-5">
				<div class="section-heading text-center">
					<h2>Login User</h2>
				</div>
				<div class="contact-form-area mb-100">
					<form method="post">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<input type="email" for="c_email" class="form-control" id="name" name="email" required placeholder="Email">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" required placeholder="Password">
								</div>
							</div>
							<div class="col-12">
								<button type="submit" class="btn alazea-btn mt-15 float-right" name="simpan" value="Masuk">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
if (isset($_POST["simpan"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM user
		WHERE email='$email' AND password='$password' limit 1");
	$akunyangcocok = $ambil->num_rows;
	if ($akunyangcocok == 1) {
		$akun = $ambil->fetch_assoc();
		$_SESSION["user"] = $akun;
		echo "<script> alert('Anda sukses login');</script>";
		echo "<script> location ='index.php';</script>";
	} else {
		echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
		echo "<script> location ='login.php';</script>";
	}
}
?>
<?php
include 'footer.php';
?>