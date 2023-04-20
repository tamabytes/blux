<?php
session_start();
if (empty($_SESSION['login']=='admin' || $_SESSION['login']=='petugas')){
    header("location:../index.php");
}
include '../layouts/header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'pengaduan':
            include 'data_pengaduan.php';
            break;
        case 'tanggapan':
            include 'data_tanggapan.php';
            break;
        case 'petugas':
            include 'data_petugas.php';
            break;
        case 'masyarakat':
            include 'data_masyarakat.php';
            break;
        default:
            echo "Halaman Tidak Tersedia";
            break;
    }
} else {
    include 'home.php';
}

include '../layouts/footer.php';
