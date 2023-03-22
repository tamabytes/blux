<?php

$id = $_GET['id'];
if (empty($id)) {
    echo "<script>
    window.location.assign('masyarakat/index.php');
    </script>";
}
include __DIR__ . './../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM `pengaduan`, `tanggapan` WHERE `tanggapan`.`id_pengaduan`='$id' AND `tanggapan`.`id_pengaduan`=`pengaduan`.`id_pengaduan`");
?>
<div class="card shadow">
    <div class="card-header">
        <a href="masyarakat/index.php?url=lihat_pengaduan" class="btn btn-primary btn-icon-split">
            <span class=" icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>

    </div>
    <div class="card-body">

        <?php
        if (mysqli_num_rows($query) <= 0) {
            echo "<div class='alert alert-danger'>Maaf Pengaduan Anda Belum Di Tanggapi!</>";
        } else {
            $data = mysqli_fetch_assoc($query); ?>
            <div>
                <div class="form-group">
                    <label style="font-size: 18px">Tanggal Tanggapan</label><br>
                    <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['tgl_tanggapan']; ?>">
                </div>
                <div class="form-group">
                    <label style="font-size: 18px">Laporan</label><br>
                    <div class="row">
                        <div class="col-auto">
                            <img height="100" src="foto/<?= $data['foto']; ?>" alt="Foto pengaduan" srcset="foto/<?= $data['foto']; ?>" class="mr-3">
                        </div>
                        <div class="col">
                            <textarea name="isi_laporan" class="form-control" rows="5" readonly required><?= $data['isi_laporan'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-size: 18px">Tanggapan</label><br>
                    <textarea name="isi_laporan" class="form-control" rows="5" readonly required><?= $data['tanggapan'] ?></textarea>
                </div>
            </div>
        <?php } ?>
    </div>
</div>