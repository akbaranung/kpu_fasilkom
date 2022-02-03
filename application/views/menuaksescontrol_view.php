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
                                               <br><a href="<?= base_url('menuaksescontrol/menuawalakses'); ?>"><button class="btn btn-primary">Menu Awal Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menupesertaakses'); ?>"><button class="btn btn-primary">Menu Akses Peserta Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menukandidatakses'); ?>"><button class="btn btn-primary">Menu Data Kandidat Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menukomentarakses'); ?>"><button class="btn btn-primary">Menu Data Komentar Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menureplyakses'); ?>"><button class="btn btn-primary">Menu Data Reply Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menuinfoakses'); ?>"><button class="btn btn-primary">Menu Info Kandidat Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menupemilihanakses'); ?>"><button class="btn btn-primary">Menu Pemilihan Kandidat Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menuhasilakses'); ?>"><button class="btn btn-primary">Menu Hasil Pemilihan Akses</button></a>
                                         </div>
                                         <div class="col-lg-3">
                                               <br><a href="<?= base_url('menuaksescontrol/menureportakses'); ?>"><button class="btn btn-primary">Menu Report Hasil Pemilihan Akses</button></a>
                                         </div>
                                    </div><!-- /.row -->

</div><!-- /.container-fluid -->
    </section>
    </div>
<!-- Hapus Modal -->
<script>
$( "li.master" ).addClass( "menu-open");
$( "a.master" ).addClass( "active" );
$( "a.menuaksescontrol" ).addClass( "active" );
</script>