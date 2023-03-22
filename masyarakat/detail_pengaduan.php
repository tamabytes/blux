<?php
$id = $_GET['id'];
if (empty($id)) {
    echo "<script>
    window.location.assign('masyarakat/index.php');
    </script>";
}
include __DIR__ . './../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_assoc($query);
?>
<div class="card shadow">
    <div class="card-header">
        <a href="masyarakat/index.php?url=lihat_pengaduan" class="btn btn-primary btn-icon-split">
            <span class=" icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="masyarakat/proses_pengaduan.php" enctype="multipart/form-data">
            <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>" readonly>
            <div class="form-group">
                <label style="font-size: 18px">Status : </label><br>
                <select name="status" class="form-control" readonly id="status">
                    <?php
                    if ($data['status'] == '0') {
                        echo "<option value=" . $data['status'] . " selected>Menunggu</option>";
                    } elseif ($data['status'] == 'proses') {
                        echo "<option value=" . $data['status'] . " selected>Proses</option>";
                    } elseif ($data['status'] == 'selesai') {
                        echo "<option value=" . $data['status'] . " selected>Selesai</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Tanggal Pengaduan</label><br>
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['tgl_pengaduan']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Isi Laporan : </label>
                <textarea name="isi_laporan" class="form-control " rows="5" required><?= $data['isi_laporan'] ?></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 18px">
                    <p>Foto :</p>
                    <img class="img-thumbnail" src="foto/<?= $data['foto'] ?>" width="350">
                    <input type="file" style="display: none;" name="foto" accept="image/*">
                </label>
            </div>
            <div class="form-group">
                <button type="submit" name="update" class="btn btn-success mt-2">Simpan</button>
                <button type="submit" name="delete" class="btn btn-danger mt-2">Hapus</button>
            </div>
        </form>
    </div>
</div>