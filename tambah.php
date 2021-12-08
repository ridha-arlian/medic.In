<?php
  require 'auth/functions.php';

  if( isset($_POST['btn_tambah'])) {
    $nama_obat = $_POST['namaobat'];
    $jenis_obat = $_POST['jenisobat'];
    $jumlah_obat = $_POST['jumlahobat'];
    $status_obat = $_POST['statusobat'];
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli($server, $userserve, $passserve, $database);

    $sql_tambah = "INSERT INTO obat (
                    nama_obat,
                    jenis,
                    jumlah,
                    tersedia
                  ) 
                
                 VALUES(
                    '$nama_obat',
                    '$jenis_obat',
                    '$jumlah_obat',
                    '$status_obat'
                  )";
  
    $mysqli->query($sql_tambah);

    header('location: stockApoteker.php');
  }

?>