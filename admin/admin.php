<?php 
// Memeriksa apakah sesi sudah dimulai sebelumnya
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa apakah $_SESSION['nama'] sudah di-set, jika belum, pengguna belum login
if(!isset($_SESSION['nama'])) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman admin</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    @media (max-width: 768px) {
        .page-title {
            font-size: 18px;
            /* Ubah ukuran font saat layar kecil */
        }
    }
    </style>
</head>


<body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Anda belum login. Silahkan login <a href="../logout.php" class="alert-link">disini</a>.
        </div>
    </div>
</body>

</html>
<?php
    // Menghentikan eksekusi skrip
    die();
}

// Memeriksa apakah pengguna bukan admin
if($_SESSION['level'] != "admin") {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>appem</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    /* Animasi cahaya berkilat */
    @keyframes shine {
        0% {
            box-shadow: 0 0 5px 5px #ffffff;
        }

        100% {
            box-shadow: 0 0 20px 20px #ffffff;
        }
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Anda bukan admin. Halaman ini hanya dapat diakses oleh admin.
        </div>
    </div>
</body>

</html>
<?php
    // Menghentikan eksekusi skrip
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APPEM MASYARAKAT</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Favicons -->
    <link href="../logo/logo.png" rel="icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    /* Gaya untuk ukuran layar kecil */
    @media (max-width: 768px) {
        .page-title {
            font-size: 24px;
            /* Atur ukuran teks menjadi lebih kecil */
        }
    }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="" style="margin-top: 70px;">
                    <!-- Ganti 'logo.png' dengan jalur dan nama file logo Anda -->
                    <img src="../logo/logo.png" alt="Logo" style="width: 100px; height: auto; border-radius: 10px;">
                </div>

            </a>



            <hr>
            <hr>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- manage postingan-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Manage post</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">pilih:</h6>
                        <a class="collapse-item" href="manage_posts.php">manage post</a>
                        <a class="collapse-item" href="manage_berita.php">manage berita</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="verifikasi_pengaduan.php">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Verifikasi Pengaduan</span></a>
            </li>
            <ul class="nav flex-column">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Data</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">List Data:</h6>
                            <a class="collapse-item" href="lihat_petugas.php">Data Petugas</a>
                            <a class="collapse-item" href="lihat_masyarakat.php">Data Masyarakat</a>
                            <a class="collapse-item" href="lihat_laporan.php">Data Laporan</a>
                            <a class="collapse-item" href="lihat_tanggapan.php">Data Tanggapan</a>

                        </div>
                    </div>
                </li>


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">List Laporan:</h6>
                            <a class="collapse-item" href="preview_petugas.php">Laporan Petugas</a>
                            <a class="collapse-item" href="preview_masyarakat.php">Laporan Masyarakat</a>
                            <a class="collapse-item" href="preview_pengaduan.php">Laporan Pengaduan</a>
                            <a class="collapse-item" href="preview_tanggapan.php">Laporan Tanggapan</a>
                        </div>
                    </div>


            </ul>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center">
                                <h1 class="page-title">Appem</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol chat -->
                    <button type="button" class="btn btn-link"
                        onclick="window.open('/appem/chart/login.php', '_blank');">
                        <i class="fas fa-comment" style="font-size: 18px; color: blue;"></i>
                    </button>

                    <!-- Tombol untuk menampilkan modal identitas -->
                    <a href="#" class="btn btn-link text-primary mr-auto" onclick="showProfileWidget()">
                        <i class="fas fa-user fa-lg"></i>
                    </a>
                </nav>

                <!-- Modal identitas -->
                <div class="modal fade" id="profileModal" tabindex="-1" role="dialog"
                    aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="profileModalLabel">Profil Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Tempat menampilkan identitas -->
                                <p>Nama Pengguna: <span id="username" class="font-weight-bold"></span></p>
                                <p>level: <span id="level" class="font-weight-bold"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <?php include 'halaman_admin.php'; ?>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="position: relative;">
                <div class="container-fluid">

                </div>
                <!-- End of Container -->
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; ikhlas bahrudin</span>
                </div>
            </footer>

        </div>
        <!-- End of Content Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <script>
        function toggleCollapse(id) {
            var element = document.getElementById(id);
            var arrow = document.querySelector('[data-target="#' + id + '"] i');

            if (element.classList.contains("show")) {
                // Tutup accordion
                element.classList.remove("show");
                element.setAttribute("aria-expanded", "false");
                arrow.classList.remove('fa-caret-down');
                arrow.classList.add('fa-caret-right');
            } else {
                // Tutup semua accordion sebelum membuka yang baru
                var accordions = document.querySelectorAll('.collapse.show');
                accordions.forEach(function(acc) {
                    acc.classList.remove("show");
                    acc.setAttribute("aria-expanded", "false");
                    var arrow = document.querySelector('[data-target="#' + acc.id + '"] i');
                    arrow.classList.remove('fa-caret-down');
                    arrow.classList.add('fa-caret-right');
                });

                // Buka accordion yang dipilih
                element.classList.add("show");
                element.setAttribute("aria-expanded", "true");
                arrow.classList.remove('fa-caret-right');
                arrow.classList.add('fa-caret-down');
            }
        }
        </script>

</body>

</html>