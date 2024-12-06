<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Detail Link</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Detail Link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah To Do List</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Judul To Do List</label>
                                                <input type="text" class="form-control" name="judul_todolist" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Tanggal To Do List</label>
                                                <input type="date" class="form-control" name="tanggal_todolist" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Deadline To Do List</label>
                                                <input type="date" class="form-control" name="deadline_todolist" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Deskripsi todolist</label>
                                                <textarea class="form-control" name="isi_todolist" id="isi" required></textarea>
                                                <script>
                                                    CKEDITOR.replace('isi');
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Lampiran </label>
                                                <input type="file" class="form-control" name="lampiran" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="simpan">Simpan</button>
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
</section>
<?php
if (isset($_POST['simpan'])) {
    $namalampiran = $_FILES['lampiran']['name'];
    $lokasilampiran = $_FILES['lampiran']['tmp_name'];
    move_uploaded_file($lokasilampiran, "../foto/" . $namalampiran);
    $koneksi->query("INSERT INTO todolist
		(judul_todolist,tanggal_todolist, deadline_todolist,isi_todolist,lampiran)
		VALUES('$_POST[judul_todolist]','$_POST[tanggal_todolist]','$_POST[deadline_todolist]','$_POST[isi_todolist]','$namalampiran')");
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='index.php?halaman=todolistdaftar';</script>";
}
?>