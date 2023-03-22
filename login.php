<?php
session_start();
if (isset($_POST['submit'])) {

  $username   = $_POST['username'];
  $password   = $_POST['password'];

  include "koneksi.php";
  $sql    = "SELECT * FROM `petugas` WHERE `username`='$username' AND `password`='$password'";
  $query  = mysqli_query($koneksi, $sql);

  if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['nama'] = $data['nama_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    if ($data['level'] == "admin") {
      header("Location: admin/index.php");
    } elseif ($data['level'] == "petugas") {
      header("Location: petugas/index.php");
    }
  } else {
    echo "<script>alert('Maaf anda gagal login'); window.location.assign('index.php'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once  __DIR__ . "./template-part/meta.php"; ?>

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
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Aplikasi Pengaduan Masyarakat! Login Petugas / Admin</h1>
                  </div>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password..." required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <a href="index.php" class="btn btn-success btn-user btn-block">
                      Login sebagai akun...? Masyarakat
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