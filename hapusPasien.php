<?php 
  require 'auth/functions.php';

    $id_pasien = $_GET["id_pasien"];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli($server, $userserve, $passserve, $database);
    
    $sql_hapus = "DELETE FROM pasien
                  WHERE id_pasien='$id_pasien'";

    $mysqli->query($sql_hapus);

    header('location: pasien.php');

?>