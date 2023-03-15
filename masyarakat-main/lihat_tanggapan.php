<?php
$id = $_GET['id'];
if(empty($id)){
    header("location:masyarakat.php");
}
include'koneksi.php';
$query = mysqli_query($koneksi, "SELECT*FROM pengaduan WHERE tanggapan.id_pengaduan='$id'AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");
?>
<div class="card shadow">
    <div class="card-header">
        <a href="?url=lihat_pengaduan" class="btn btn-primary btn-icon-split"> 
        <span class=" icon text-white-5">
            <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">kembali</span>
    </a>
</div>
<div class="card-body">
<?php
if(mysqli_num_rows($query)==0){
    echo"<div class='alert alert-danger'>Maaf Pengaduan Anda Belum di Tanggapi!</div>";
}else{
$data = mysqli_fetch_array($query); ?>


<form  method="post" action="proses_pengaduan.php" enctype="multipart/form-data">

<div class="form-group">
    <label style="font-size: 18px">Tanggal Pengaduan</label><br>
    <input type="text" name="tgl_pengaduan" class="form_control" readonly value="<?=$data['tgl_tanggapan'];?>">
</div>
<div class="form-group">
    <label style="font-size: 14px">Laporan</label><br>
    <input type="text" name="tgl_pengaduan" class="form_control" readonly value="<?=$data['isi_laporan'];?>">
</div>
<div class="form-group">
    <label style="font-size: 14px">Laporan</label><br>
    <input type="text" name="Tanggapan" class="form_control" readonly value="<?=$data['tanggapan'];?>">
</div>


</form> 
<?php }?>
</div>
</div>