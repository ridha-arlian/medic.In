<?php
require 'auth/functions.php';

if (isset($_POST['confirm'])){
    date_default_timezone_set('Asia/Jakarta');
    $id_pasien = $_POST['id_pasien'];
    $date = date('Y-m-d');

    $terima_obat = mysqli_query($conn, "UPDATE pasien SET terima_obat = '1' WHERE id_pasien = '$id_pasien'");
    $ubah_data = mysqli_query($conn, "UPDATE pasien SET tanggal_ambil = '$date' WHERE terima_obat = '1'");

    header('Location: pasien.php');
}