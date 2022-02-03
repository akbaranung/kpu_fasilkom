      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title;?></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <section class="content">
      <div class="container-fluid">


                                          
                                    <div class="row">
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menuawal'); ?>"><button class="btn btn-primary">Menu Awal</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menupeserta'); ?>"><button class="btn btn-primary">Menu Akses Peserta</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menukandidat'); ?>"><button class="btn btn-primary">Menu Data Kandidat</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menukomentar'); ?>"><button class="btn btn-primary">Menu Data Komentar</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menureply'); ?>"><button class="btn btn-primary">Menu Data Reply</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menuinfo'); ?>"><button class="btn btn-primary">Menu Info Kandidat</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menupemilihan'); ?>"><button class="btn btn-primary">Menu Pemilihan Kandidat</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menuhasil'); ?>"><button class="btn btn-primary">Menu Hasil Pemilihan</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menucontrol/menureport'); ?>"><button class="btn btn-primary">Menu Report Hasil Pemilihan</button></a>
                                         </div>
                                    </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    </div>

                  <script>
                  $( "li.master" ).addClass( "menu-open");
                  $( "a.master" ).addClass( "active" );
                  $( "a.menucontrol" ).addClass( "active" );
                  </script>