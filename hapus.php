<?php 
  require 'auth/functions.php';

    $id_obat = $_GET["id_obat"];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli($server, $userserve, $passserve, $database);
    
    $sql_hapus = "DELETE FROM obat
                  WHERE id_obat='$id_obat'";

    $mysqli->query($sql_hapus);

    header('location: stockApoteker.php');

?>