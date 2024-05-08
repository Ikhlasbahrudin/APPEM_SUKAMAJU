<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lihat Tanggapan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-JNL8u0w2w5+roBeNwdzNCB4Pb9GJpbwq5th+ncaZwGPOk/WAymCblvXwe5sQC9op" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Lihat Tanggapan
            </div>
            <div class="form-group cols-sm-6">
                <a href="lihat_pengaduan.php" class="btn btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>

            </div>
            <div class="card-body">
                <?php
                require 'koneksi.php';

                // Periksa apakah parameter id tersedia di URL
                if (isset($_GET['id'])) {
                    $id_pengaduan = $_GET['id'];

                    // Query untuk mengambil data pengaduan dan tanggapan sesuai dengan id_pengaduan
                    $query = "SELECT * FROM pengaduan LEFT JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE pengaduan.id_pengaduan = ?";
                    $stmt = mysqli_prepare($koneksi, $query);
                    mysqli_stmt_bind_param($stmt, "i", $id_pengaduan);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    // Periksa apakah pengaduan dengan id tersebut ada dalam database
                    if (mysqli_num_rows($result) > 0) {
                        $data = mysqli_fetch_assoc($result);

                        // Periksa status pengaduan
                        $status = "";
                        $status_color = "";
                        switch ($data['status']) {
                            case '0':
                                $status = "<strong class='text-warning'>Belum diproses</strong>";
                                break;
                            case 'proses':
                                $status = "<strong class='text-primary'>Sedang diproses</strong>";
                                break;
                            case 'selesai':
                                $status = "<strong class='text-success'>Selesai</strong>";
                                break;
                            default:
                                $status = "<strong class='text-danger'>Tidak diketahui</strong>";
                                break;
                        }

                        // Tampilkan informasi pengaduan
                        ?>
                <div class="form-container">
                    <div class="left-column">
                        <div class="form-group Cols-sm-6">
                            <label>Tanggal Tanggapan</label>
                            <input type="text" name="tgl_pengaduan" value="<?php echo $data['tgl_tanggapan']; ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group Cols-sm-6">
                            <label>Laporan Anda</label>
                            <textarea class="form-control" rows="7" name="isi_laporan"
                                readonly=""><?php echo $data['isi_laporan']; ?></textarea>
                        </div>
                        <div class="form-group Cols-sm-6">
                            <label>Tanggapan</label>
                            <textarea class="form-control" rows="7" name="isi_laporan"
                                readonly=""><?php echo $data['tanggapan']; ?></textarea>
                        </div>
                        <div class="form-group Cols-sm-6">
                            <label>Status Pengaduan</label>
                            <?php echo $status; ?>
                        </div>
                    </div>
                </div>
                <?php
                    } else {
                        // Jika pengaduan tidak ditemukan
                        echo '<div class="alert alert-danger" role="alert">';
                        echo 'Pengaduan tidak ditemukan.';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ikhlas bahrudin</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>