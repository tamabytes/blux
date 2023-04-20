<?php
session_start();
if (empty($_SESSION['login'] == 'masyarakat')) {
    header("location:../index.php");
}

include '../layouts/header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'tanggapan':
            include 'tanggapan.php';
            break;
        case 'pengaduan':
            include 'pengaduan.php';
            break;
        default:
            echo "Halaman Tidak Tersedia";
            break;
    }
} else {
    include 'home.php';
}

include '../layouts/footer.php';
