<?php

require '../auth/functions.php';
$keywords = $_GET["keywords"];

?>
<table class="table" id="dataTable">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Obat</th>
      <th>Jenis Obat</th>
      <th>Jumlah Stock</th>
      <th>Status Obat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $no=1;
    $mysqli = new mysqli($server, $userserve, $passserve, $database);

    $select_records = "SELECT * FROM obat WHERE nama_obat LIKE '%$keywords%' OR jenis LIKE '%$keywords%'";
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

      <td>
        <!-- Tombol Edit -->
        <button data-bs-target="#editStock<?php echo $record['id_obat']; ?>" type="button" class="btn text-dark me-3" data-bs-toggle="modal">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path class="clr-i-solid clr-i-solid-path-1" d="M4.22 23.2l-1.9 8.2a2.06 2.06 0 0 0 2 2.5a2.14 2.14 0 0 0 .43 0L13 32l15.84-15.78L20 7.4z" fill="currentColor"/><path class="clr-i-solid clr-i-solid-path-2" d="M33.82 8.32l-5.9-5.9a2.07 2.07 0 0 0-2.92 0L21.72 5.7l8.83 8.83l3.28-3.28a2.07 2.07 0 0 0-.01-2.93z" fill="currentColor"/></svg>
        </button>
        <!-- Tombol Hapus -->
        <button data-bs-target="#deleteConfirm<?php echo $record['id_obat']; ?>" type="button" class="btn text-danger" data-bs-toggle="modal">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z" fill="currentColor"/></svg>
        </button>
      </td>
    </tr>
    <?php $no++;
    
    include '../modal/modal_edit.php'; 
    include '../modal/modal_hapus.php';
    }
    ?>
  </tbody>
</table>