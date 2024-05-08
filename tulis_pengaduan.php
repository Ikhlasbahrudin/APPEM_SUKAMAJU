<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tulis Pengaduan</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="logo/logo.png" rel="icon">

    <style>
    @media (max-width: 576px) {
        .btn-text {
            display: none;
        }
    }

    @media (min-width: 577px) {
        .btn-icon {
            display: none;
        }
    }
    </style>
</head>

<body id="page-top">

    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>Tulis Pengaduan</span>

                <button type="button" class="btn btn-secondary cancel-link" onclick="location.href='masyarakat.php';">
                    <i class="fas fa-fw fa-times"></i> Cancel
                </button>
            </div>
        </div>

        <div class="card-body">
            <form action="simpan_pengaduan.php" method="post" class="form-horizontal" enctype="multipart/form-data"
                id="pengaduanForm" onsubmit="return validateForm()">
                <div class="form-group Cols-sm-6">
                    <label>Tanggal Pengaduan</label>
                    <input type="text" name="tgl_pengaduan" value="<?php echo date('d/m/Y');?>" class="form-control"
                        readonly>
                </div>
                <?php
                // Pastikan sesi sudah dimulai
                session_start();

                // Periksa apakah session 'nik' sudah diatur
                $nik = isset($_SESSION['nik']) ? $_SESSION['nik'] : '';
                ?>
                <div class="form-group Cols-sm-6">
                    <label>NIK</label>
                    <input type="text" name="nik" value="<?php echo $nik; ?>" class="form-control" readonly>
                </div>
                <div class="form-group Cols-sm-6">
                    <label>Tulis Laporan</label>
                    <textarea class="form-control" rows="7" name="isi_laporan" id="isi_laporan"></textarea>
                </div>
                <div class="form-group Cols-sm-6">
                    <label>Unggah Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile"
                                aria-describedby="inputGroupFileAddon" name="foto" onchange="updateFileName(this)">
                            <label class="custom-file-label" for="inputGroupFile">Pilih file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon"><i
                                    class="fas fa-upload"
                                    onclick="document.getElementById('inputGroupFile').click();"></i></button>
                        </div>
                    </div>
                    <p style="color: blue">*Anda dapat mengunggah file gambar dengan tipe apa saja.</p>
                </div>

                <script>
                function updateFileName(input) {
                    var fileName = input.files[0].name;
                    var label = input.parentElement.querySelector('.custom-file-label');
                    if (fileName.length > 10) {
                        label.innerHTML = '...' + fileName.substring(fileName.length - 10);
                    } else {
                        label.innerHTML = fileName;
                    }
                }

                function validateForm() {
                    var laporan = document.getElementById("isi_laporan").value;
                    var foto = document.getElementById("inputGroupFile").value;
                    var lat = document.getElementById("lat").value;
                    var long = document.getElementById("long").value;

                    if (laporan.trim() == '') {
                        alert("Tulis laporan tidak boleh kosong");
                        return false;
                    }

                    if (foto.trim() == '') {
                        alert("Unggah foto tidak boleh kosong");
                        return false;
                    }

                    if (lat.trim() == '' || long.trim() == '') {
                        alert("Anda belum menambahkan lokasi. Klik tombol Tambah Lokasi untuk menambahkan lokasi.");
                        return false;
                    }

                    return true;
                }
                </script>

                <div class="form-group Cols-sm-6">
                    <label>Long</label>
                    <input type="text" name="long" id="long" class="form-control" readonly>
                </div>
                <div class="form-group Cols-sm-6">
                    <label>Lat</label>
                    <input type="text" name="lat" id="lat" class="form-control" readonly>
                </div>
                <!-- Tombol -->
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-warning btn-text" onclick="getLocation()">
                            <i class="fas fa-fw fa-map-marker-alt"></i> Tambah Lokasi
                        </button>
                        <button type="submit" class="btn btn-success btn-text mr-2">
                            <i class="fas fa-fw fa-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-danger btn-text">
                            <i class="fas fa-fw fa-eraser"></i> Hapus
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-warning btn-icon" onclick="getLocation()">
                            <i class="fas fa-fw fa-map-marker-alt"></i>
                        </button>
                        <button type="submit" class="btn btn-success btn-icon mr-2">
                            <i class="fas fa-fw fa-save"></i>
                        </button>
                        <button type="reset" class="btn btn-danger btn-icon mr-2">
                            <i class="fas fa-fw fa-eraser"></i>
                        </button>
                    </div>
                </div>
                <!-- End Tombol -->

            </form>
        </div>
    </div>

    <script>
    // Fungsi untuk mendapatkan lokasi pengguna
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                document.getElementById("long").value = longitude;
                document.getElementById("lat").value = latitude;
            });
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }
    }
    </script>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
</body>

</html>