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

// Ambil tanggal dan bulan saat ini
$current_date = date('Y-m-d'); // Format tanggal MySQL: "YYYY-MM-DD"

// Proses form jika ada yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // Tombol Upload diklik
    if(isset($_POST["submit"])) {
        $file_name = $_FILES['thumbnail']['name'];
        $file_tmp = $_FILES['thumbnail']['tmp_name'];
        $file_type = $_FILES['thumbnail']['type'];
        $file_error = $_FILES['thumbnail']['error'];
        
        // Periksa apakah file yang diunggah adalah gambar
        $allowed_extensions = array("image/jpeg", "image/jpg", "image/png", "image/gif");
        if(in_array($file_type, $allowed_extensions)) {
            // Direktori penyimpanan file
            $upload_path = "../assets/img/post/";
            // Pindahkan file ke direktori penyimpanan
            if(move_uploaded_file($file_tmp, $upload_path.$file_name)) {
                // Query untuk menyimpan data ke database
                $query = "INSERT INTO posts (title, author, category, post_date, content, thumbnail) 
                          VALUES ('$title', '$author', '$category', '$current_date', '$content', '$file_name')";
                $result = mysqli_query($koneksi, $query);
        
                // Periksa apakah query berhasil dieksekusi
                if($result) {
                    // Redirect ke halaman manage_posts.php jika sukses
                    header("Location: manage_posts.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
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
    <title>Add New Post - SB Admin 2</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Add New Post</h1>
                    <!-- Current Date -->
                    <p class="text-muted">Date: <?php echo $current_date; ?></p>
                    <!-- Add New Post Form -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
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
                                <option value="sosial">Sosial</option>
                                <option value="pembangunan">Pembangunan</option>
                                <option value="kesehatan">Kesehatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="manage_posts.php" class="btn btn-secondary">Cancel</a>
                    </form>
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