<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lihat Pengaduan</title>

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
    /* Custom CSS */
    .rotate-icon {
        transition: transform 0.3s ease;
    }

    .collapsed .rotate-icon {
        transform: rotate(-90deg);
    }

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="lihat_pengaduan.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-keyboard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APPEM <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="petugas.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="verifikasi_pengaduan.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Verivikasi Pengaduan</span></a>
            </li>



            <!-- Nav Item - keluar -->
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

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="page-title">Aplikasi Pengaduan Masyarakat</h1>
                                <h1 class="page-title mobile-title">APPEM</h1>
                            </div>
                        </div>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">ID</th>
                                                    <th style="width: 15%;">Tanggal Pengaduan</th>
                                                    <th style="width: 10%;">NIK</th>
                                                    <th style="width: 25%;">Isi Laporan</th>
                                                    <th style="width: 15%;">Foto</th>
                                                    <th style="width: 10%;">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
require '../koneksi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM pengaduan where status='proses'");

while ($data = mysqli_fetch_array($sql)) {
    echo '<tr>';
    echo '<td>' . $data['id_pengaduan'] . '</td>';
    echo '<td>' . $data['tgl_pengaduan'] . '</td>';
    echo '<td>' . $data['nik'] . '</td>';
    echo '<td>' . $data['isi_laporan'] . '</td>';
    
    // Menampilkan foto sebagai gambar
    echo '<td><img src="../foto/' . $data['foto'] . '" width="100" height="100"></td>';
    
    echo '<td>' . $data['status'] . '</td>';
   

   
    
}
?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ikhlas bahrudin</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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



    <script>
    // Tambahkan event listener untuk setiap elemen
    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function(event) {
            // Cari target collapse dari elemen yang diklik
            var targetCollapse = document.querySelector(navLink.getAttribute('data-target'));

            // Cek apakah collapse sedang terbuka
            var isExpanded = targetCollapse.classList.contains('show');

            // Tutup semua collapse yang terbuka
            document.querySelectorAll('.collapse.show').forEach(function(collapse) {
                collapse.classList.remove('show');
            });

            // Jika collapse tidak sedang terbuka, buka yang terkait dengan elemen yang diklik
            if (!isExpanded) {
                targetCollapse.classList.add('show');
            }
        });
    });
    </script>

</body>

</html>