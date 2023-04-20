<?php
include '../config/koneksi.php';
$masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
$jml_masyarakat = mysqli_num_rows($masyarakat);

$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan");
$jml_pengaduan = mysqli_num_rows($pengaduan);

$tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan");
$jml_tanggapan = mysqli_num_rows($tanggapan);

$petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
$jml_petugas = mysqli_num_rows($petugas);
?>

<div class="container pt-4">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">
            Dashboard
        </h1>
    </div>
    <div class="row">
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Masyarakat</div>
                <div class="card-body"><?php echo $jml_pengaduan; ?> Orang</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Pengaduan</div>
                <div class="card-body"><?php echo $jml_pengaduan; ?> Pengaduan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Tanggapan</div>
                <div class="card-body"><?php echo $jml_tanggapan; ?> Tangapan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">Petugas</div>
                <div class="card-body"><?php echo $jml_petugas; ?> Pengguna</div>
            </div>
        </div>

    </div>

</div>