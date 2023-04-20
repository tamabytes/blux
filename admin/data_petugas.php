<?php
include '../config/koneksi.php';
if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "INSERT INTO `petugas`(`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES ('','$nama','$username','$password','$telp','$level')");

    if ($query) {
        header('location: index.php?page=petugas');
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Data Petugas
                </h1>
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Data</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Petugas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label class="col-md-4">Nama Lengkap</label>
                                            <div class="col-md-8">
                                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-4">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-4">Password</label>
                                            <div class="col-md-8">
                                                <input type="text" name="password" class="form-control" placeholder="Masukan Password" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-4">Telp</label>
                                            <div class="col-md-8">
                                                <input type="number" name="telp" class="form-control" placeholder="Masukan No.Telp" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-4">Level</label>
                                            <div class="col-md-8">
                                                <select name="level" id="level" class="form-control">
                                                    <option value="">--- Pilih Level ---</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="kirim" class="btn btn-success" data-bs-dismiss="modal">Tambah Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>TELP</th>
                                <th>LEVEL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM petugas");
                            while ($data = mysqli_fetch_array($query)) { ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_petugas'] ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td><?php echo $data['telp'] ?></td>
                                    <td><?php echo $data['level'] ?></td>

                                    <td>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id_petugas'] ?>">HAPUS</a>

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="hapus<?php echo $data['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="edit_data.php" method="POST">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_petugas" class="form-control" value="<?= $data['id_petugas'] ?>">
                                                            <p>Apakah yakin akan menghapus data <br> <?php echo $data['nama_petugas'] ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="hapus_petugas" class="btn btn-danger">Hapus</button>
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