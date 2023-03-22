<div class="card shadow">
    <div class="card-header">
        <a href="masyarakat/index.php" class="btn btn-primary btn-icon-split">
            <span class=" icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="masyarakat/proses_pengaduan.php" enctype="multipart/form-data">

            <div class="form-group">
                <label style="font-size: 18px">Tanggal Pengaduan</label><br>
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?= date('Y/m/d'); ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label style="font-size: 18px">Foto</label>
                <input type="file" required class="form-control" name="foto" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" name="create" class="btn btn-success mt-2">Simpan</button>
            </div>
        </form>

    </div>
</div>