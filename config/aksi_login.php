<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

$login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE `username`='$username' AND `password`='$password'");
if ($level == 'masyarakat') {
    $login = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE `username`='$username' AND `password`='$password'");
} 

$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['level'] == 'masyarakat') {
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['login'] = "masyarakat";
        header('location:../masyarakat/');
    } else {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama'] = $data['nama_petugas'];
        $_SESSION['login'] = $data['level'];
        header('location:../admin/');
    }
} else {
    echo "<script>
    alert('Username atau Password tidak Terdaftar');
    window.location='../index.php'
    </script>";
}
