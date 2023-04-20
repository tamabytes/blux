<div class="container">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between pt-4">
            <h1 class="h3 mb-0 text-gray-800">
                Dashboard
            </h1>
        </div>
        <div class="col-md-12 mt-3">
            <!-- <p>Selamat Datang <?php echo $_SESSION['nama'] ?></p> -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JUDUL</th>
                                <th>ISI</th>
                                <th>FOTO</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $nik = $_SESSION['nik'];
                            //echo $_SESSION['nik'];
                            // $q_1="SELECT * FROM pengaduan WHERE $nik='$nik' ORDER BY id_pengaduan DESC";
                            //echo $q_1;
                            $query = mysqLi_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nik' ORDER BY id_pengaduan DESC");
                            while ($data = mysqLi_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul_laporan']; ?></td>
                                    <td><?php echo $data['isi_laporan']; ?></td>
                                    <td><img src="../assets/img/<?php echo $data['foto']; ?>" width="100" <?php echo $data['foto']; ?>></td>
                                    <td>
                                        <?php
                                        if ($data['status'] == 'proses') {
                                            echo "<span class= 'badge bg-warning'>Proses</span>";
                                        } elseif ($data['status'] == 'selesai') {
                                            echo "<span class= 'badge bg-success'>Selesai</span>";
                                            echo "<br><a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]'>Lihat Tanggapan</a>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                        ?>
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