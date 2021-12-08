<!--Modal Tambah-->
<div class="modal fade" id="exampleModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 99.99%, rgba(26, 21, 21, 0) 100%);">
  <div class="modal-dialog modal-lg" style="padding-top: 6rem;">
    <div class="modal-content rounded-10" style="background-color: #3D82C1;">
      <div class="modal-body">
        <div class="text-end">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container">
          <h3 class="text-white pb-3">Tambah Stock</h3>

          <form action="tambah.php" method="POST" role="form">

            <!-- Nama Obat -->
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label fs-5 text-white">Nama Obat</label>
              <div class="col-sm-10">
                <input type="text" name="namaobat" class="form-control" required>
              </div>
            </div>

            <!-- Jenis Obat -->
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label fs-5 text-white">Jenis Obat</label>
              <div class="col-sm-10">
                <input type="text" name="jenisobat" class="form-control" required>
              </div>
            </div>

            <!-- Jumlah Obat -->
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label fs-5 text-white">Jmlah Obat</label>
              <div class="col-sm-10">
                <input type="text" name="jumlahobat" class="form-control" onkeypress="return hanyaAngka(event)" required>       
              </div>
              <script>
                function hanyaAngka(event){
                  var angka = (event.which) ? event.which : event.keyCode
                  if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)){
                    return false;
                  }
                  return true;
                }
              </script>
            </div>

            <!-- Status Obat -->
            <div class="mb-3 row" >
              <label class="col-sm-2 col-form-label fs-5 text-white">Status Obat</label>
              <div class="col-sm-10">
                <select name="statusobat"class="form-control form-select" aria-label="default select example">
                  <option selected disabled >Pilih Kategori</option>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>             
              </div>
            </div>

            <!-- Tombol Tambah -->
            <div class="justify-content-end text-end pt-3">
              <button type="submit" name="btn_tambah" class="btn btn-success shadow-sm border-0 nav-link text-white m-0" style="border-radius: 10px">TAMBAH</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah -->