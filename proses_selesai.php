<?php
// Mulai sesi di awal kode
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APPEM</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="logo/logo.png" rel="icon">
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
                    <img src="logo/logo.png" alt="Logo" style="width: 100px; height: auto; border-radius: 10px;">
                </div>

            </a>

            <hr>
            <hr>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="masyarakat.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



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

                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-8">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>NIK</th>
                                            <th>Isi Laporan</th>
                                            <th>Foto</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <?php 
// Periksa apakah variabel session 'nik' sudah diatur
if (isset($_SESSION['nik'])) {
    require 'koneksi.php'; // Sertakan file koneksi.php

    $nik = $_SESSION['nik'];

    // Query untuk mengambil pengaduan yang sesuai dengan session 'nik'
    $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nik' AND status='selesai'");

    // Periksa apakah ada pengaduan yang ditemukan
    if (mysqli_num_rows($sql) > 0) {
        while ($data = mysqli_fetch_array($sql)) {
            echo '<tr>';
            echo '<td>' . $data['id_pengaduan'] . '</td>';
            echo '<td>' . $data['tgl_pengaduan'] . '</td>';
            echo '<td>' . $data['nik'] . '</td>';
            echo '<td>' . $data['isi_laporan'] . '</td>';
            
            // Menentukan jalur lengkap untuk gambar
            $foto_path = 'foto/' . $data['foto'];

            // Memeriksa apakah file gambar ada
            if (file_exists($foto_path)) {
                // Mendapatkan jenis MIME file gambar
                $foto_mime = mime_content_type($foto_path);

                // Menampilkan gambar berdasarkan jenis file
                if (strpos($foto_mime, 'image') === 0) {
                    // Menampilkan foto sebagai gambar jika itu adalah file gambar
                    echo '<td><img src="' . $foto_path . '" width="100" height="100"></td>';
                } else {
                    // Menampilkan nama file jika itu bukan file gambar
                    echo '<td>' . $data['foto'] . '</td>';
                }
            } else {
                // Menampilkan pesan jika file gambar tidak ditemukan
                echo '<td>Gambar tidak ditemukan</td>';
            }

            // Menampilkan status dengan gaya teks yang sesuai
            echo '<td>' . $data['status'] . '</td>';
            echo '</tr>';
        }
    } else {
        // Jika tidak ada pengaduan yang sesuai dengan session 'nik'
        echo '<tr><td colspan="6">Belum ada pengaduan yang dilaporkan.</td></tr>';
    }
} else {
    // Jika variabel session 'nik' tidak ada
    echo '<tr><td colspan="6">Sesi tidak diatur. Silakan login terlebih dahulu.</td></tr>';
}
?>


                                </table>
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
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
</body>

</html>