<?php
// Sertakan file koneksi ke database
include('../koneksi.php');

// Pastikan session telah dimulai sebelumnya
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna telah login
if(!isset($_SESSION['nama'])) {
    header("Location: ../logout.php");
    exit();
}

// Periksa apakah pengguna bukan admin
if($_SESSION['level'] != "admin") {
    header("Location: ../admin.php");
    exit();
}

// Inisialisasi pesan error
$errorMessage = '';

// Jika tombol delete ditekan
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Ambil nama file thumbnail yang akan dihapus
    $query_select_thumbnail = "SELECT thumbnail FROM berita WHERE id = '$delete_id'";
    $result_select_thumbnail = mysqli_query($koneksi, $query_select_thumbnail);
    $row_select_thumbnail = mysqli_fetch_assoc($result_select_thumbnail);
    $thumbnail_filename = $row_select_thumbnail['thumbnail'];

    // Hapus foto thumbnail yang terkait
    $thumbnail_path = "../assets/img/berita/" . $thumbnail_filename;
    if(file_exists($thumbnail_path)) {
        unlink($thumbnail_path); // Hapus foto dari direktori
    }

    // Hapus postingan dari database
    $delete_query = "DELETE FROM berita WHERE id = '$delete_id'";
    $delete_result = mysqli_query($koneksi, $delete_query);
    if(!$delete_result) {
        $errorMessage = "Gagal menghapus postingan.";
    } else {
        header("Location: manage_berita.php"); // Redirect setelah penghapusan berhasil
        exit();
    }
}

// Query untuk mengambil semua postingan blog
$query = "SELECT * FROM berita";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manage berita</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Favicons -->
    <link href="../logo/logo.png" rel="icon">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
                            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Berita</h6>
                        </div>
                        <div class="card-body">
                            <!-- Error message -->
                            <?php if(!empty($errorMessage)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Tanggal Publikasi</th>
                                            <th>Kategori</th>
                                            <th>Thumbnail</th>
                                            <th>Konten</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
            // Periksa apakah ada postingan
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $thumbnail_path = "../assets/img/berita/" . $row['thumbnail'];
                    $thumbnail_extension = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
            ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo strlen($row['judul']) > 20 ? substr($row['judul'], 0, 29) . "..." : $row['judul']; ?>
                                            </td>
                                            <td><?php echo $row['penulis']; ?></td>
                                            <td><?php echo $row['tanggal_publikasi']; ?></td>
                                            <td><?php echo $row['kategori']; ?></td>
                                            <td>
                                                <img src="<?php echo $thumbnail_path; ?>" alt="Thumbnail"
                                                    style="max-width: 100px;"><br>
                                                <?php echo strtoupper($thumbnail_extension); ?>
                                                <!-- Tampilkan ekstensi file gambar -->
                                            </td>
                                            <td><?php echo strlen($row['konten']) > 20 ? substr($row['konten'], 0, 20) . "..." : $row['konten']; ?>
                                            </td>
                                            <td>
                                                <a href="edit_berita.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <hr>
                                                <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger"
                                                    onclick="return confirm('Yakin Ingin Menghapus')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                }
            } else {
            ?>
                                        <tr>
                                            <td colspan="8">No posts found</td>
                                        </tr>
                                        <?php
            }
            ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Add New Post Button -->
                            <a href="add_berita.php" class="btn btn-success">Add New Berita</a>
                        </div>
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