<?php
session_start();
if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}
require 'auth/functions.php';

if( isset($_POST["submit"] )){
  if( tambah($_POST) >= 0) { ?>
  <script>
    alert('Data berhasil ditambahkan');
  </script>
  </div> 
    <?php
    } else { ?>
    <script>
      alert('Data tidak valid');
    </script>
  </div> <?php
  }
}

$pilihan = mysqli_query($conn, "SELECT * FROM obat WHERE tersedia='1'");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <!--CSS -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/form.css">
    
    <title>Data Pasien | medic.In</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class=" sidebar col-sm-auto sticky-top" >
          <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top" >
            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
              
              <!-- HOME -->
              <li class="nav-item">
                <a href="homeDokter.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                  <i class="bi-house fs-1"></i>
                  <h6>Home</h6>
                </a>
              </li>

              <!-- FORM -->
              <li>
                <a href="form.php" class="font nav-link py-3 px-2 selected" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Form">
                  <i class="bi-journal-plus fs-1"></i>
                  <h6>Form</h6>
                </a>
              </li>

              <!-- STOCK -->
              <li>
                <a href="stockDokter.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Stock">
                  <i class="bi-folder-plus fs-1"></i>
                  <h6>Stock</h6>
                </a>
              </li>

              <!-- HISTORY -->
              <li>
                <a href="historyDokter.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="History">
                  <i class="bi-journal-check fs-1"></i>
                  <h6>History</h6>
                </a>
              </li>

              <!-- LOGOUT -->
              <li>
                <a href="#logoutConfirm" class="font nav-link py-3 px-2" title="" data-bs-toggle="modal" data-bs-placement="right" data-bs-original-title="Logout">
                  <i class="bi-box-arrow-left fs-1"></i>
                  <h6>Logout</h6>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
          <!-- content -->
          <div class="container">
            <div class="pt-4 judul row">
              <h1>Data Pasien</h1>
            </div>
          </div>
          <div class="container border-2 rounded bg-white ">
            <div class="card-body bg-white">
              <form action="" method="post">
                
                <!-- Nama Pasien -->
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Pasien</label>
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>

                <!-- Tanggal Lahit -->
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>

                <!-- Penyakit -->
                <div class="mb-3">
                  <label for="penyakit" class="form-label">Penyakit</label>
                  <input type="text" class="form-control" name="penyakit" id="penyakit" required>
                </div>

                <!-- Obat yang diperlukan -->
                <div class="row mb-3">
                  <div class="col-8">
                    <label for="obat" class="form-label">Obat yang Diperlukan</label>
                    <select type="text" class="form-control" name="obat" id="obat" required>
                      <option disabled selected> Pilih </option>
                      <?php while( $row = mysqli_fetch_assoc($pilihan)) : ?>
                      <option value="<?= $row["nama_obat"]; ?>"><?= $row["nama_obat"]; ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>

                  <!-- Jumlah Obat -->
                  <div class="col">
                    <label for="jumlah" class="form-label">Jumlah Obat</label>
                    <input type="number" min="1" class="form-control" name="jumlah" id="jumlah" required>
                  </div>
                </div>

                <!-- Catatan -->
                <div class="mb-3">
                  <label for="catatan" class="form-label">Catatan (optional)</label>
                  <input type="text" class="form-control" name="catatan" id="catatan">
                </div>

                <!-- Tombol Kirim -->
                <div class="pt-2 d-md-flex justify-content-md-end">
                  <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                </div>
              </form>
            </div>
          </div>
            <?php include 'modal/modal_keluar.php'?>
          <!-- end content -->
        </div>
      </div>
    </div>
  </body>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>