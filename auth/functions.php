<?php

$server = "localhost";
$userserve = "root";
$passserve = "";
$database = "medic.In";

$conn = mysqli_connect($server, $userserve, $passserve, $database);

if (!$conn){
    echo "Connection Failed!!!";
}

//Fungsi untuk menambah data pada form
function tambah($data) {
    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    $nama = $data["nama"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $penyakit = $data["penyakit"];
    $obat = $data["obat"];
    $jumlah = $data["jumlah"];
    $catatan = $data["catatan"];
    $tanggal_konsul = date('Y-m-d');
    $terima_obat = 0;

    //Query Insert Data
    $query = "INSERT INTO pasien
                VALUES
                ('', '$nama', '$tanggal_lahir', '$penyakit', '$obat', '$jumlah', '$catatan', '$tanggal_konsul', '', '$terima_obat')";
    
    mysqli_query($conn, $query);

    //Query Update data sesuai jumlah yang digunakan
    $kurangi = "UPDATE obat
                SET jumlah = jumlah - '$jumlah'
                WHERE nama_obat = '$obat'";

    mysqli_query($conn, $kurangi);

    //Query tampil data obat sesuai stock
    $kosong = "UPDATE obat 
                SET tersedia = CASE
                WHEN jumlah = 0 then 0
                ELSE NULL
                END 
                WHERE nama_obat = '$obat'";

    mysqli_query($conn, $kosong);

    //Query Update value collumn table tersedia sesuai stock
    $update = "UPDATE obat
                SET tersedia = CASE
                WHEN jumlah < 1 THEN 0
                WHEN jumlah > 1 THEN 1
                ELSE NULL
                END";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}

?>