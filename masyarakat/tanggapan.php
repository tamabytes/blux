<?php
include '../config/koneksi.php';
if (!empty($_GET['id_pengaduan'])) {
    $id = $_GET['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN tanggapan b ON a.id_pengaduan =b.id_pengaduan WHERE b.id_pengaduan='$id'");
    $data = mysqli_fetch_array($query);
    if (is_null($data)) {
        header("Location: index.php");
        exit();
    }
?>
    <div class="container">
        <div class="row">
            <div class="d-sm-flex align-items-center justify-content-between pt-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Data Tanggapan
                </h1>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Judul Laporan</label>
                                <input type="text" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi Laporan</label>
                                <textarea class="form-control" readonly><?php echo $data['isi_laporan'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <img src="../assets/img/<?php echo $data['foto'] ?>" width="100" class="form-control col-3" style="height:auto;" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggapan</label>
                                <textarea class="form-control" readonly><?php echo $data['tanggapan'] ?></textarea>
                            </div>
                            <a href="index.php" class="btn btn-primary">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else {
    echo "Halaman Tidak Tersedia";
} ?>