<?php
require '../koneksi.php';

// Periksa apakah parameter 'id' sudah diset dalam URL
if(isset($_GET['id'])) {
    // Melakukan sanitasi terhadap ID untuk mencegah serangan SQL injection
    $id = mysqli_real_escape_string($koneksi, $_GET['id']); 

    // Ambil nama file foto terkait pengaduan
    $query_foto = mysqli_query($koneksi, "SELECT foto FROM pengaduan WHERE id_pengaduan = '$id'");
    $foto = mysqli_fetch_assoc($query_foto);
    $nama_file = $foto['foto'];

    // Persiapkan query untuk menghapus data
    $sql = "DELETE FROM pengaduan WHERE id_pengaduan='$id'";
    
    // Jalankan query untuk menghapus data
    if (mysqli_query($koneksi, $sql)) {
        // Jika query berhasil, hapus juga foto terkait
        $file_path = "../foto/" . $nama_file;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus foto dari direktori
        }

        // Redirect ke lihat_laporan.php
        echo "<script>
                alert('Data Berhasil Dihapus');
                window.location='lihat_laporan.php';
              </script>";
        exit(); // Hentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika terjadi kesalahan pada query, tampilkan pesan error
        echo "<script>
                alert('Error: " . mysqli_error($koneksi) . "');
                window.location='lihat_laporan.php';
              </script>";
        exit(); // Hentikan eksekusi script setelah melakukan redirect
    }
} else {
    // Jika parameter 'id' tidak diset, redirect ke lihat_laporan.php
    header('Location: lihat_laporan.php');
    exit(); // Hentikan eksekusi script setelah melakukan redirect
}