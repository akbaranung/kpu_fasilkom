  <!-- Content Wrapper. Contains page content -->
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="container-fluid">

          <div>
          <a href="<?= base_url('message/readall'); ?>"><button class="btn btn-primary">Tandai Semua Pesan Dibaca</button></a>
          <a href="<?= base_url('message/unreadall'); ?>"><button class="btn btn-warning">Tandai Semua Pesan Belum Dibaca</button></a>
          </div><br>
        
          <?= $this->session->flashdata('message'); ?>
        
            <?php foreach($komen as $p) : ?>
            <div class="row" style="border:solid black; border-width: 3px; background: linear-gradient(to top left, #33ccff 0%, #ccffff 77%);">
                <div class="col-md-12">

                    <span style="position: absolute; top: 20px; left: 15px;">
                    <img src="<?= base_url('assets/img/profile/') . $p->gambar; ?>" class="img-profile rounded-circle" width="100px" height="100px">
                    </span>

                    <div style="display: inline-block; margin-left: 100px;">

                      <span class="ml-3 d-lg-inline text-gray-600 small" >
                        <h3 style="margin-left:20px;">
                          <strong>
                          <?= $p->nama;?>

                        <?php if($p->status_akun == 'Aktif'){?>
                        <span class="fa fa-check" style="
                            color:white;
                            background-color: #1DA1F2;
                            font-size: 0.65em;
                            border-radius: 50%;
                            position: absolute;
                            top: 25px;
                            margin-left: 5px;">
                        </span>
                          <?php } else {?>

                          <?php } ?>

                          </strong>
                        </h3>
                      </span>

                      <span class="ml-3 d-lg-inline text-gray-600 small"><?= $p->nim;?></span>
                      <span class="ml-3 d-lg-inline text-gray-600 small">|</span>
                      <span class="ml-3 d-lg-inline text-gray-600 small"><?= $p->email;?></span>

                      <?php if($p->status_akun == 'Aktif'){?>

                      <?php } else {?>
                      <span class="ml-3 d-lg-inline text-gray-600 small">|</span>
                      <span class="ml-3 d-lg-inline text-gray-600 small"><?= $p->no_telpon;?></span>
                      <?php } ?><br>
                      
                      <span class="ml-3 d-lg-inline text-gray-600 small"><?= $p->jurusan;?></span>
                      <span class="ml-3 d-lg-inline text-gray-600 small">-</span>
                      <span class="ml-3 d-lg-inline text-gray-600 small"><?= $p->angkatan;?></span>

                    </div>

                    <div><br>

                        <?php if($p->status == 'Unreaded'){?>
                        <a href="" class="badge badge-warning fa fa-exclamation"  data-toggle="modal" data-target="#belumbaca<?php echo $p->id; ?>"> Belum Dibaca</a>
                        <?php } else {?>
                        <a href="" class="badge badge-primary fa fa-check" style="color:white;" data-toggle="modal" data-target="#sudahbaca<?php echo $p->id; ?>"> Sudah Dibaca</a>
                        <?php } ?>

                        <a href="" class="badge badge-info fa fa-envelope"  data-toggle="modal" data-target="#kirimemail<?php echo $p->id; ?>"> Kirim Email</a>

                        <?php if($p->status_akun == 'Aktif'){?>

                        <?php } else {?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $p->no_telpon; ?>" target="_blank" class="badge badge-success fab fa-whatsapp"> Chat Whatsapp</a>
                        <?php } ?>

                        <a href="" class="badge badge-danger fa fa-trash" data-toggle="modal" data-target="#hapuspesan<?php echo $p->id; ?>"> Hapus</a>
                    </div>

                    <hr style="border: 1px solid black;">

                    <div class="body">
                        <span><?= date('F d, Y', strtotime($p->tanggal))?></span>
                        <p class="mt-2">Pesan : <?= $p->pesan;?></p>
                    </div>

                </div>
            </div><br>

            <?php endforeach ?>

            <?= $this->pagination->create_links(); ?>

          </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


    <!-- Modal Tanda Belum Baca -->
    <?php $no = 0;
    foreach ($pesan as $p) : $no++; ?>

    <div class="modal fade" id="belumbaca<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanda Baca Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('message/baca'); ?>
                        <div class="form-group">
                            <input class="d-none" name="txtIdPesan" id="txtIdPesan" value="<?php echo $p->id; ?>">
                            <h2>Tandai Sudah Baca?</h2>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-white btn-info btn-bold" type="submit" id="btnTandaBaca" name="btnTandaBaca">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Tandai</button>
                    <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Batal</button>
                </div>
                    <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- Akhir Modal Tanda Belum Baca -->



    <!-- Modal Tanda Sudah Baca -->
    <?php $no = 0;
    foreach ($pesan as $p) : $no++; ?>

    <div class="modal fade" id="sudahbaca<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanda Baca Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('message/gajadibaca'); ?>
                        <div class="form-group">
                            <input class="d-none" name="txtIdPesan" id="txtIdPesan" value="<?php echo $p->id; ?>">
                            <h2>Tandai Belum Baca?</h2>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-white btn-info btn-bold" type="submit" id="btnTandaBaca" name="btnTandaBaca">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Tandai</button>
                    <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Batal</button>
                </div>
                    <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- Akhir Modal Tanda Sudah Baca -->



    <!-- Modal Kirim Email -->
    <?php $no = 0;
    foreach ($pesan as $p) : $no++; ?>

    <div class="modal fade" id="kirimemail<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('message/pesan'); ?>
                        <div class="form-group">
                            <input type="hidden" name="txtPesanByEmail" id="txtPesanByEmail" value="<?php echo $p->email; ?>">
                            <textarea class="form-control" name="txtPesanToEmail" id="txtPesanToEmail" rows="5" placeholder="tuliskan pesan..." required=""></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-white btn-info btn-bold" type="submit" id="btnTandaBaca" name="btnTandaBaca">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Kirim</button>
                    <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Batal</button>
                </div>
                    <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- Akhir Modal Kirim Email -->



    <!-- Modal Hapus Pesan -->
    <?php $no = 0;
    foreach ($pesan as $p) : $no++; ?>

    <div class="modal fade" id="hapuspesan<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('message/hapus'); ?>
                        <div class="form-group">
                            <input type="hidden" name="txtIdPesan" id="txtIdPesan" value="<?php echo $p->id; ?>">
                            <h2>Hapus Pesan <?php echo $p->nama; ?> ?</h2>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-white btn-info btn-bold" type="submit" id="btnTandaBaca" name="btnTandaBaca">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Hapus</button>
                    <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Batal</button>
                </div>
                    <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- Akhir Modal Hapus Pesan -->
<script>
  $(document).ready(function() {
  $( "a.message" ).addClass( "active" );
});
</script>