<?php
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
							<h5 class="m-b-10">Data link</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data link</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data link</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Logo</th>
										<th>Foto</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$link = $koneksi->query("SELECT * FROM link");
									$ambillink = $link;
									while ($data = $ambillink->fetch_array()) {
										?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $data['judul'] ?></td>
											<td><img src="../foto/<?= $data['logo'] ?>" width="100"></td>
											<td><img src="../foto/<?= $data['foto'] ?>" width="100"></td>
											<td>
												<a class="btn btn-primary" href="index.php?halaman=linkedit&id=<?php echo $data['idlink']; ?>">Lihat</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="index.php?halaman=linkhapus&id=<?php echo $data['idlink']; ?>">Hapus</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>