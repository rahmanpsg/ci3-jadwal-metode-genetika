<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/img/logo/logo.png'); ?>" rel="icon">
  <title>Jadwal Kuliah Fakultas Teknik</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Dosen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totaldosen; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Matakuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalmk; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-wpforms fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Ruangan</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalruang; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Program Studi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalprodi; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> 

            <div class="col-xl-12 col-lg-7">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <h1>SELAMAT DATANG DI SISTEM INFORMASI JADWAL KULIAH FAKULTAS TEKNIK UNIVERSITAS MUHAMMADIYAH PAREPARE</h1>
                </div>
              </div>
            </div>

          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <?php $this->load->view('admin/footer'); ?>
</body>

</html>