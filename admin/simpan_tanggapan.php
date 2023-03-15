<?php
require '../koneksi.php';
$id_pengaduan=$_POST['id_pengaduan'];
$tgl=$_POST['tgl_tanggapan'];
$tanggapan=$_POST['tanggapan'];
$id_petugas=$_POST['id_petugas'];
$st='selesai';


$sql=mysqli_query($koneksi, "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas)values('$id_pengaduan','$tgl','$tanggapan','$id_petugas')");
$update_st= mysqli_query($koneksi, "UPDATE pengaduan SET status='$st' WHERE id_pengaduan=$id_pengaduan");

if ($sql)
{
    ?>
    <script type="text/javascript">
        alert ('Data Sudah Di Tanggapi');
        window.location="admin.php?url=admin_pengaduan.php";
        </script>
        <?php
}
?>