  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Total Peserta</h1>
            <?= $this->session->flashdata('message'); ?>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta -->
    <section class="content" style="padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row">



          <!-- Total Peserta -->
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php
                $total = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE role_id != 1 AND role_id != 99")->row_array();
                ?>

                <h3><?= $total['total']; ?></h3>
                <p>Peserta Terdaftar</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Total Peserta -->



          <!-- Total Peserta TI -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <?php
                $totalti = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $totalti['total']; ?></h3>
                <p>Teknik Informatika</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="<?= base_url('control3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Total Peserta TI -->



          <!-- Total Peserta SI -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <?php
                $totalsi = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $totalsi['total']; ?></h3>
                <p>Sistem Informasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="<?= base_url('control3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Total Peserta SI -->



          <!-- Total Peserta Bodong Diluar Fasilkom -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $nositi = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE is_active = 4 ")->row_array();
                ?>

                <h3><?= $nositi['total']; ?></h3>
                <p>Diluar Fasilkom</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control4'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Total Peserta Bodong Diluar Fasilkom -->



        </div>
      </div>
    </section>
    <!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta --><!-- Total Peserta -->





    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Teknik Informatika</h1>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI -->
    <section class="content" style="padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row">



          <!-- Total TI -->
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <?php
                $totalti = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $totalti['total']; ?></h3>
                <p>Peserta TI</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>
          <!-- Total TI -->




          <!-- TI Aktif -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php
                $tiaktif = $this->db->query("SELECT COUNT('nim') AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 1 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $tiaktif['total']; ?></h3>
                <p>Peserta Aktif</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- TI Aktif -->



          <!-- TI Butuh Validasi -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <?php
                $tivalid = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 3 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $tivalid['total']; ?></h3>
                <p>Butuh Validasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control2'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- TI Butuh Validasi -->




          <!-- TI Baru Daftar -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php
                $tidaftar = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 0 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $tidaftar['total']; ?></h3>
                <p>Baru Daftar</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control1'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- TI Baru Daftar -->



          <!-- TI Nonaktif -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $tinonaktif = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 2 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $tinonaktif['total']; ?></h3>
                <p>Nonaktif</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control5'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- TI Nonaktif -->



          <!-- TI Belom Milih DPM -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $tinodpm = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 1 AND role_id != 1 AND role_id != 99 AND NOT EXISTS (SELECT * FROM hp_kdpm WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $tinodpm['total']; ?></h3>
                <p>Belum Memilih Kandidat DPM</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- TI Belom Milih DPM -->



          <!-- TI Belom Milih BEM -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $tinobem = $this->db->query("SELECT  COUNT(nim) AS total FROM user WHERE jurusan = 'Teknik Informatika' AND is_active = 1 AND role_id != 1 AND role_id != 99 AND NOT EXISTS (SELECT * FROM hp_kbem WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $tinobem['total'] ?></h3>
                <p>Belum Memilih Kandidat BEM</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- TI Belom Milih BEM -->



          <!-- TI Belom Milih HiMTI -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $tinohimti = $this->db->query("SELECT  COUNT(nim) AS total FROM user WHERE is_active = 1 AND role_id != 1 AND role_id != 99 AND jurusan = 'Teknik Informatika' AND NOT EXISTS (SELECT * FROM hp_khti WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $tinohimti['total']; ?></h3>
                <p>Belum Memilih Kandidat HiMTI</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- TI Belom Milih HiMTI -->



        </div>
      </div>
    </section>
    <!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI --><!-- Peserta TI -->





    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sistem Informasi</h1>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI -->
    <section class="content" style="padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row">



          <!-- Total SI -->
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <?php
                $totalsi = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $totalsi['total']; ?></h3>
                <p>Peserta SI</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>
          <!-- Total SI -->



          <!-- SI Aktif -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <?php
                $siaktif = $this->db->query("SELECT COUNT('nim') AS total FROM user WHERE jurusan = 'Sistem Informasi' AND is_active = 1 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $siaktif['total']; ?></h3>
                <p>Peserta Aktif</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- SI Aktif -->



          <!-- SI Butuh Validasi -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php
                $sivalid = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Siste Informasi' AND is_active = 3 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $sivalid['total']; ?></h3>
                <p>Butuh Validasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control2'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- SI Butuh Validasi -->



          <!-- SI Baru Daftar -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php
                $sidaftar = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND is_active = 0 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>

                <h3><?= $sidaftar['total']; ?></h3>
                <p>Baru Daftar</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control1'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- SI Baru Daftar -->



          <!-- SI Nonaktif -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $sinonaktif = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND is_active = 2 AND role_id != 1 AND role_id != 99 ")->row_array();
                ?>
                
                <h3><?= $sinonaktif['total']; ?></h3>
                <p>Nonaktif</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?= base_url('control5'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- SI Nonaktif -->



          <!-- SI Belom Milih DPM -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $sinodpm = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND is_active = 1 AND role_id != 1 AND role_id != 99 AND NOT EXISTS (SELECT * FROM hp_kdpm WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $sinodpm['total']; ?></h3>
                <p>Belum Memilih Kandidat DPM</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- SI Belom Milih DPM -->



          <!-- SI Belom Milih BEM -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $sinobem = $this->db->query("SELECT  COUNT(nim) AS total FROM user WHERE jurusan = 'Sistem Informasi' AND is_active = 1 AND role_id != 1 AND role_id != 99 AND NOT EXISTS (SELECT * FROM hp_kbem WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $sinobem['total']; ?></h3>
                <p>Belum Memilih Kandidat BEM</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- SI Belom Milih BEM -->



          <!-- SI Belom Milih Himsisfo -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php
                $sinohimsisfo = $this->db->query("SELECT COUNT(nim) AS total FROM user WHERE is_active = 1 AND role_id != 1 AND role_id != 99 AND jurusan = 'Sistem Informasi' AND NOT EXISTS (SELECT * FROM hp_khsi WHERE nim_pemilih = nim)")->row_array();
                ?>

                <h3><?= $sinohimsisfo['total']; ?></h3>
                <p>Belum Memilih Kandidat Himsisfo</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- SI Belom Milih Himsisfo -->


        </div>

        <?php 
            $check = $this->session->userdata('role_id');
        ?>

        <?php if ($check == 99) {?>

          <button class="btn btn-success mb-3" id="showMight">Show Your Might</button>

          <div class="d-none" id="yourMight">

            <a href="<?= base_url('admin/deact'); ?>"><button class="btn btn-danger">Deactivate</button></a>
            <a href="<?= base_url('admin/act'); ?>"><button class="btn btn-info">Activate</button></a>
            <button class="btn btn-warning" id="ban">Ban Ip</button>
            <button class="btn btn-success" id="hide">Hide</button>

            <div class="col-lg-6 d-none" id="banIp">
            <br>
              <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/ban'); ?>">
                <label>IP Address</label>
                <input type="text" class="form-control mb-2" name="ip" required>
                <button type="submit" class="btn btn-primary">Ban</button>
              </form>
            </div>

          </div>

        <?php } else {?>
        <?php } ?>

      </div>
    </section>
    <!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI --><!-- Peserta SI -->



  </div>

<script>
  $(document).ready(function() {
    $( "a.dashboard" ).addClass( "active" );
  });

  $('#ban').click(function () {
    $('#banIp').toggleClass('d-none');
  });

  $('#showMight').click(function () {
    $('#yourMight').removeClass('d-none');
    $('#showMight').addClass('d-none');
  });

  $('#hide').click(function () {
    $('#yourMight').addClass('d-none');
    $('#showMight').removeClass('d-none');
  });

</script>