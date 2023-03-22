<?php
session_start();
include __DIR__ . './../koneksi.php';

if (isset($_POST['create'])) {
    $id_pengaduan      = $_POST['id_pengaduan'];
    $id_petugas        = $_SESSION['id_petugas'];
    $tgl_tanggapan     = $_POST['tgl_tanggapan'];
    $status            = $_POST['status'];
    $tanggapan         = $_POST['tanggapan'];

    try {
        $sql = "INSERT INTO `tanggapan`(`id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES ('$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')";
        $sql1 = "UPDATE `pengaduan` SET `status`='$status' WHERE `id_pengaduan`='$id_pengaduan'";
        if (mysqli_query($koneksi, $sql) && mysqli_query($koneksi, $sql1)) {
            echo "<script>alert('Tanggapan Sudah Tersimpan');
                window.location.assign('index.php?url=lihat_pengaduan');</script>";
        }
        throw new Exception("Error statement");
    } catch (Exception $th) {
        echo "<script>alert('Tanggapan Gagal ,Tersimpan');
        window.location.assign('index.php?url=lihat_pengaduan');</script>";
    }
}


if (isset($_POST['update'])) {
    $id_pengaduan      = $_POST['id_pengaduan'];
    $tanggapan         = $_POST['tanggapan'];
    
    try {
        $sql = "UPDATE `tanggapan` SET `tanggapan`='$tanggapan' WHERE `id_pengaduan`='$id_pengaduan'";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Tanggapan Sudah Tersimpan');
                window.location.assign('index.php?url=lihat_pengaduan');</script>";
        }
        throw new Exception("Error statement");
    } catch (Exception $th) {
        echo "<script>alert('Tanggapan Gagal ,Tersimpan');
        window.location.assign('index.php?url=lihat_pengaduan');</script>";
    }
}
