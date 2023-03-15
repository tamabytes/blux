<?php
$id = $_GET['id'];
if(empty($id)){
    header("location:masyarakat.php");
}
include'../koneksi.php';
$query = mysqli_query($koneksi, "SELECT*FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($query);
?>
<div class="card shadow">
    <div class="card-header">
    <?php
        require '../koneksi.php';
        $sql=mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
        $data=mysqli_fetch_array($sql);
        if($sql)
        ?>
        <a href="?url=verifikasi_pengaduan" class="btn btn-primary btn-icon-split"> 
        <span class=" icon text-white-5">
            <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">kembali</span>
    </a>
</div>
<div class="card-header">
        <a href="proses.php?id=<?= $data['id_pengaduan'] ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin Akan Di Proses?')"> 
        <span class=" icon text-white-5">
            <i class="fa fa-check"></i>
        </span>
        <span class="text">Verifikasi</span>
    </a>
</div>
<div class="card-body">
<form  method="post" action="proses_pengaduan.php" enctype="multipart/form-data">

<div class="form-group">
    <label style="font-size: 18px">Tanggal Pengaduan</label><br>
    <input type="text" name="tgl_pengaduan" class="form_control" readonly value="<?=$data['tgl_pengaduan'];?>">
</div>
<div class="form-group">
    <label style="font-size: 18px">Bukti Foto : </label><br>
    <img class="img-thumbnail"  img src="../foto/<?= $data['foto']; ?>" width="800">
</div>
<div class="form-group">
    <label style="font-size: 18px">Isi Laporan : </label>
    <textarea name="isi_laporan" class="form-control" readonly value required><?=$data['isi_laporan']?></textarea>
</div>
</form> 

</div>
</div>