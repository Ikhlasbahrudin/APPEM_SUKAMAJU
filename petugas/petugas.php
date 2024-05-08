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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Anda belum login</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
if($_SESSION['level'] != "petugas") {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Anda bukan admin</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

    <title>APPEM </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JavaScript -->
    <link href="../logo/logo.png" rel="icon">


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    /* Custom CSS */
    .page-title {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 50px;
        font-size: 3rem;
    }

    @media (max-width: 576px) {
        .page-title {
            font-size: 2rem;
            display: none;
            /* Menyembunyikan judul pada perangkat seluler */
        }

        .mobile-title {
            display: block;
            /* Menampilkan judul alternatif untuk perangkat seluler */
        }
    }

    @media (min-width: 577px) {
        .mobile-title {
            display: none;
            /* Menyembunyikan judul alternatif pada perangkat desktop */
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
                <a class="nav-link" href="petugas.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>



            <!-- Nav Item - Utilities Collapse Menu -->



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="verifikasi_pengaduan.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Verivikasi Pengaduan</span></a>
            </li>

            <!-- Nav Item - Tables -->

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

                    <!-- Tombol chat hanya dengan ikon -->
                    <button type="button" class="btn" onclick="window.open('/appem/chart/login.php', '_blank');"
                        style="background: none; border: none;">
                        <i class="fas fa-comment" style="font-size: 18px; color: blue;"></i>
                    </button>


                    <!-- Tombol untuk menampilkan modal identitas -->
                    <a href="#" class="btn btn-link text-primary" onclick="showProfileWidget()">
                        <i class="fas fa-user fa-lg"></i>
                    </a>


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
                                    <p>Level: <span id="level" class="font-weight-bold"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    function showProfileWidget() {
                        // Mendapatkan nama pengguna dan level dari session
                        var username = "<?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna'; ?>";
                        var level = "<?php echo isset($_SESSION['level']) ? $_SESSION['level'] : ''; ?>";

                        // Menampilkan identitas pengguna dalam modal
                        document.getElementById("username").textContent = username;
                        document.getElementById("level").textContent = level;

                        // Menampilkan modal
                        $('#profileModal').modal('show');
                    }
                    </script>

                    <script>
                    // Fungsi untuk logout otomatis setelah satu jam
                    $(document).ready(function() {
                        var idleTime = 0;
                        var idleInterval = setInterval(timerIncrement, 60000); // 1 menit = 60000 milidetik

                        // Mengatur tindakan logout otomatis setelah satu jam
                        function timerIncrement() {
                            idleTime++;
                            if (idleTime > 60) { // Satu jam = 60 menit
                                window.location.href = '../logout.php'; // Redirect ke halaman logout
                            }
                        }

                        // Reset waktu idle ketika terjadi aktivitas
                        $(this).mousemove(function(e) {
                            idleTime = 0;
                        });
                        $(this).keypress(function(e) {
                            idleTime = 0;
                        });
                    });
                    </script>


                </nav>

                <div class="container-fluid">
                    <?php include 'halaman_petugas.php'; ?>
                </div>

            </div>

            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white" style="position: relative;">


            <div class="copyright text-center my-auto">
                <span>Copyright &copy; ikhlas bahrudin</span>
            </div>

        </footer>

        <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->

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


</body>

</html>