<!-- Modal Hapus -->
<div class="modal fade" id="deleteConfirm<?php echo $record['id_obat']; ?>" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 99.99%, rgba(26, 21, 21, 0) 100%);">
    <div class="modal-dialog modal-lg" style="padding-top: 6rem;">
        <div class="modal-content rounded-10" style="background-color: #3D82C1;">
            <div class="modal-body text-center">
                <div class="text-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-light mt-3">
                    <h2>Yakin ingin</h2>
                    <h2>menghapus ?</h2>                
                    <br>            
                </div>
                <button class="btn-lg btn-danger shadow-sm border-0 mt-5 mb-3" style="border-radius: 10px"><a href="hapus.php?id_obat=<?php echo $record['id_obat']; ?>" class="nav-link text-white m-0">HAPUS</a></button>
            </div>                  
        </div>
    </div>
</div>
<!-- Akhir Modal hapus -->