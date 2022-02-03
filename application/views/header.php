<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title><?= $title;  ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/android-icon-192x192.png');?>">
    <meta name="viewport" content="width=deviceth, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/font-awesome/4.5.0/css/font-awesome.min.css');?>">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/animate.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/slider.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/responsive.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/css/responsive.bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/repair/dataTables.bootstrap4.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/repair/dataTables.bootstrap4.min.css');?>">
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets1/js/pdfmake.min.js');?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets1/js/vfs_fonts.js');?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets2/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets2/js/loader.js');?>"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('user'); ?>">KPU</a>

            <?php if($this->session->userdata('role_id') == 1 or $this->session->userdata('role_id') == 99){?>
                <a href="<?= base_url('admin'); ?>" class="nav-link"><button class="btn btn-success">Admin</button></a>
            <?php } else {?>

            <?php } ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    

                    <li class="nav-item">
                        <a href="<?= base_url('user'); ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('profile'); ?>" class="nav-link">Profile</a>
                    </li>

                                    <?php
                                    $role_id = $this->session->userdata('role_id');
                                    $jurusan = $this->session->userdata('jurusan');
                                    $queryMenu5 = "SELECT `menu_info_kandidat`.`id`, `menu`, `url`,`icon`,`is_active`
                                      FROM `menu_info_kandidat` JOIN `menu_info_kandidat_akses`
                                        ON `menu_info_kandidat`.`id` = `menu_info_kandidat_akses`.`menu_id`
                                     WHERE `menu_info_kandidat_akses`.`role_id` = $role_id AND `menu_info_kandidat`.`is_active` = 1 AND `menu_info_kandidat_akses`.`jurusan` = '$jurusan'
                                     ORDER BY `menu_info_kandidat`.`id` ASC
                                     ";
                                     $menu5 = $this->db->query($queryMenu5)->result_array();
                                      ?>

                    <?php if(!$menu5){?>

                    <?php } else {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Info Kandidat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($menu5 as $m5) : ?>
                            <a class="dropdown-item" href="<?= base_url($m5['url']); ?>"><?= $m5['menu'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <?php } ?>



                                    <?php
                                    $role_id = $this->session->userdata('role_id');
                                    $jurusan = $this->session->userdata('jurusan');
                                    $queryMenu6 = "SELECT `menu_pemilihan`.`id`, `menu`, `url`,`icon`,`is_active`
                                      FROM `menu_pemilihan` JOIN `menu_pemilihan_akses`
                                        ON `menu_pemilihan`.`id` = `menu_pemilihan_akses`.`menu_id`
                                     WHERE `menu_pemilihan_akses`.`role_id` = $role_id AND `menu_pemilihan`.`is_active` = 1 AND `menu_pemilihan_akses`.`jurusan` = '$jurusan'
                                     ORDER BY `menu_pemilihan`.`id` ASC
                                     ";
                                     $menu6 = $this->db->query($queryMenu6)->result_array();
                                      ?>

                    <?php if(!$menu6){?>

                    <?php } else {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pemilihan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($menu6 as $m6) : ?>
                            <a class="dropdown-item" href="<?= base_url($m6['url']); ?>"><?= $m6['menu'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <?php } ?>


                    <li class="nav-item">
                        <a href="<?= base_url('contact'); ?>" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>

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