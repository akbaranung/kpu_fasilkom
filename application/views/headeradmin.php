<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title;  ?></title>

  <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/android-icon-192x192.png');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css');?>">

  <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">

  <script type="text/javascript" src="<?php echo base_url('assets2/js/jquery.min.js');?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('user'); ?>" class="nav-link btn btn-warning">User</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Pesan Baru -->
      <li class="nav-item dropdown">

        <?php
        $jumlah = $this->db->query("SELECT COUNT(pesan) AS jumlah FROM message WHERE status = 'Unreaded'")->row_array();
        ?>

        <?php
        $daftar = $this->db->query("SELECT COUNT(nim) AS jumlah FROM user WHERE is_active = 0")->row_array();
        ?>

        <?php
        $aktivasi = $this->db->query("SELECT COUNT(nim) AS jumlah FROM user WHERE is_active = 3")->row_array();
        ?>

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
            <?php if($jumlah['jumlah'] == 0 ){?>

            <?php } else {?>
              <span class="badge badge-danger navbar-badge">
              <?= $jumlah['jumlah']  ?>
              </span>
            <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <?php
          $pesan = $this->db->query("SELECT * FROM message WHERE status = 'Unreaded' ORDER BY tanggal LIMIT 5 ")->result();
          ?>

          <?php if(!$pesan){?>
            <a href="<?= base_url('message'); ?>" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title text-center">
                  Tidak ada pesan baru
                  </h3>
                </div>
              </div>
            </a>
          <?php } else {?>

          <?php foreach($pesan as $p) : ?>
          <a href="<?= base_url('message'); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url('assets/img/profile/') . $p->gambar; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle" style="width: 50px; height:50px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?= $p->nama; ?>
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?= $p->pesan; ?></p>
                <p class="text-sm text-muted"><i class="far fa-calendar mr-1"></i> <?= date('F d, Y', strtotime($p->tanggal))?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach ?>

          <?php } ?>

          <a href="<?= base_url('message'); ?>" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>
      </li>
      <!-- Pesan Baru -->


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">

        <?php
        $notifikasi = $jumlah['jumlah'] + $daftar['jumlah'] + $aktivasi['jumlah']
        ?>

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>

          <?php if($notifikasi == 0 ){?>

          <?php } else {?>
          <span class="badge badge-warning navbar-badge"><?= $notifikasi ?></span>
          <?php } ?>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <?php if($notifikasi == 0 ){?>
          <span class="dropdown-item dropdown-header">Tidak Ada Notifikasi Baru</span>
          <?php } else {?>
          <span class="dropdown-item dropdown-header"><?= $notifikasi ?> Notifikasi</span>
          <?php } ?>

          <div class="dropdown-divider"></div>

          <?php if($jumlah['jumlah'] == 0 ){?>

          <?php } else {?>
          <a href="<?= base_url('message'); ?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?= $jumlah['jumlah']  ?> Pesan Baru
          </a>
          <div class="dropdown-divider"></div>
          <?php } ?>



          <?php if($daftar['jumlah'] == 0 ){?>

          <?php } else {?>
          <a href="<?= base_url('control1'); ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> <?= $daftar['jumlah']  ?> Peserta Baru Daftar
          </a>
          <div class="dropdown-divider"></div>
          <?php } ?>



          <?php if($aktivasi['jumlah'] == 0 ){?>

          <?php } else {?>
          <a href="<?= base_url('control2'); ?>" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <?= $aktivasi['jumlah']  ?> Peserta Butuh Validasi
          </a>
          <div class="dropdown-divider"></div>
          <?php } ?>

          <span class="dropdown-item dropdown-footer">Notifikasi</span>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <h2>Apakah Anda Yakin Untuk Keluar ?</h2>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('auth/logout') ?>">
                        <button type="button" class="btn btn-primary" name="btnLogout" id="btnLogout">Logout</button>
                    </a>
                </div>
            </div>
        </div>
</div>