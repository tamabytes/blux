<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="APPM - Aplikasi Pengaduan Masyarakat">
    <meta name="author" content="natainditam">
    <title>APPM - Aplikasi Pengaduan Masyarakat</title>
    <!-- Custom fonts for this template-->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.4/dataTables.bootstrap5.min.css" integrity="sha512-zY8EbjNubt5sVVeNIxLQuU6lrDn0zYpaxCtS6mBBaqQREH1ZNQLdUxhHZjPaZhrw1CbEZkNdShEbIInJxzs9dQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-primary">
    <?php
    $page = $_GET['page'] ?? "";

    switch ($page) {
        case 'login':
            include 'login.php';
            break;
        case 'registrasi':
            include 'registrasi.php';
            break;
        default:
            include 'login.php';
            break;
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script><!-- Custom scripts for all pages-->
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        $('table').attr('id', 'dataTable')
    </script>
    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="./assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>
</body>

</html>