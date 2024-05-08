<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    switch ($url) {
        // Kasus-kasus lainnya...
        case 'preview_tanggapan':
            include 'preview_tanggapan.php';
            break;
        case 'preview_pengaduan':
            include 'preview_pengaduan.php';
            break;
        case 'lihat_laporan':
            include 'lihat_laporan.php';
            break;
        case 'delete_laporan':
            include 'delete_laporan.php';
            break;
        case 'lihat_tanggapan':
            include 'lihat_tanggapan.php';
            break;
        case 'delete_pengaduan':
            include 'delete_pengaduan.php';
            break;
            case 'manage_posts':
                include 'manage_posts.php';
                break;
                case 'edit_posts':
                    include 'edit_posts.php.php';
                    break;
                    case 'manage_berita':
                        include 'manage_berita.php';
                        break;
                        case 'edit_berita':
                            include 'edit_berita.php';
                            break;
                            case 'add_berita':
                                include 'add_berita.php';
                                break;
         
        
    }
} else {
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-sm-center text-md-left" style="font-size: 20px;">Selamat Datang Di Aplikasi Pengaduan
                Masyarakat</h4>
            <p class="text-sm-center text-md-left" style="font-size: 14px;">Desa Sukamaju</p>
            <!-- Jam Digital -->
            <div class="text-left" style="font-size: 18px;">
                <div id="digital-clock" style="font-size: 18px;"></div>
                <div id="date-info" style="font-size: 14px;"></div>
            </div>
            <hr>
            <p class="text-sm-center text-md-left" style="font-size: 16px;">Anda login sebagai :
                <strong><?php echo $_SESSION['nama']; ?></strong>
            </p>
        </div>
    </div>
</div>

<!-- Script JavaScript untuk menampilkan jam digital -->
<script>
function showProfileWidget() {
    // Mendapatkan nama pengguna dan level dari session
    var username = "<?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna'; ?>";
    var level = "<?php echo isset($_SESSION['level']) ? $_SESSION['level'] : ''; ?>";

    // Menampilkan identitas pengguna dalam modal
    document.getElementById("username").textContent = username;
    document.getElementById("level").textContent = level;

    // Menampilkan modal
    $('#profileModal').modal('show');
}

// Fungsi untuk memperbarui jam digital dan tanggal setiap detik
function updateClock() {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var seconds = now.getSeconds().toString().padStart(2, '0');
    var timeString = hours + ':' + minutes + ':' + seconds;
    document.getElementById('digital-clock').textContent = timeString;

    var days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
    ];
    var day = days[now.getDay()];
    var month = months[now.getMonth()];
    var date = now.getDate();
    var year = now.getFullYear();
    var dateString = day + ', ' + month + ' ' + date + ', ' + year;
    document.getElementById('date-info').textContent = dateString;
}

// Panggil fungsi updateClock setiap detik
setInterval(updateClock, 1000);
</script>

<?php
    require '../koneksi.php';

    // Mengambil jumlah laporan yang statusnya 'proses'
    $sql_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
    $jumlah_pengaduan = mysqli_num_rows($sql_pengaduan);

    // Mengambil jumlah tanggapan
    $sql_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan");
    $jumlah_tanggapan = mysqli_num_rows($sql_tanggapan);

    // Mengambil jumlah data masyarakat
    $sql_masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat");
    $jumlah_masyarakat = mysqli_num_rows($sql_masyarakat);

    // Mengambil jumlah data petugas
    $sql_petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
    $jumlah_petugas = mysqli_num_rows($sql_petugas);

    if ($jumlah_pengaduan > 0 || $jumlah_tanggapan > 0 || $jumlah_masyarakat > 0 || $jumlah_petugas > 0) {
?>
<br>
<br>
<style>
.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}

/* Menghilangkan garis bawah pada tautan saat diklik */
a:active,
a:focus {
    text-decoration: none;
}
</style>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <a href="verifikasi_pengaduan.php">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Laporan Pengaduan :
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $jumlah_pengaduan; ?>
                                Laporan yang belum ditanggapi</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-4x text-gray-300"></i>
                            <span class="badge badge-danger badge-counter"><?php echo $jumlah_pengaduan; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <a href="lihat_tanggapan.php">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tanggapan :
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $jumlah_tanggapan; ?>
                                Tanggapan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-reply fa-4x text-gray-300"></i>
                            <span class="badge badge-success badge-counter"><?php echo $jumlah_tanggapan; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <a href="lihat_masyarakat.php">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Masyarakat :
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $jumlah_masyarakat; ?>
                                Data Masyarakat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-4x text-gray-300"></i>
                            <span class="badge badge-info badge-counter"><?php echo $jumlah_masyarakat; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <a href="lihat_petugas.php">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Petugas :
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $jumlah_petugas; ?>
                                Data Petugas</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-4x text-gray-300"></i>
                            <span class="badge badge-warning badge-counter"><?php echo $jumlah_petugas; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<?php
    } else {
        echo "Belum ada pengaduan, tanggapan, data masyarakat, atau data petugas.";
    }
}
?>