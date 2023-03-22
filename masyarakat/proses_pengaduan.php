<?php
session_start();
include __DIR__ . './../koneksi.php';

if (isset($_POST['create'])) {
    $tgl_pengaduan     = $_POST['tgl_pengaduan'];
    $nik               = $_SESSION['nik'];
    $isi_laporan       = $_POST['isi_laporan'];
    $lokasi_foto       = $_FILES['foto']['tmp_name'];
    $nama_foto         = time() . "-" .  $_FILES['foto']['name'];
    $status            = 0;

    if (move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto)) {
        try {
            $sql = "INSERT INTO `pengaduan`(`tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES ('$tgl_pengaduan','$nik','$isi_laporan','$nama_foto','$status')";
            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Pengaduan Sudah Tersimpan');
                window.location.assign('index.php?url=lihat_pengaduan');</script>";
            }
            throw new Exception("Error statement");
        } catch (Exception $th) {
            echo "<script>alert('Pengaduan Gagal ,Tersimpan');
        window.location.assign('index.php?url=lihat_pengaduan');</script>";
        }
    } else {
        echo "<script>alert('Pengaduan Gagal ,Tersimpan');
    window.location.assign('index.php?url=lihat_pengaduan');</script>";
    }
}

if (isset($_POST['update'])) {
    $id_pengaduan      = $_POST['id_pengaduan'];
    $isi_laporan       = $_POST['isi_laporan'];
    $lokasi_foto       = $_FILES['foto']['tmp_name'];
    $nama_foto         = time() . "-" .  $_FILES['foto']['name'];

    try {
        $sql = "UPDATE `pengaduan` SET `isi_laporan`='$isi_laporan' WHERE `id_pengaduan` ='$id_pengaduan'";
        if (!empty($lokasi_foto)) {
            move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto);
            $sql = "UPDATE `pengaduan` SET `isi_laporan`='$isi_laporan', `foto`='$nama_foto' WHERE `id_pengaduan` ='$id_pengaduan'";
        }
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Pengaduan Sudah Tersimpan');
                    window.location.assign('index.php?url=lihat_pengaduan');</script>";
        }
        throw new Exception("Error statement");
    } catch (Exception $th) {
        echo "<script>alert('Pengaduan Gagal Tersimpan');
        window.location.assign('index.php?url=lihat_pengaduan');</script>";
    }
}

if (isset($_POST['delete'])) {
    $id_pengaduan      = $_POST['id_pengaduan'];

    try {
        $sql = "DELETE FROM `pengaduan` WHERE `id_pengaduan`='$id_pengaduan'";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Pengaduan Sudah Terhapus');
                    window.location.assign('index.php?url=lihat_pengaduan');</script>";
        }
        throw new Exception("Error statement");
    } catch (Exception $th) {
        echo "<script>alert('Pengaduan Gagal Terhapus');
        window.location.assign('index.php?url=lihat_pengaduan');</script>";
    }
}
