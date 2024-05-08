<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Detail Pengaduan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .form-container {
        display: flex;
    }

    .form-container .left-column {
        flex: 1;
        padding-right: 20px;
    }

    .form-container .right-column {
        flex: 1;
        padding-left: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group img {
        width: 100%;
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
    }
    </style>
</head>

<body id="page-top">
    <div class="card shadow">
        <div class="card-header">
            Detail Pengaduan
        </div>
        <div class="form-group cols-sm-6">
            <a href="lihat_pengaduan.php" class="btn btn-primary btn-icon-split custom-button">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <?php
            require 'koneksi.php'; // Ubah path jika diperlukan

            // Periksa apakah parameter id tersedia di URL
            if (isset($_GET['id'])) {
                $id_pengaduan = $_GET['id'];
                $query = "SELECT * FROM pengaduan WHERE id_pengaduan = ?";
                $stmt = mysqli_prepare($koneksi, $query);
                mysqli_stmt_bind_param($stmt, "i", $id_pengaduan);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = mysqli_fetch_array($result);

                if ($data) {
            ?>
            <div class="form-container">
                <div class="left-column">
                    <div class="form-group Cols-sm-6">
                        <label>Tanggal Pengaduan</label>
                        <input type="text" name="tgl_pengaduan" value="<?php echo $data['tgl_pengaduan']; ?>"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group Cols-sm-6">
                        <label>NIK</label>
                        <input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group Cols-sm-6">
                        <label>Isi Laporan</label>
                        <textarea class="form-control" rows="7" name="isi_laporan"
                            readonly=""><?php echo $data['isi_laporan']; ?></textarea>
                    </div>
                </div>

                <div class="right-column">
                    <div class="form-group Cols-sm-6">
                        <label>Bukti Foto</label>
                        <?php 
                            // Mendapatkan nama file foto dari kolom foto dalam tabel pengaduan
                            $foto_filename = $data['foto']; 
                            
                            // Menampilkan foto jika nama file foto tidak kosong
                            if (!empty($foto_filename)) {
                                // Menampilkan foto dari folder foto
                                echo '<img src="foto/' . $foto_filename . '" alt="foto pengaduan">';
                            } else {
                                echo "Tidak ada foto yang tersedia.";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                } else {
                    echo "Data tidak ditemukan.";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "ID Pengaduan tidak valid.";
            }
            ?>
        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages -->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; ikhlas bahrudin</span>
                </div>
            </div>
        </footer>
</body>

</html>