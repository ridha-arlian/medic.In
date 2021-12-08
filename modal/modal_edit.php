<!-- Modal Edit -->
<div class="modal fade" id="editStock<?php echo $record['id_obat']; ?>" tabindex="-1" aria-labelledby="editStockLabel" aria-hidden="true" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 99.99%, rgba(26, 21, 21, 0) 100%);">
    <div class="modal-dialog modal-lg" style="padding-top: 1rem;">
        <div class="modal-content rounded-10" style="background-color: #3D82C1;">
            <div class="modal-body">
                <div class="text-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                    <h3 class="text-white pb-3 text-start">Edit Stock</h3>
                    <form action="edit.php" method="POST" role="form">

                        <?php 
                        $id_obat = $record['id_obat'];
                        $query = "SELECT * FROM obat WHERE id_obat='$id_obat'";
                        $obats = $mysqli->query($query);
          
                        while( $obat = $obats->fetch_assoc()) {
                        ?>

                        <input type="hidden" name="id_obat" value="<?php echo $record['id_obat']; ?>">

                        <!-- Nama Obat-->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label fs-5 text-white">Nama Obat</label>
                            <div class="col-sm-10">                            
                                <input type="text" name="namaobat" class="form-control" value="<?php echo $record['nama_obat']; ?>">
                            </div>
                        </div>
                            
                        <!-- Jenis Obat-->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label fs-5 text-white">Jenis Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="jenisobat" class="form-control"  value="<?php echo $record['jenis']; ?>">
                            </div>
                        </div>
                            
                        <!-- Jumlah Obat-->
                        <div class="mb-3 row">
                            <label for="JumlahObat" class="col-sm-2 col-form-label fs-5 text-white">Jmlah Obat</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlahobat" class="form-control" value="<?php echo $record['jumlah']; ?>">
                            </div>
                        </div>
                            
                        <!-- Status Obat-->
                        <div class="mb-3 row">
                            <label for="StatusObat" class="col-sm-2 col-form-label fs-5 text-white">Status Obat</label>
                            <div class="col-sm-10">
                                <select name="statusobat" class="form-control form-select" aria-label="default select example">
                                    <option value="1"<?php echo $obat['tersedia'] == '1'? 'selected' : ''; ?>>Tersedia</option>
                                    <option value="0" <?php echo $obat['tersedia'] == '0'? 'selected' : ''; ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                            
                        <!-- Tombol Edit -->
                        <div class="justify-content-end text-end pt-3 ">
                            <button class="btn btn-warning shadow-sm border-0 nav-link text-dark m-0" type="submit" name="btn_edit" style="border-radius: 10px;">EDIT</button>
                        </div>

                    </form>
                    <?php } ?>
                </div>
            </div>                  
        </div>
    </div>
</div>
<!-- Akhir Modal Edit -->