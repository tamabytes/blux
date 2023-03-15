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
                      <th>Tgl Pengaduan</th>
                      <th>NIK</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tgl Pengaduan</th>
                      <th>NIK</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    $sql = ("SELECT*FROM pengaduan WHERE status='0'");
                    $query = mysqli_query($koneksi, $sql);
                    $no = 1;
                    while ($data=mysqli_fetch_array($query)){  ?>
                    <tr>
                      <td><?= $no++;?></td>
                      <td><?= $data['tgl_pengaduan'];?></td>
                      <td><?= $data['nik'];?></td>
                      <td><?= $data['isi_laporan'];?></td>
                      <td><?= $data['foto'];?></td>
                      <td><?= $data['status'];?></td>
                      <td>
                        <!-- Ini tombol -->
                      <a href="?url=detail_pengaduan&id=<?= $data['id_pengaduan']?>" class="btn btn-info btn-icon-split">
                      <span class="icon text-white-5">
                         <i class="fas fa-check"></i>
                      </span>
                      <span class="text">Detail&Verifikasi</span>
                      </a>

            

                      </td>
                    </tr>
                    <?php } ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

       
                    