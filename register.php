<?php 
if (isset($_POST['submit'])) {
  $nik        = $_POST['nik'];
  $nama       = $_POST['nama'];
  $username   = $_POST['username'];
  $password   = $_POST['password'];
  $telp       = $_POST['telp'];

  try {
    
    include "koneksi.php";
    $sql = "INSERT INTO masyarakat(nik, nama, username, password, telp) VALUES('$nik', '$nama', '$username', '$password', '$telp')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
      echo "<script>alert('Anda Berhasil Mendaftar.');window.location.assign('index.php');</script>";
    } else {
      echo "<script>alert('Anda Gagal Mendaftar');window.location.assign('register.php');</script>";
    }
  } catch (Exception $th) {
    echo "<script>alert('Anda Gagal Mendaftar');window.location.assign('register.php');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once __DIR__ . "./template-part/meta.php" ?>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Masukan Biodata Untuk Mendaftar di APPM</h1>
                  </div>
                  <form method="post" action="" class="user">
                    <div class="form-group">
                      <input name="nik" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan NIK..." required>
                    </div>
                    <div class="form-group">
                      <input name="nama" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Nama..." required>
                    </div>
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username..." required>
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password..." required>
                    </div>
                    <div class="form-group">
                      <input name="telp" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Telpon..." required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                      Register
                    </button>
                    <hr>
                    <a href="index.php" class="btn btn-success btn-user btn-block">
                      Sudah punya akun...? Silahkan Login
                    </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  </div>

</body>

</html>