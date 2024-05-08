<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoomable Cards</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
    /* Tambahkan CSS untuk efek zoom */
    .card:hover {
        transform: scale(1.1);
        transition: transform 0.2s;
    }
    </style>
</head>

<body>
    <?php 
    // Lanjutkan dengan logika PHP Anda di sini
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Pastikan untuk memulai sesi jika belum dimulai
    }

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
    
        switch ($url) {
            case 'tulis_pengaduan':
                include 'tulis_pengaduan.php';
                break;
    
            case 'lihat_pengaduan':
                include 'lihat_pengaduan.php';
                break;
    
            case 'detail_pengaduan':
                include 'detail_pengaduan.php';
                break;
    
            case 'lihat_tanggapan':
                include 'lihat_tanggapan.php';
                break;
                
            case 'belum_diproses':
                include 'belum_diproses.php';
                break;
    
            case 'lihat_proses':
                include 'lihat_proses.php'; 
                break;
    
            case 'proses_selesai':
                include 'proses_selesai.php'; 
                break;

                case 'hapus_pengaduan':
                    include 'hapus_pengaduan.php'; 
                    break;
                    case 'chat_server':
                        include 'chat_server.php'; 
                        break;

    
            default:
                echo "Halaman tidak ditemukan";
                break;
        }
    } else {
        // Tambahkan kode di sini jika URL tidak diberikan
    
    
        require 'koneksi.php'; // Perbaikan path require di sini

        // Ambil informasi dari session
        $nik = $_SESSION['nik'];
        $nama = $_SESSION['nama'];

        // Query untuk mengambil data pengaduan sesuai dengan session nama dan status '0'
        $sql_status_0 = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0' AND nik='$nik'");
        $cek_status_0 = mysqli_num_rows($sql_status_0);

        // Query untuk mengambil data pengaduan sesuai dengan session nama dan status 'proses'
        $sql_proses = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses' AND nik='$nik'");
        $cek_proses = mysqli_num_rows($sql_proses);

        // Query untuk mengambil data pengaduan sesuai dengan session nama dan status 'selesai'
        $sql_selesai = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='selesai' AND nik='$nik'");
        $cek_selesai = mysqli_num_rows($sql_selesai);
    }
    ?>

    <!-- Kode HTML tetap berada di luar blok PHP -->
    <?php if (isset($_GET['url'])) : ?>
    <!-- Include file berdasarkan URL -->
    <?php include $_GET['url'] . '.php'; ?>
    <?php else : ?>
    <!-- Tampilkan data pengaduan jika tidak ada parameter URL -->
    <div class="container">
        <p>Anda login sebagai : <strong><?php echo $_SESSION['nama']; ?></strong></p>
    </div>

    <!-- Tampilkan jam digital dan judul aplikasi -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Jam Digital -->
                <div class="text-left" style="font-size: 18px;">
                    <div id="digital-clock" style="font-size: 18px;"></div>
                    <div id="date-info" style="font-size: 14px;"></div>
                </div>
                <h4 class="text-sm-center text-md-left" style="font-size: 20px;">Selamat Datang Di Aplikasi Pengaduan
                    Masyarakat</h4>
                <p class="text-sm-center text-md-left" style="font-size: 14px;">Desa Sukamaju</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2"
                    onclick="window.location.href='belum_diproses.php';">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="far fa-folder-open fa-2x text-info"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Laporan pengaduan (Status '0'):
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $cek_status_0; ?>
                                    Pengaduan Kamu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <?php if ($cek_proses) : ?>
                <!-- Tampilkan pengaduan dengan status 'proses' -->
                <div class="card border-left-warning shadow h-100 py-2"
                    onclick="window.location.href='lihat_proses.php';">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-hourglass-half fa-2x text-warning"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Laporan pengaduan (Status 'Proses'):
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $cek_proses; ?>
                                    Laporan dengan status 'Proses'</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-md-4 mb-4">
                <?php if ($cek_selesai) : ?>
                <!-- Tampilkan pengaduan dengan status 'selesai' -->
                <div class="card border-left-success shadow h-100 py-2"
                    onclick="window.location.href='proses_selesai.php';">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Laporan pengaduan (Status 'Selesai')
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $cek_selesai; ?>
                                    Laporan yang kamu adukan telah diselesaikan</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php endif; ?>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Panggil fungsi updateClock setiap detik -->
    <script>
    // Fungsi untuk memperbarui jam digital dan tanggal setiap detik
    function updateClock() {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        var timeString = hours + ':' + minutes + ':' + seconds;
        document.getElementById('digital-clock').textContent = timeString;

        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];
        var day = days[now.getDay()];
        var month = months[now.getMonth()];
        var date = now.getDate();
        var year = now.getFullYear();
        var dateString = day + ', ' + date + ' ' + month + ' ' + year;
        document.getElementById('date-info').textContent = dateString;
    }
    // Panggil fungsi updateClock setiap detik
    setInterval(updateClock, 1000);
    </script>
</body>

</html>