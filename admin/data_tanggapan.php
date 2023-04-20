<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Data Tanggapan
                </h1>
                <a href="export_tanggapan.php" class="btn btn-success" target="_blank">Export Exel</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NIK</th>
                                <th>JUDUL</th>
                                <th>TANGGAPAN</th>
                                <th>STATUS</th>
                                <center>
                                    <th>AKSI</th>
                                </center>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan=b.id_pengaduan");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['tgl_tanggapan'] ?></td>
                                    <td><?php echo $data['nik'] ?></td>
                                    <td><?php echo $data['judul_laporan'] ?></td>
                                    <td><?php echo $data['tanggapan'] ?></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 'proses') {
                                            echo "<span class='badge bg-warning'>Proses</span>";
                                        } elseif ($data['status'] == 'selesai') {
                                            echo "<span class='badge bg-success'>Selesai</span>";
                                        } else {
                                            echo "<span class='badge bg-warning'>Menunggu</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_tanggapan'] ?>">HAPUS</a>

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="hapus<?php echo $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="edit_data.php" method="POST">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?= $data['id_tanggapan'] ?>">
                                                            <p>Apakah yakin akan menghapus tanggapan <br> <?php echo $data['judul_laporan'] ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="hapus_tanggapan" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>