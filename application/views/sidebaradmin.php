<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
      <img src="<?php echo base_url('dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin KPU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 40px; height:40px">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['nama']; ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin'); ?>" class="nav-link dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="<?= base_url('message'); ?>" class="nav-link message">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pesan
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="<?= base_url('lembaga'); ?>" class="nav-link lembaga">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Lembaga
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="<?= base_url('homedesc'); ?>" class="nav-link homedesc">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home Desc
              </p>
            </a>
          </li>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu = "SELECT `menu_awal`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_awal` JOIN `menu_awal_akses`
              ON `menu_awal`.`id` = `menu_awal_akses`.`menu_id`
          WHERE `menu_awal_akses`.`role_id` = $role_id AND `menu_awal`.`is_active` = 1 AND `menu_awal_akses`.`jurusan` = '$jurusan' AND url != 'user' AND url != 'profile' AND url != 'admin'
          ORDER BY `menu_awal`.`id` ASC
           ";
          $menu = $this->db->query($queryMenu)->result_array();
          ?>

          <?php if(!$menu){?>

          <?php } else {?>
          <li class="nav-header">Master Admin Only</li>
          
          <li class="nav-item master">
            <a href="#" class="nav-link master">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Master Admin Control
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu as $m) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m['url']); ?>" class="nav-link <?= $m['url'] ?>">
                  <i class="<?= $m['icon'] ?> nav-icon"></i>
                  <p><?= $m['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>

            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu2 = "SELECT `menu_akses_peserta`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_akses_peserta` JOIN `menu_akses_peserta_akses`
              ON `menu_akses_peserta`.`id` = `menu_akses_peserta_akses`.`menu_id`
          WHERE `menu_akses_peserta_akses`.`role_id` = $role_id AND `menu_akses_peserta`.`is_active` = 1 AND `menu_akses_peserta_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_akses_peserta`.`id` ASC
          ";
          $menu2 = $this->db->query($queryMenu2)->result_array();
          ?>

          <?php if(!$menu2){?>

          <?php } else {?>
          <li class="nav-header">Peserta</li>

          <li class="nav-item peserta">
            <a href="#" class="nav-link peserta">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Peserta
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu2 as $m2) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m2['url']); ?>" class="nav-link <?= $m2['url'] ?>">
                  <i class="<?= $m2['icon'] ?> nav-icon"></i>
                  <p><?= $m2['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu3 = "SELECT `menu_data_kandidat`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_data_kandidat` JOIN `menu_data_kandidat_akses`
              ON `menu_data_kandidat`.`id` = `menu_data_kandidat_akses`.`menu_id`
          WHERE `menu_data_kandidat_akses`.`role_id` = $role_id AND `menu_data_kandidat`.`is_active` = 1 AND `menu_data_kandidat_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_data_kandidat`.`id` ASC
          ";
          $menu3 = $this->db->query($queryMenu3)->result_array();
          ?>

          <?php if(!$menu3){?>

          <?php } else {?>
          <li class="nav-header">Kandidat</li>

          <li class="nav-item kandidat">
            <a href="#" class="nav-link kandidat">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Data Kandidat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu3 as $m3) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m3['url']); ?>" class="nav-link <?= $m3['url'] ?>">
                  <i class="<?= $m3['icon'] ?> nav-icon"></i>
                  <p><?= $m3['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu4 = "SELECT `menu_data_komentar`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_data_komentar` JOIN `menu_data_komentar_akses`
              ON `menu_data_komentar`.`id` = `menu_data_komentar_akses`.`menu_id`
          WHERE `menu_data_komentar_akses`.`role_id` = $role_id AND `menu_data_komentar`.`is_active` = 1 AND `menu_data_komentar_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_data_komentar`.`id` ASC
          ";
          $menu4 = $this->db->query($queryMenu4)->result_array();
          ?>

          <?php if(!$menu4){?>

          <?php } else {?>
          <li class="nav-header">Komentar</li>
          
          <li class="nav-item komentar">
            <a href="#" class="nav-link komentar">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Data Komentar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu4 as $m4) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m4['url']); ?>" class="nav-link <?= $m4['url'] ?>">
                  <i class="<?= $m4['icon'] ?> nav-icon"></i>
                  <p><?= $m4['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu9 = "SELECT `menu_data_reply`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_data_reply` JOIN `menu_data_reply_akses`
              ON `menu_data_reply`.`id` = `menu_data_reply_akses`.`menu_id`
          WHERE `menu_data_reply_akses`.`role_id` = $role_id AND `menu_data_reply`.`is_active` = 1 AND `menu_data_reply_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_data_reply`.`id` ASC
          ";
          $menu9 = $this->db->query($queryMenu9)->result_array();
          ?>

          <?php if(!$menu9){?>

          <?php } else {?>
          <li class="nav-header">Reply</li>
          
          <li class="nav-item reply">
            <a href="#" class="nav-link reply">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                Data Reply
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu9 as $m9) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m9['url']); ?>" class="nav-link <?= $m9['url'] ?>">
                  <i class="<?= $m9['icon'] ?> nav-icon"></i>
                  <p><?= $m9['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu7 = "SELECT `menu_hasil`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_hasil` JOIN `menu_hasil_akses`
              ON `menu_hasil`.`id` = `menu_hasil_akses`.`menu_id`
          WHERE `menu_hasil_akses`.`role_id` = $role_id AND `menu_hasil`.`is_active` = 1 AND `menu_hasil_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_hasil`.`id` ASC
          ";
          $menu7 = $this->db->query($queryMenu7)->result_array();
          ?>

          <?php if(!$menu7){?>

          <?php } else {?>
          <li class="nav-header">Hasil</li>
          
          <li class="nav-item hasil">
            <a href="#" class="nav-link hasil">
              <i class="nav-icon fas fa-poll-h"></i>
              <p>
                Hasil Pemilihan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu7 as $m7) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m7['url']); ?>" class="nav-link <?= $m7['url'] ?>">
                  <i class="<?= $m7['icon'] ?> nav-icon"></i>
                  <p><?= $m7['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>



          <?php
          $role_id = $this->session->userdata('role_id');
          $jurusan = $this->session->userdata('jurusan');
          $queryMenu8 = "SELECT `menu_report`.`id`, `menu`, `url`,`icon`,`is_active`
          FROM `menu_report` JOIN `menu_report_akses`
              ON `menu_report`.`id` = `menu_report_akses`.`menu_id`
          WHERE `menu_report_akses`.`role_id` = $role_id AND `menu_report`.`is_active` = 1 AND `menu_report_akses`.`jurusan` = '$jurusan'
          ORDER BY `menu_report`.`id` ASC
          ";
          $menu8 = $this->db->query($queryMenu8)->result_array();
            ?>

          <?php if(!$menu8){?>

          <?php } else {?>
          <li class="nav-header">Report</li>
          
          <li class="nav-item report">
            <a href="#" class="nav-link report">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Report Hasil Pemilihan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php foreach($menu8 as $m8) : ?>
              <li class="nav-item">
                <a href="<?= base_url($m8['url']); ?>" class="nav-link <?= $m8['url'] ?>">
                  <i class="<?= $m8['icon'] ?> nav-icon"></i>
                  <p><?= $m8['menu'] ?></p>
                </a>
              </li>
              <?php endforeach; ?>
              
            </ul>
          </li>
          <?php } ?>


          <li class="nav-header">Switch / Logout</li>

          <li class="nav-item menu">
            <a href="<?= base_url('user'); ?>" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Switch to User
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="<?= base_url('message'); ?>" class="nav-link" data-toggle="modal" data-target="#logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>