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
    <title>Lihat Pengaduan</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="logo/logo.png" rel="icon">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - tulis pengaduan -->
            <li class="nav-item">
                <a class="nav-link tulis-pengaduan-link" href="tulis_pengaduan.php">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Tulis Pengaduan</span>
                </a>
            </li>
            <!-- Nav Item - lihat_pengaduan -->
            <li class="nav-item">
                <a class="nav-link" href="lihat_pengaduan.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Arsip Pengaduan</span>
                </a>
            </li>
            <!-- Nav Item - keluar -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'koneksi.php';
                                        // Periksa apakah variabel session 'nik' sudah diatur
                                        if (isset($_SESSION['nik'])) {
                                            $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan where nik='$_SESSION[nik]'");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                echo '<tr>';
                                                echo '<td>' . $data['id_pengaduan'] . '</td>';
                                                echo '<td>' . $data['tgl_pengaduan'] . '</td>';
                                                echo '<td>' . $data['nik'] . '</td>';
                                                echo '<td>' . $data['isi_laporan'] . '</td>';
                                                echo '<td><img src="foto/' . $data['foto'] . '" width="100" height="100"></td>';
                                                // Menentukan kelas Bootstrap berdasarkan nilai status
                                                $status_class = $data['status'] == 'Proses' ? 'text-warning' : '';
                                                // Menampilkan status dengan gaya teks yang sesuai
                                                echo '<td class="' . $status_class . '">' . $data['status'] . '</td>';
                                                echo '<td>';
                                        ?>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton_<?php echo $data['id_pengaduan']; ?>"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Pilih
                                            </button>
                                            <div class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton_<?php echo $data['id_pengaduan']; ?>">
                                                <a class="dropdown-item"
                                                    href="lihat_tanggapan.php?id=<?php echo $data['id_pengaduan']; ?>">
                                                    <i class="fas fa-eye"></i> Lihat Tanggapan
                                                </a>
                                                <a class="dropdown-item"
                                                    href="detail_pengaduan.php?id=<?php echo $data['id_pengaduan']; ?>">
                                                    <i class="fas fa-info-circle"></i> Detail
                                                </a>
                                                <a class="dropdown-item text-danger"
                                                    href="hapus_pengaduan.php?id=<?php echo $data['id_pengaduan']; ?>"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </div>
                                        </div>

                                        <?php
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            // Jika variabel session 'nik' tidak ada
                                            echo '<tr><td colspan="7">Belum ada pengaduan yang dilaporkan.</td></tr>';
                                        }
                                        ?>
                                    </tbody>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
    function showLoading() {
        // Tambahkan loading
        var loadingOverlay = document.createElement('div');
        loadingOverlay.style.position = 'fixed';
        loadingOverlay.style.top = '0';
        loadingOverlay.style.left = '0';
        loadingOverlay.style.width = '100%';
        loadingOverlay.style.height = '100%';
        loadingOverlay.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        loadingOverlay.style.zIndex = '9999';
        var loadingIcon = document.createElement('i');
        loadingIcon.classList.add('fas', 'fa-spinner', 'fa-spin');
        loadingIcon.style.position = 'absolute';
        loadingIcon.style.top = '50%';
        loadingIcon.style.left = '50%';
        loadingIcon.style.transform = 'translate(-50%, -50%)';
        loadingIcon.style.fontSize = '50px';
        loadingIcon.style.color = '#000';
        loadingOverlay.appendChild(loadingIcon);
        document.body.appendChild(loadingOverlay);
        // Tunda navigasi ke halaman baru
        setTimeout(function() {
            window.location.href = 'tulis_pengaduan.php';
        }, 1000); // Tunda selama 1 detik
    }
    document.addEventListener('DOMContentLoaded', function() {
        var tulisPengaduanLinks = document.querySelectorAll('.tulis-pengaduan-link');
        tulisPengaduanLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah navigasi langsung ke halaman baru
                showLoading(); // Memanggil fungsi showLoading() saat tautan diklik
            });
        });
    });
    </script>
</body>

</html>