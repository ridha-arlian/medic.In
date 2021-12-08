<?php

require '../auth/functions.php';
$kata = $_GET["kata"];

?>

<table class="table" id="dataTable">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pasien</th>
      <th>Obat</th>
      <th>Penyakit</th>
      <th>Tanggal Konsultasi</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $no=1;
    $mysqli = new mysqli($server, $userserve, $passserve, $database);

    $select_records = "SELECT * FROM pasien WHERE tanggal_konsul IS NOT NULL AND nama LIKE '%$kata%' OR penyakit LIKE '%$kata%'";
    $records = $mysqli->query($select_records);

    while($record = $records->fetch_assoc()) {
    ?>

    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $record['nama']; ?></td>
      <td><?php echo $record['obat']; ?></td>
      <td><?php echo $record['penyakit']; ?></td>
      <td><?php echo $record['tanggal_konsul']; ?></td>
    </tr>
    <?php $no++;
    }
    ?>
  </tbody>
</table>