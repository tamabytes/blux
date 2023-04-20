<?php
include 'config/koneksi.php';
if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = 'masyarakat';

    try {        
        $sql = "INSERT INTO masyarakat VALUES ('$nik','$nama', '$username', '$password', '$telp', '$level')";
        $query = mysqli_query($koneksi, $sql);
    
        if ($query) {
            echo "<script>alert('Anda berhasil registrasi!');
            window.location='index.php?page=login'</script>";
        } else {
            echo "<script>alert('Anda gagal registrasi!');
            window.location='index.php?page=registrasi'</script>";
        }
    } catch (Exception $th) {
        echo "<script>alert('" . $th->getMessage() . "');</script>";
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun di APPM!</h1>
                                </div>
                                <form action="" method="post" class="user">
                                    <div class="mb-3">
                                        <input type="number" class="form-control form-control-user" name="nik" placeholder="Masukan NIK" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukan Nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Masukan Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan Password" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control form-control-user" name="telp" placeholder="Masukan Telphone" required>
                                    </div>
                                    <button name="kirim" class="btn btn-primary btn-user btn-block">Register</button>
                                    <hr>
                                    <a href="index.php?page=login" class="btn btn-success btn-user btn-block">
                                        Sudah Punya Akun? Login disini!
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