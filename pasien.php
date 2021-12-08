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
    
    <title>Daftar Pasien | medic.In</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class=" sidebar col-sm-auto sticky-top" >
          <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top" >
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
                <a href="stockApoteker.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Stock">
                  <i class="bi-folder-plus fs-1"></i>
                  <h6>Stock</h6>
                </a>
              </li>

              <!-- PASIEN -->
              <li>
                <a href="pasien.php" class="font nav-link py-3 px-2 selected" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Pasien">
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
          
          <!-- Tabel -->
          <div class="container">
            <div class="pt-4">
              <h1>Daftar Pasien</h1>
            </div>
            <div class="">
              <div class="card-body">
                <div class="text-end">
                  <div class= "d-inline-flex bd-highlight-end">
                    <input id="katass" class="search form-control border border-primary text-colour-primary" style="border-radius: 7px;" type="text" placeholder="Search..">  
                  </div>
                </div>      
                <div id="tabless" class="table table-responsive text-center">
                  <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Penyakit</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Tanggal Konsul</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $no=1;
                      $mysqli = new mysqli($server, $userserve, $passserve, $database);

                      $select_records = "SELECT * FROM pasien";
                      $records = $mysqli->query($select_records);

                      while($record = $records->fetch_assoc()) {

                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $record['nama']; ?></td>
                        <td><?php echo $record['tanggal_lahir']; ?></td>
                        <td><?php echo $record['penyakit']; ?></td>
                        <td><?php echo $record['obat']; ?></td>
                        <td><?php echo $record['jumlah']; ?></td>
                        <td><?php echo $record['tanggal_konsul']; ?></td>
                        <td><?php echo $record['catatan']; ?></td>
                        <td>
                          <form method="POST" action="history.php">
                            <input type="hidden" name="id_pasien" value="<?php echo $record['id_pasien']; ?>">
                      
                            <!-- Button Confirm -->
                            <?php if ( $record["terima_obat"] == '1' ) { ?>
                            <button type="submit" name="confirm" id="confirm" class="btn text-success me-3" disabled>
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h12zm-1.53 4.97L10 14.44l-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l7-7a.75.75 0 0 0-1.06-1.06z" fill="currentColor"/></g></svg>
                            </button>
                            <?php } else { ?>
                            <button type="submit" name="confirm" id="confirm" class="btn text-success me-3">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h12zm-1.53 4.97L10 14.44l-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l7-7a.75.75 0 0 0-1.06-1.06z" fill="currentColor"/></g></svg>
                            </button>
                            <?php } ?>

                            <!-- Tombol Hapus -->
                            <button data-bs-target="#deletePasien<?php echo $record['id_pasien']; ?>" type="button" class="btn text-danger" data-bs-toggle="modal">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z" fill="currentColor"/></svg>
                            </button>
                          </form>
                        </td>
                      </tr>
                      <?php $no++;
                      include 'modal/modal_hapusPasien.php';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php include 'modal/modal_keluar.php'?>
          
          <!-- end content -->
              
        </div>
      </div>
    </div>
  </body>

  <!-- JavaScript Search -->
  <script src="js/scriptPasien.js"></script>                        
  
  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>