    <!-- Kandidat -->
    <section class="kandidat" id="kandidat">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/komponen/pkhti.css'); ?>">
        <div class="effect-wrap">
            <div class="effect effect-1"></div>
            <div class="effect effect-1-1"></div>
            <div class="effect effect-2">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="effect effect-2-1">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <!-- <div class="effect effect-3"></div> -->
            <div class="effect effect-4"></div>
        </div>
        <div class="container">
            <h2 class="title">Pemilihan Kanditat <strong>HiMTI</strong></h2>
            <div class="row mt-3">

                <?php foreach ($kandidat as $k) : ?>
                    <div class="col-lg-4 mt-3 card">
                        <div class="kartu">
                            <div class="imgBx">
                                <img src="<?php echo base_url() . '/kandidat/HiMTI/' . $k->img; ?>">
                            </div>
                            <div class="contentBx">
                                <h3><?= $k->no_urut; ?>. <?= $k->nama; ?></h3>
                                <h2 class="price">Kandidat HiMTI</h2>
                                <a href="" class="buy" data-toggle="modal" data-target="#modalkandidat<?php echo $k->id; ?>">Pilih</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>
    <!-- Akhir Kandidat -->


    <!-- Modal -->
    <?php $no = 0;
    foreach ($kandidat as $k) : $no++; ?>
        <div class="modal fade" id="modalkandidat<?php echo $k->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="effect-wrap">
                        <div class="effect effect-1"></div>
                        <div class="effect effect-1-1"></div>
                        <div class="effect effect-2">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="effect effect-2-1">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemilihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="konfirmasi<?php echo $k->id; ?>"></div>
                        <img src="<?php echo base_url() . '/kandidat/HiMTI/' . $k->img; ?>" class="rounded-circle" style="width: 250px; height:250px;">
                        <p class="mt-3"><b>Apakah anda yakin ingin memilih <?= $k->nama; ?>??</b></p>
                        <form>
                            <input type="hidden" name="txtKodePemilih" id="txtKodePemilih" value="<?= $user['id']; ?> ">
                            <input type="hidden" name="txtNamaPemilih" id="txtNamaPemilih" value="<?= $user['nama']; ?> ">
                            <input type="hidden" name="txtNimPemilih" id="txtNimPemilih" value="<?= $user['nim']; ?> ">
                            <input type="hidden" name="txtEmailPemilih" id="txtEmailPemilih" value="<?= $user['email']; ?> ">
                            <input type="hidden" name="txtIdKandidat<?php echo $k->id; ?>" id="txtIdKandidat<?php echo $k->id; ?>" value="<?= $k->id; ?> ">
                            <input type="hidden" name="txtNamaKandidat<?php echo $k->id; ?>" id="txtNamaKandidat<?php echo $k->id; ?>" value="<?= $k->nama; ?> ">
                            <input type="hidden" name="txtNoUrutKandidat<?php echo $k->id; ?>" id="txtNoUrutKandidat<?php echo $k->id; ?>" value="<?= $k->no_urut; ?> ">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" name="btnSimpan<?php echo $k->id; ?>" id="btnSimpan<?php echo $k->id; ?>">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Akhir Modal -->

    <?php $no = 0;
    foreach ($kandidat as $k) : $no++; ?>

        <script>
            $(document).ready(function() {
                $('#btnSimpan<?php echo $k->id; ?>').click(function() {

                    $.post("<?php echo base_url(); ?>pkhti/add/", {
                        type: 1,
                        txtKodePemilih: $('#txtKodePemilih').val(),
                        txtNamaPemilih: $('#txtNamaPemilih').val(),
                        txtNimPemilih: $('#txtNimPemilih').val(),
                        txtEmailPemilih: $('#txtEmailPemilih').val(),
                        txtIdKandidat: $('#txtIdKandidat<?php echo $k->id; ?>').val(),
                        txtNamaKandidat: $('#txtNamaKandidat<?php echo $k->id; ?>').val(),
                        txtNoUrutKandidat: $('#txtNoUrutKandidat<?php echo $k->id; ?>').val()

                    }, function(data) {

                        console.log(data);
                        obj = $.parseJSON(data);

                        if (obj.msg[0] == "repeat") {
                            $('#konfirmasi<?php echo $k->id; ?>').html(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '   <strong>Error</strong><br/>' + obj.msg[1] +
                                '</div>');
                            setTimeout(function() {
                                $('#konfirmasi<?php echo $k->id; ?>').html('');
                            }, 3000);

                        } else if (obj.msg[0] == "ok") {
                            $('#konfirmasi<?php echo $k->id; ?>').html(
                                '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                                '</div>');

                            setTimeout(function() {
                                $('#konfirmasi<?php echo $k->id; ?>').html('');
                            }, 2000);

                            setInterval('location.reload()', 2000);

                        } else {

                            $('#konfirmasi<?php echo $k->id; ?>').html(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '   <strong>Error</strong><br/>' + obj.msg[1] +
                                '</div>');
                        }


                    });

                });


            });
        </script>

    <?php endforeach; ?>