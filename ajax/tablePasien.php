<?php

require '../auth/functions.php';
$katass = $_GET["katass"];

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
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no=1;
        $mysqli = new mysqli($server, $userserve, $passserve, $database);

        $select_records = "SELECT * FROM pasien WHERE nama LIKE '%$katass%' OR penyakit LIKE '%$katass%'";
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
            <td><?php echo $record['catatan']; ?></td>
            <td>
                <form method="POST" action="history.php">
                <input type="hidden" name="id_pasien" value="<?php echo $record['id_pasien']; ?>">
        
                <!-- Button Confirm -->
                <?php if ( $record["terima_obat"] == '1' ) { ?>
                <button type="submit" name="confirm" id="confirm" class="btn text-success me-3" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="40" height="40" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h12zm-1.53 4.97L10 14.44l-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l7-7a.75.75 0 0 0-1.06-1.06z" fill="currentColor"/></g></svg>
                </button>
                <?php } else { ?>
                <button type="submit" name="confirm" id="confirm" class="btn text-success me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="40" height="40" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M18 3a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h12zm-1.53 4.97L10 14.44l-2.47-2.47a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l7-7a.75.75 0 0 0-1.06-1.06z" fill="currentColor"/></g></svg>
                </button>
                <?php } ?>

                <!-- Tombol Hapus -->
                <button data-bs-target="#deletePasien<?php echo $record['id_pasien']; ?>" type="button" class="btn text-danger" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z" fill="currentColor"/></svg>
                </button>
                </form>
            </td>
            <?php $no++;

            include '../modal/modal_hapusPasien.php';

            }
            ?>
        </tr>
    </tbody>
</table>