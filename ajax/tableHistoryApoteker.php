<?php

require '../auth/functions.php';
$katas = $_GET["katas"];

?>

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
      <th>Tanggal Ambil</th>
      <th>Catatan</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $no=1;
    $mysqli = new mysqli($server, $userserve, $passserve, $database);

    $select_records = "SELECT * FROM pasien WHERE terima_obat='1' AND (nama LIKE '%$katas%' OR penyakit LIKE '%$katas%')";
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
      <td><?php echo $record['tanggal_ambil']; ?></td>
      <td><?php echo $record['catatan']; ?></td>
    </tr>
    <?php $no++;
    }
    ?>
  </tbody>
</table>