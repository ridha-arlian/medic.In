<?php
  require 'auth/functions.php';

  if( isset($_POST['btn_edit'])) {
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['namaobat'];
    $jenis_obat = $_POST['jenisobat'];
    $jumlah_obat = $_POST['jumlahobat'];
    $status_obat = $_POST['statusobat'];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli($server, $userserve, $passserve, $database);
    
    $sql_edit = "UPDATE obat SET 
                  nama_obat='$nama_obat',
                  jenis='$jenis_obat',
                  jumlah='$jumlah_obat',
                  tersedia='$status_obat'
                WHERE id_obat='$id_obat'";

    $mysqli->query($sql_edit);

    header('location: stockApoteker.php');

  }
?>