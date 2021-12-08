<?php

require '../auth/functions.php';
$keyword = $_GET["keyword"];

?>
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
        $select_records = "SELECT * FROM obat WHERE nama_obat LIKE '%$keyword%' OR jenis LIKE '%$keyword%'";
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