<?php
require '../koneksi.php';
$id = $_GET['id'];
$sql=mysqli_query($koneksi, "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id'");
if($sql)
{
    header('Location: petugas.php?url=verifikasi_pengaduan');
}