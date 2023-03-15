<title>APPM</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php

$id = $_GET['id'];
if(empty($id)){
    header("location:masyarakat.php");
}
include'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT*FROM pengaduan,tanggapan WHERE tanggapan.id_pengaduan='$id'AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");
?>
<div class="card shadow">
    <div class="card-header">
        <a href="?url=lihat_pengaduan" class="btn btn-primary btn-icon-split"> 
        <span class=" icon text-white-5">
        <i class="fa fa-arrow"></i>
        </span>
        <span class="text">Kembali</span>
    </a>

</div>
<div class="card-body">

<?php
    if(mysqli_num_rows($query)==0){
    echo"<div class='alert alert-danger'>Maaf Pengaduan Anda Belum Di Tanggapi!</>";
}else{
    $data = mysqli_fetch_array($query); ?>

<form  method="post" action="proses_pengaduan.php" enctype="multipart/form-data">

<div class="form-group">
    <label style="font-size: 25px">Tanggal Pengaduan</label><br>
    <input type="text" name="tgl_pengaduan" class="form_control" readonly value="<?= $data['tgl_tanggapan'];?>">
</div>
<div class="form-group">
    <label style="font-size: 25px">Laporan</label><br>
    <textarea style="height: 250px; width: 250px; color: grey; background-color: #f7f9ff;"  ;  name="isi_laporan" class="form_control"readonly value required><?= $data['isi_laporan'] ?></textarea>
</div>
<div class="form-group">
    <label style="font-size: 25px">Tanggapan</label><br>
    <textarea name="isi_laporan" class"form_control" readonly value required><?= $data['tanggapan'] ?></textarea>
</div>
</div>
</div>
        </form> 
    <?php }?>
