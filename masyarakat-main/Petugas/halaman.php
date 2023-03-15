<?php

if(isset($_GET['url'])){
    switch ($_GET['url']){
       

        case 'verifikasi_pengaduan':
        include 'verifikasi_pengaduan.php';
        break;

        case 'detail_pengaduan':
        include 'detail_pengaduan.php';
        break;
        
       

        default:
        echo "Halaman ini tidak ditemukan";
        break;
    }
}
    else{
        echo "Selamat Datang Di Aplikasi Pelaporan Masyarakat Disini Adalah Pusat Untuk Para Petugas Yang Akan Memverifikasi Semua Laporan Yang Sudah DI Buat Oleh Masyarakat  <br><br> " ;
        echo"Anda login sebagai: <br><br> ".$_SESSION['nama_petugas'];
 
        require '../koneksi.php';
        $sql= mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE `status`='0';");
        if($cek=mysqli_num_rows($sql)){
        ?>
        <br>
        <br>
        
         <div class="col-xl-3 col-md-9 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Pengaduan : </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-1000">Ada <?php echo $cek; ?> Laporan Dari Masyarakat</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-5x text-gray-500"></i>
                      <span class="badge badge-danger badge-counter"><?php echo $cek; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
<?php
    }
}
    
?>