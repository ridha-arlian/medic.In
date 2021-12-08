<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}
require 'auth/functions.php';

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
    <link rel="stylesheet" href="css/stockObat.css">

    
    <title>Stock Obat | medic.In</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="sidebar col-sm-auto sticky-top">
          <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top">
            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
              
              <!-- HOME -->
              <li class="nav-item">
                <a href="homeApoteker.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                  <i class="bi-house fs-1"></i>
                  <h6>Home</h6>
                </a>
              </li>

              <!-- STOCK -->
              <li>
                <a href="stockApoteker.php" class="font nav-link py-3 px-2 selected" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Stock">
                  <i class="bi-folder-plus fs-1"></i>
                  <h6>Stock</h6>
                </a>
              </li>

              <!-- PASIEN -->
              <li>
                <a href="pasien.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Pasien">
                  <i class="bi-person-lines-fill fs-1"></i>
                  <h6>Pasien</h6>
                </a>
              </li>

              <!-- HISTORY -->
              <li>
                <a href="historyApoteker.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="History">
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
              
          <!-- Tabel-->
          <div class="container">
            <div class="pt-4">
              <h1>Stock Obat</h1>
            </div>
            <div class="">
              <div class="card-body">
                <div class="text-end" id="table-form">
                  <div class="d-inline-flex bd-highlight-end" id="table-form">
                    <input id="keywords" class="form-control search border border-primary text-colour-primary" style="border-radius: 7px;" type="text" placeholder="Search..">
                  </div>
                </div>
                <div id="tabels" class="table table-responsive text-center ">
                  <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Jumlah Stock</th>
                        <th>Status Obat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $no=1;
                      $mysqli = new mysqli($server, $userserve, $passserve, $database);

                      $select_records = "SELECT * FROM obat";
                      $records = $mysqli->query($select_records);

                      while($record = $records->fetch_assoc()) {
                      ?>

                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $record['nama_obat']; ?></td>
                        <td><?php echo $record['jenis']; ?></td>
                        <td><?php echo $record['jumlah']; ?></td>
                        <?php if ( $record["tersedia"] == '0' ) { ?>
                        <td class="text-danger">Tidak Tersedia</td>
                        <?php } else { ?>
                        <td class="text-success">Tersedia</td>
                        <?php } ?>

                        <td>
                          <!-- Tombol Edit -->
                          <button data-bs-target="#editStock<?php echo $record['id_obat']; ?>" type="button" class="btn text-dark me-3" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path class="clr-i-solid clr-i-solid-path-1" d="M4.22 23.2l-1.9 8.2a2.06 2.06 0 0 0 2 2.5a2.14 2.14 0 0 0 .43 0L13 32l15.84-15.78L20 7.4z" fill="currentColor"/><path class="clr-i-solid clr-i-solid-path-2" d="M33.82 8.32l-5.9-5.9a2.07 2.07 0 0 0-2.92 0L21.72 5.7l8.83 8.83l3.28-3.28a2.07 2.07 0 0 0-.01-2.93z" fill="currentColor"/></svg>
                          </button>
                          <!-- Tombol Hapus -->
                          <button data-bs-target="#deleteConfirm<?php echo $record['id_obat']; ?>" type="button" class="btn text-danger" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z" fill="currentColor"/></svg>
                          </button>
                        </td>
                      </tr>
                      <?php $no++;
                      
                      include 'modal/modal_edit.php'; 
                      include 'modal/modal_hapus.php';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Akhir tabel-->
      <?php include 'modal/modal_tambah.php'?>

      <?php include 'modal/modal_keluar.php'?>
      <!-- end content -->
              
    </div>
  </body>
  
  <!-- JavaScript Search -->
  <script src="js/scriptApoteker.js"></script>                        
  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>