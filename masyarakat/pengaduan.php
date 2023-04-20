<?php
include '../config/koneksi.php';
$tanggal = date("y-m-d");
if (isset($_POST['kirim'])) {
    $nik = htmlspecialchars($_SESSION['nik']);
    $judul_laporan = htmlspecialchars($_POST['judul_laporan']);
    $isi_laporan = htmlspecialchars($_POST['isi_laporan']);
    $status = 0;
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $lokasi = '../assets/img/';
    $nama_foto = rand(0, 999) . '-' . $foto;

    move_uploaded_file($tmp, $lokasi . $nama_foto);
    mysqli_query($koneksi, "INSERT INTO `pengaduan`(`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES ('','$tanggal','$nik','$judul_laporan','$isi_laporan','$nama_foto','$status')");

    echo "<script>
                        alert('Data Berhasil di Kirim');
                        window.location='index.php';
                        </script>
                        ";
}

?>
<div class="container">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between pt-4">
            <h1 class="h3 mb-0 text-gray-800">
                Data Pengaduan
            </h1>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" name="judul_laporan" placeholder="Masukan Judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" required accept="image/*">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>