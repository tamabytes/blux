<?php
include '../config/koneksi.php';
session_start();


if (isset($_POST['hapus_pengaduan'])){
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan");
    $data = mysqli_fetch_array($query); 
    if (is_file('../asset/img'.$data['foto']));{
    unlink('../asset/img'.$data['foto']);
    mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
    header('location:index.php');
}
}

if (isset($_POST['hapus_tanggapan'])){
    $id_tanggapan = $_POST['id_tanggapan'];
    $query = mysqli_query($koneksi, "DELETE * FROM tanggapan");
    if ($query){
        echo"<script>
        alert ('Data Berhasil Dihapus');
        window.location='index.php?page=tanggapan');
        </script>";
    }

}
?>