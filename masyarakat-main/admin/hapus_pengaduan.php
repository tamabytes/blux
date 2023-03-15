<?php

include "../koneksi.php";
$id_pengaduan = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM `pengaduan` WHERE `id_pengaduan`='$id_pengaduan'");
echo "<script>
alert('Berhasil masbro!!');
window.location.href = 'admin.php?url=verifikasi_pengaduan';
</script>";