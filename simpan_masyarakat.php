<?php
require 'koneksi.php';

// Fungsi untuk menampilkan pesan
function showMessage($type, $message) {
    echo '<div id="message" class="alert alert-' . $type . ' text-center position-fixed" role="alert">
    <div class="container">
        <div class="alert-icon">
            <i class="fas fa-' . ($type == "success" ? "check" : "exclamation") . '-circle"></i>
        </div>
        <div class="alert-message">
            <strong class="alert-heading">' . ucfirst($type) . '!</strong>
            <p class="mb-0">' . $message . '</p>
        </div>
    </div>
</div>

<script type="text/javascript">
setTimeout(function() {
    window.location = "' . ($type == "success" ? "home.php" : "register.php") . '";
}, 5000); // Pengalihan halaman setelah 5 detik
</script>';
}

// Periksa apakah semua kolom telah diisi
if(empty($_POST['nik']) || empty($_POST['nama']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['telp'])) {
    showMessage("warning", "Semua kolom harus diisi. Harap lengkapi semua kolom.");
} else {
    // Jika semua kolom telah diisi, lanjutkan penyimpanan data
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $telp = $_POST['telp'];

    // Periksa apakah data dengan NIK yang sama sudah ada dalam database
    $sql_cek = "SELECT * FROM masyarakat WHERE nik = '$nik'";
    $result = $koneksi->query($sql_cek);
    if ($result->num_rows > 0) {
        showMessage("warning", "Data dengan NIK tersebut sudah ada dalam database. Harap gunakan NIK yang berbeda.");
    } else {
        // Jika data dengan NIK yang sama belum ada, lakukan penyisipan data
        $sql = "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES ('$nik', '$nama', '$user', '$pass', '$telp')";

        // Eksekusi query
        if ($koneksi->query($sql) === TRUE) {
            showMessage("success", "Data berhasil disimpan. Silahkan gunakan untuk login.");
        } else {
            // Tampilkan pesan kesalahan jika query gagal
            showMessage("warning", "Terjadi kesalahan saat menyimpan data. Silahkan coba lagi.");
        }
    }
}
?>

<style>
.alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 400px;
}

.alert-icon {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}

.alert-message {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-warning {
    background-color: #fff3cd;
    color: #856404;
}

.alert-heading {
    font-weight: bold;
}
</style>