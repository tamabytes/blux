<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang di APPM!</h1>
                                </div>
                                <form action="config/aksi_login.php" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Masukan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan Password" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-user" name="level" style="height: auto;padding: 0.75rem 1rem;">
                                            <option value="masyarakat">Login Sebagai Masyarakat</option>
                                            <option value="admin">Login Sebagai Admin</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="kirim" class="btn btn-primary btn-user btn-block">Login</button>
                                    <hr>
                                    <a href="index.php?page=registrasi" class="btn btn-success btn-user btn-block">
                                        Belum punya akun...? Silahkan daftar
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