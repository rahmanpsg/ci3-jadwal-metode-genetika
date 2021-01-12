<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url('assets/img/logo/logo.png'); ?>">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Jadwal Kuliah FT UM-Pare</div> -->
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/'); ?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Master Data
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/matakuliah'); ?>">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Matakuliah</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dosen/datadosen'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Dosen</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/programstudi'); ?>">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Program Studi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/ruangan'); ?>">
          <i class="fas fa-fw fa-building"></i>
          <span>Ruangan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/kelas'); ?>">
          <i class="fas fa-fw fa-braille"></i>
          <span>Kelas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('admin/waktu#'); ?>" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-clock"></i>
          <span>Waktu</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaturan Waktu</h6>
            <a class="collapse-item" href="<?php echo base_url('admin/waktu/jam'); ?>">Jam</a>
            <a class="collapse-item" href="<?php echo base_url('admin/waktu/hari'); ?>">Hari</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/pengampu'); ?>">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Pengampu</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Proses
      </div>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/buatjadwal'); ?>">
          <i class="fas fa-fw fa-random"></i>
          <span>Buat Jadwal</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="text-white"><b>Jadwal Kuliah FT UM-Pare</b></div>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png'); ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('nama'); ?> </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a> -->
                <a class="dropdown-item" href="<?php echo base_url('logout') ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
