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
                                <a href="form.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Form">
                                    <i class="bi-journal-plus fs-1"></i>
                                    <h6>Form</h6>
                                </a>
                            </li>

                            <!-- STOCK -->
                            <li>
                                <a href="stockDokter.php" class="font nav-link py-3 px-2 selected" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Stock">
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
                        <div class="pt-4 judul">
                            <h1>Stock Obat</h1>
                        </div>
                        <div class="">
                            <div class="card-body">
                                <div class="text-end">
                                    <div class="d-inline-flex bd-highlight-end">
                                        <input id="keyword" class="form-control search border border-primary text-colour-primary" type="text" style="border-radius: 7px;" placeholder="Search..">           
                                    </div>
                                </div>
                                <div id="tabel" class="table table-responsive text-center">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis Obat</th>
                                                <th>Jumlah Stock</th>
                                                <th>Status Obat</th>
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
                                            </tr>
                                            <?php $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'modal/modal_keluar.php'?>
                <!-- end content -->
            </div>
        </div>
    </body>

  <!-- JavaScript Search -->
  <script src="js/script.js"></script>
  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>