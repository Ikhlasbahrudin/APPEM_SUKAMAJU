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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JavaScript -->
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            Anda belum login. Silahkan login <a href="logout.php" class="alert-link">disini</a>.
        </div>
    </div>
</body>

</html>
<?php
    // Menghentikan eksekusi skrip
    die();
}

// Jika pengguna sudah login
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APPEM</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JavaScript -->
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="masyarakat.php">
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
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link tulis-pengaduan-link" href="tulis_pengaduan.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Tulis Pengaduan</span>
                </a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link lihat-pengaduan" href="lihat_pengaduan.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Arsip pengaduan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"
                        inputmode="fa fa-comments"></i>
                    </button>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center">
                                <h1 class="page-title">Appem</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol chat hanya dengan ikon -->
                    <button class="btn btn-link text-primary" data-toggle="modal" data-target="#chatModal">
                        <i class="fas fa-comment"></i>
                    </button>
                    <!-- Modal Chat -->
                    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="chatModalLabel">Chat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Tempat untuk menampilkan pesan -->
                                    <div id="chatMessages"></div>
                                    <!-- Form untuk mengirim pesan -->
                                    <form id="sendMessageForm">
                                        <div class="form-group">
                                            <textarea class="form-control" id="messageInput" rows="3"
                                                placeholder="Tulis pesan..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <p>NIK: <span id="level" class="font-weight-bold"></span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <script>
                    function showProfileWidget() {
                        // Mendapatkan nama pengguna dan level dari session
                        var username = "<?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna'; ?>";
                        var level = "<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : ''; ?>";

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
                                event
                                    .preventDefault(); // Mencegah navigasi langsung ke halaman baru
                                showLoading
                                    (); // Memanggil fungsi showLoading() saat tautan diklik
                            });
                        });
                    });
                    </script>


                </nav>
                <div class="container-fluid">
                    <?php include 'halaman_masyarakat.php'; ?>
                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="position: relative;">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; ikhlas bahrudin</span>
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
    <!-- JavaScript untuk Chat -->
    <script>

    </script>
</body>

</html>