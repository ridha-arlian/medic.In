<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!--CSS -->
    <link rel="stylesheet" href="css/sidebar.css">
    
    <title>Home | medic.In</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class=" sidebar col-sm-auto sticky-top" >
          <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top" >
            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
              
              <!-- HOME -->
              <li class="nav-item">
                <a href="homeDokter.php" class="font nav-link py-3 px-2 selected" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                  <i class="bi-house fs-1"></i>
                  <h6>Home</h6>
                </a>
              </li>

              <!-- FORM -->
              <li>
                <a href="form.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Form">
                  <i class="bi-journal-plus fs-1"></i>
                  <h6>Form</h6>
                </a>
              </li>

              <!-- STOCK -->
              <li>
                <a href="stockDokter.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Stock">
                  <i class="bi-folder-plus fs-1"></i>
                  <h6>Stock</h6>
                </a>
              </li>

              <!-- HISTORY -->
              <li>
                <a href="historyDokter.php" class="font nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="History">
                  <i class="bi-journal-check fs-1"></i>
                  <h6>History</h6>
                </a>
              </li>

              <!-- LOGOUT -->
              <li>
                <a href="#logoutConfirm" class="font nav-link py-3 px-2" title="" data-bs-toggle="modal" data-bs-placement="right" data-bs-original-title="Logout">
                  <i class="bi-box-arrow-left fs-1"></i>
                  <h6>Logout</h6>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
          <!-- content -->
          <div class="selamat container position-absolute top-50 start-50 translate-middle">
            <div class="card">
              <div class="card-body text-center text-white ">
                <h2>Selamat Datang</h2>
                <hr>
                <h1>medic.In</h1>
              </div>
            </div>
          </div>
          <!-- end content -->
        </div>
      </div>
    </div>
    <?php include 'modal/modal_keluar.php' ?>
  </body>

  <!-- Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</html>