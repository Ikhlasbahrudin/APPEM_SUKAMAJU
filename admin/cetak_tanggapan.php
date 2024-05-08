<?php 
// Mulai sesi
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cetak Tanggapan</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
</head>

<body id="page-top">

  <!-- Begin Page Content -->
  

    <!-- DataTales Example -->
    <div class="card shadow mb-4"> 

      <div class="card-body">

       
      <div style="text-align: center;">
    <h3 class="m-0 font-weight-bold text-secondary">PEMERINTAH KABUPATEN CIANJUR</h3>
    <h4 class="m-0 font-weight-bold text-secondary">DESA SUKAMAJU KEC. CIANJUR</h4>
    <h6 class="m-0 font-weight-bold text-secondary">Jalan Cianjur Kode Pos:12345</h6>
     </div>


        <br><br><hr>
        
        <div style="text-align: center;">
    <h6 class="m-0 font-weight-bold text-secondary">Laporan tanggapan</h6>
</div>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
                <tr>
                  <th>ID Tanggapan</th>
                  <th>ID Pengaduan</th>
                  <th>Tgl Tanggapan</th>
                  <th>Tanggapan</th>
                  <th>ID Petugas</th>
                </tr>
              
             
              
                <?php
                require '../koneksi.php';

                $sql = mysqli_query($koneksi, "SELECT * FROM tanggapan");

                while ($data = mysqli_fetch_array($sql)) { ?>
                  <tr>
                    <td><?php echo $data['id_tanggapan']; ?></td>
                    <td><?php echo $data['id_pengaduan']; ?></td>
                    <td><?php echo $data['tgl_tanggapan']; ?></td>
                    <td><?php echo $data['tanggapan']; ?></td>
                    <td><?php echo $data['id_petugas']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            
          </div>
          <br><br>
          <h6 class="m-0 font-weight-bold text-primary" align="right">Cianjur, <?php echo date('d M Y'); ?></h6>
          <h6 class="m-0 font-weight-bold text-primary" align="right">Petugas</h6>
          <br><br><br><br>
          <!-- Periksa apakah $_SESSION['nama'] telah di-set sebelum mencoba mengaksesnya -->
          <?php if (isset($_SESSION['nama'])) : ?>
            <h6 class="m-0 font-weight-bold text-primary" align="right"><?php echo $_SESSION['nama']; ?></h6>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->

  <!-- Bootstrap core JavaScript-->
  
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
