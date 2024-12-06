<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';
if (!isset($_SESSION["user"])) {
	echo "<script> alert('Harap login terlebih dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
$iduser = $_SESSION["user"]['id']; ?>

<main class="main">

	<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg.jpg);">
		<div class="container position-relative">
			<h1>Riwayat</h1>
			<nav class="breadcrumbs">
				<ol>
					<li><a href="index.html">Home</a></li>
					<li class="current">Riwayat</li>
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
							<thead>
								<tr class="text-center">
									<th width="10px">No</th>
									<th>Judul </th>
									<th>Logo</th>
									<th>Foto</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$ambilriwayat = $koneksi->query("SELECT * FROM link where iduser = '$iduser' order by idlink desc") or die(mysqli_error($koneksi));
								while ($data = $ambilriwayat->fetch_array()) {
								?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $data['judul'] ?></td>
										<td><img src="foto/<?= $data['logo'] ?>" width="100"></td>
										<td><img src="foto/<?= $data['foto'] ?>" width="100"></td>
										<td>
											<a class="btn btn-secondary m-1" href="link.php?id=<?= $data['idlink'] ?>"
												onclick="copyToClipboard(this.href); return false;">Copy Link</a>
											<a class="btn btn-success m-1" href="link.php?id=<?= $data['idlink'] ?>">Lihat Web</a>
											<a class="btn btn-info m-1" href="linkdetail.php?id=<?= $data['idlink'] ?>">Atur Web</a>
											<a class="btn btn-primary m-1" href="linkedit.php?id=<?= $data['idlink'] ?>">Edit</a>
											<a class="btn btn-danger m-1" href="linkhapus.php?id=<?= $data['idlink'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
										</td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
						<br>
					</div>
				</div>
			</div>
	</section>
</main>
<div style="padding-top: 200px;"></div>
<?php
include 'footer.php';
?>
<script>
	function copyToClipboard(value) {
		// Create a temporary input element
		const tempInput = document.createElement('input');
		tempInput.value = value;
		document.body.appendChild(tempInput);

		// Select the input value and copy it
		tempInput.select();
		document.execCommand('copy');

		// Remove the temporary input element
		document.body.removeChild(tempInput);

		// Optionally, show an alert or notification
		alert('Link Berhasil di Copy');
	}
</script>