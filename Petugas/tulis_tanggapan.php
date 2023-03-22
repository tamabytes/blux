<?php

$id = $_GET['id'];
if (empty($id)) {
    echo "<script>
    window.location.assign('petugas/index.php');
    </script>";
}
include __DIR__ . './../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM `pengaduan` WHERE `id_pengaduan`='$id';");
$sql = mysqli_query($koneksi, "SELECT * FROM `tanggapan` WHERE `id_pengaduan`='$id';");
?>
<div class="card shadow">
    <div class="card-header">
        <a href="petugas/index.php?url=lihat_pengaduan" class="btn btn-primary btn-icon-split">
            <span class=" icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>

    </div>
    <div class="card-body">
        <?php
        $data = mysqli_fetch_assoc($query);
        $dataT = mysqli_fetch_assoc($sql);
        ?>
        <form method="post" action="petugas/proses_tanggapan.php">
            <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan'] ?>" readonly>
            <div class="form-group">
                <label style="font-size: 18px">Tanggal Tanggapan</label><br>
                <input type="text" name="tgl_tanggapan" class="form-control" readonly value="<?= $data['tgl_tanggapan'] ?? date("Y/m/d") ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Status Pengaduan</label><br>
                <select name="status" class="form-control" id="status">
                    <option value="0">Menunggu</option>;
                    <option value="proses" selected>Proses</option>;
                    <option value="selesai">Selesai</option>;
                </select>
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Laporan</label><br>
                <div class="row align-items-center">
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
                <textarea name="tanggapan" class="form-control" rows="5" required><?= $dataT['tanggapan'] ?? "" ?></textarea>
            </div>
            <div class="form-group">
                <?php if (isset($dataT)) { ?>
                    <button type="submit" name="update" class="btn btn-success mt-2">Simpan</button>
                <?php } else { ?>
                    <button type="submit" name="create" class="btn btn-success mt-2">Simpan</button>
                <?php } ?>
            </div>
        </form>
    </div>
</div>