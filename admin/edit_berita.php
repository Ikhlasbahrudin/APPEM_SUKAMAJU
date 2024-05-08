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

// Inisialisasi pesan error dan ID postingan
$errorMessage = '';
$postId = '';

// Jika parameter ID postingan tidak diterima dari GET, redirect ke halaman manage_posts.php
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_berita.php");
    exit();
} else {
    $postId = $_GET['id'];
}

// Ambil data postingan dari database berdasarkan ID
$query = "SELECT * FROM berita WHERE id = '$postId'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah data postingan ditemukan
if(mysqli_num_rows($result) == 0) {
    header("Location: manage_posts.php");
    exit();
}

// Ambil data postingan dari hasil query
$post = mysqli_fetch_assoc($result);

// Jika tombol "Update" ditekan
if(isset($_POST['update'])) {
    // Ambil data yang diinput pengguna
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // Periksa apakah file gambar diupload
    if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
        // Hapus thumbnail lama dari direktori
        $oldThumbnailPath = "../assets/img/berita/" . $post['thumbnail'];
        if(file_exists($oldThumbnailPath)) {
            unlink($oldThumbnailPath);
        }

        // Upload thumbnail baru ke direktori
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
        $thumbnail_path = "../assets/img/berita/" . $thumbnail;
        move_uploaded_file($thumbnail_tmp, $thumbnail_path);
    } else {
        // Jika tidak ada file gambar yang diupload, gunakan thumbnail yang sudah ada
        $thumbnail = $post['thumbnail'];
    }

    // Update data postingan ke database
    $update_query = "UPDATE berita SET judul='$title', penulis='$author', kategori='$category', konten='$content', thumbnail='$thumbnail' WHERE id='$postId'";
    $update_result = mysqli_query($koneksi, $update_query);
    
    // Periksa apakah proses update berhasil
    if($update_result) {
        header("Location: manage_berita.php");
        exit();
    } else {
        $errorMessage = "Gagal memperbarui postingan.";
    }
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
    <title>Edit Post - SB Admin 2</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit berita</h1>

                    <!-- Edit Post Form -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="<?php echo $post['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="<?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Silahkan Pilih</option>
                                <option value="Sosial" <?php if($post['kategori'] == 'Sosial') echo 'selected'; ?>>
                                    Sosial</option>
                                <option value="Pembangunan"
                                    <?php if($post['kategori'] == 'Pembangunan') echo 'selected'; ?>>Pembangunan
                                </option>
                                <option value="Kesehatan"
                                    <?php if($post['kategori'] == 'Kesehatan') echo 'selected'; ?>>Kesehatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5"
                                required><?php echo $post['konten']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="manage_berita.php" class="btn btn-secondary">Cancel</a>
                    </form>

                    <!-- Error message -->
                    <?php if(!empty($errorMessage)): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Current Thumbnail -->
                    <div class="mt-4">
                        <h5>Current Thumbnail:</h5>
                        <img src="../assets/img/berita/<?php echo $post['thumbnail']; ?>" alt="Thumbnail"
                            style="max-width: 200px;">
                    </div>

                </div>
                <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>