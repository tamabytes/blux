<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Data Pengaduan
                </h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div style="overflow-x:auto">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NAMA</th>
                                    <th>JUDUL</th>
                                    <th>LAPORAN</th>
                                    <th>FOTO</th>
                                    <th>STATUS</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../config/koneksi.php';
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['tgl_pengaduan'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['judul_laporan'] ?></td>
                                        <td><?php echo $data['isi_laporan'] ?></td>
                                        <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
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
                                            <?php if ($data['status'] == '0') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi<?php echo $data["id_pengaduan"] ?>">VERIFIKASI</button>
                                                <!-- Modal Verifikasi-->
                                                <div class="modal fade" id="verifikasi<?php echo $data["id_pengaduan"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi : <?php echo $data['judul_laporan'] ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data["id_pengaduan"] ?>">
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Status</label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control" name="status">
                                                                                <option value="proses">Proses</option>
                                                                                <option value="0">Tolak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="kirim_veri" class="btn btn-secondary" data-bs-dismiss="modal">Verifikasi</button>
                                                            </div>
                                                            </form>
                                                            <?php
                                                            if (isset($_POST['kirim_veri'])) {
                                                                $id_pengaduan = $_POST['id_pengaduan'];
                                                                $status = $_POST['status'];

                                                                $query = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
                                                                echo "<script>
                                                        alert ('Data Berhasil diverifikasi');
                                                        window.location='index.php?page=pengaduan';
                                                        </script>
                                                        ";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <?php
                                            if ($data['status'] == 'proses') { ?>
                                                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tanggapi<?php echo $data['id_pengaduan'] ?>">TANGGAPI</a>
                                                <!-- Modal Tanggapi-->
                                                <div class="modal fade" id="tanggapi<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapi : <?php echo $data['judul_laporan'] ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Tanggal</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" name="tgl_pengaduan" class="form-control" value="<?php echo $data['tgl_pengaduan'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Judul</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Isi</label>
                                                                        <div class="col-md-8">
                                                                            <textarea name="isi_laporan" class="form-control" readonly> <?php echo $data['isi_laporan'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Foto</label>
                                                                        <div class="col-md-8">
                                                                            <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-4">Tanggapan</label>
                                                                        <div class="col-md-8">
                                                                            <textarea name="tanggapan" class="form-control" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="kirim_tanggapan" class="btn btn-secondary" data-bs-dismiss="modal">Tanggapi</button>
                                                                </div>
                                                            </form>
                                                            <?php
                                                            if (isset($_POST['kirim_tanggapan'])) {
                                                                $id_pengaduan = $_POST['id_pengaduan'];
                                                                $id_petugas = $_SESSION['id_petugas'];
                                                                $tanggal = $_POST['tgl_pengaduan'];
                                                                $tanggal_tanggapan = date("Y-m-d");
                                                                $tanggapan = htmlspecialchars($_POST['tanggapan']);
                                                                //$id_pengaduan=$data['id_pengaduan'];
                                                                //$status = $_POST['status'];
                                                                $q_1 = "INSERT INTO tanggapan VALUES ('','$id_pengaduan','$tanggal_tanggapan', '$tanggapan', '$id_petugas')";
                                                                $query_tanggapan = mysqli_query($koneksi, $q_1);
                                                                //$q_2="UPDATE pengaduan SET status='selesai' WHERE id_pengaduan ='$id_pengaduan'";
                                                                //echo"$q_2";
                                                                $update = mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan ='$id_pengaduan' ");
                                                                echo "<script>
                                                              alert ('Data Berhasil ditanggapi');
                                                              window.location='index.php?page=pengaduan';
                                                              </script>
                                                              ";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_pengaduan'] ?>">HAPUS</button>
                                            <!-- Modal Hapus-->
                                            <div class="modal fade" id="hapus<?php echo $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="edit_data.php" method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                                <p>Apakah yakin akan menghapus data <br> <?php echo $data['judul_laporan'] ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="hapus_pengaduan" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
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
</div>