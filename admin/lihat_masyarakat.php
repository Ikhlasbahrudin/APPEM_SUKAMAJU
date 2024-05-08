<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lihat Petugas</title>

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

            <li class="nav-item">
                <a class="nav-link" href="verifikasi_pengaduan.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Verivikasi Pengaduan</span></a>
            </li>

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
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Laporan:</h6>
                        <a class="collapse-item" href="preview_petugas.php">Laporan Petugas</a>
                        <a class="collapse-item" href="preview_masyarakat.php">Laporan Masyarakat</a>
                        <a class="collapse-item" href="preview_pengaduan.php">Laporan Pengaduan</a>
                        <a class="collapse-item" href="preview_tanggapan.php">Laporan Tanggapan</a>
                    </div>
                </div>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center">
                                <h1 class="page-title">Aplikasi Pengaduan Masyarakat</h1>
                            </div>
                        </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Masyarakat</h6>
                        </div>
                        <div class="card-body">


                            <br></br>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Telp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
require '../koneksi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM masyarakat");

while ($data = mysqli_fetch_array($sql)) { ?>
                                                <tr>
                                                    <td><?php echo $data['nik']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['username']; ?></td>
                                                    <td><?php echo $data['password']; ?></td>
                                                    <td><?php echo $data['telp']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <!-- Tautan untuk Edit -->
                                                            <a href="edit_masyarakat.php?id=<?php echo $data['nik']; ?>"
                                                                class="btn btn-primary btn-sm mr-1">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>

                                                            <!-- Tautan untuk Hapus -->
                                                            <a href="delete_masyarakat.php?nik=<?php echo $data['nik']; ?>"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin mau dihapus?')">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>

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


</body>

</html>