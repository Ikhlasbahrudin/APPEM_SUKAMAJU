<?php

if (isset($_GET['url'])) {
    $url = $_GET['url'];

    switch ($url) {
        case 'verifikasi_pengaduan':
            include 'verifikasi_pengaduan.php';
            break;
        case 'detail_pengaduan':
            include 'detail_pengaduan.php';
            break;
    }
} else {
?>

<!-- Kode HTML tetap berada di luar blok PHP -->
<?php if (isset($_GET['url'])) : ?>
<!-- Include file berdasarkan URL -->
<?php include $_GET['url'] . '.php'; ?>
<?php else : ?>
<!-- Tampilkan data pengaduan jika tidak ada parameter URL -->

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
<?php endif; ?>

<?php
    require '../koneksi.php';
    $sql_belum_proses = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'");
    $cek_belum_proses = mysqli_num_rows($sql_belum_proses);

    $sql_proses = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
    $cek_proses = mysqli_num_rows($sql_proses);

    $sql_selesai = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='selesai'");
    $cek_selesai = mysqli_num_rows($sql_selesai);

    if ($cek_belum_proses || $cek_proses || $cek_selesai) {
?>
<div class="row justify-content-center">
    <?php if ($cek_belum_proses) : ?>
    <div class="col-xl-4 col-md-6 mb-4" onclick="window.location.href='belum_diproses.php';"
        style="cursor: pointer; transform-origin: center; transition: transform 0.2s;">
        <div class="card border-left-danger shadow h-100 py-2" onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                    </div>
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Belum Diproses :
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cek_belum_proses; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($cek_proses) : ?>
    <div class="col-xl-4 col-md-6 mb-4" onclick="window.location.href='lihat_proses.php';"
        style="cursor: pointer; transform-origin: center; transition: transform 0.2s;">
        <div class="card border-left-warning shadow h-100 py-2" onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-hourglass-half fa-2x text-warning"></i>
                    </div>
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Sedang Diproses :
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cek_proses; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($cek_selesai) : ?>
    <div class="col-xl-4 col-md-6 mb-4" onclick="window.location.href='proses_selesai.php';"
        style="cursor: pointer; transform-origin: center; transition: transform 0.2s;">
        <div class="card border-left-success shadow h-100 py-2" onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Selesai Diproses :
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cek_selesai; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

</div>
<?php
    }
}

?>