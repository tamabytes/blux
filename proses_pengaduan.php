<?php
session_start();
include 'koneksi.php';
$tgl_pengaduan     = $_POST ['tgl_pengaduan'];
$nik               = $_SESSION['nik'];
$isi_laporan       = $_POST['isi_laporan'];
$lokasi_foto       = $_FILES['foto']['tmp_name'];
$nama_foto         = $_FILES['foto']['name'];   
$status            = 0;

if(move_uploaded_file($lokasi_foto, 'foto/' .$nama_foto)){
    try {
    // $sql = "INSERT INTO pengaduan(tgl_pengaduan,nik,isi_laporan,lokasi_foto,nama_foto,status )
    // VALUES('$tgl_pengaduan','$nik','$isi_laporan','$lokasi_foto','$nama_foto','$status')";
        $sql = "INSERT INTO `pengaduan`(`tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES ('$tgl_pengaduan','$nik','$isi_laporan','$nama_foto','$status')";
        var_dump($nama_foto);
        if(mysqli_query($koneksi, $sql)){
                echo"<script>alert('Pengaduan Sudah Tersimpan');
                window.location.assign('halaman.php?url=lihat_pengaduan');</script>";
        }
    return;
    } catch (Exception $th) {
        var_dump($th);
        echo"<script>alert('Pengaduan Gagal ,Tersimpan');
        window.location.assign('masyarakat.php?url=tulis-pengaduan');</script>";
    }
} else{
    echo"<script>alert('Pengaduan Gagal ,Tersimpan');
    window.location.assign('masyarakat.php?url=tulis-pengaduan');</script>";
}