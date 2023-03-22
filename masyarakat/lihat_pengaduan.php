<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
  .table td,
  .table th{
    vertical-align: middle;
  }
</style>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
  </div>
  <div class="card-body" style="font-size: 14px">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include __DIR__ . './../koneksi.php';
          $sql = "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC";
          $query = mysqli_query($koneksi, $sql);
          $no = 1;
          if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_assoc($query)) {  ?>
              <tr>
                <td><?= $no++; ?></td>
                <!-- <td><?= date_format(new DateTime($data['tgl_pengaduan']), "d F Y"); ?></td> -->
                <td><img height="100" src="foto/<?= $data['foto']; ?>" alt="Foto pengaduan" srcset="foto/<?= $data['foto']; ?>"></td>
                <td>
                  <p class="text-truncate" style="max-width: 200px;"><?= $data['isi_laporan']; ?></p>
                </td>
                <td>
                  <?php
                  if ($data['status'] == '0') {
                    echo "<div class='badge badge-secondary p-2'>Menunggu</div>";
                  }elseif ($data['status'] == 'proses') {
                    echo "<div class='badge badge-warning p-2'>Proses</div>";
                  }elseif ($data['status'] == 'selesai') {
                    echo "<div class='badge badge-success p-2'>Selesai</div>";
                  } 
                  ?>
                </td>
                <td>
                  <!-- Ini tombol -->
                  <a href="masyarakat/index.php?url=detail_pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-5">
                      <i class="fa fa-info"></i>
                    </span>
                    <span class="text">Detail</span>
                  </a>

                  <!-- Ini tombol -->
                  <a href="masyarakat/index.php?url=detail_tanggapan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-5">
                      <i class="fa fa-info"></i>
                    </span>
                    <span class="text">Lihat Tanggapan</span>
                  </a>

                </td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="7">
                <p class="text-center my-2">
                  Data tidak dapat ditemukan
                </p>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>