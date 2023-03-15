<?php
$id = $_GET['id'];
if (empty($id)) {
    header("location:masyarakat.php");
}
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT*FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($query);
?>
<div class="card shadow">
    <div class="card-header">
        <?php
        require '../koneksi.php';
        $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
        $data = mysqli_fetch_array($sql);
        if ($sql)
        ?>
        <a href="?url=verifikasi_pengaduan" class="btn btn-primary btn-icon-split">
            <span class=" icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">kembali</span>
        </a>
    </div>
    <div class="card-header">
        Tanggapan
        <div class="card-body">
            <form method="post" action="simpan_tanggapan.php" enctype="multipart/form-data">
                <input type="hidden" name="id_pengaduan" value="<?= $_GET['id'] ?>">

                <div class="form-group">

                    <label style="font-size: 18px">Tanggal Tanggapan</label><br>
                    <input type="text" name="tgl_tanggapan" class="form_control" readonly value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group cols-sm-6">
                    <label style="font-size: 18px">Tulis Taggapan</label>
                    <textarea class="form-control" rows="7" name="tanggapan"></textarea>
                </div>
                <div class="form-group">
                    <label style="font-size: 18px">ID petugas</label>
                    <input type="text" name="id_petugas" value="<?= $_SESSION['nik']; ?>" class="form-control" readonly="">
                </div>
                <input type="submit" class="btn btn-primary btn-user" value="Tanggapi!">

               