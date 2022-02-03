
<style>
    body {
        background: linear-gradient(to bottom, #ffffff 0%, #3399ff 100%);
    }
</style>

<section class="container profile">
    <?= $this->session->flashdata('message'); ?>
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

    <?php
        $change = 3;
        $email = $user['email'];
        $max = $this->db->query("SELECT COUNT(email) AS max FROM max_img WHERE email = '$email' ")->row_array();
        $count = $max['max'];
        $total = $change - $count;
    ?>


    <div class="row">
        <div class="col-md-5 pt-4 pb-4" style="background-color: #0055aa">
            <img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="rounded-circle" style="width: 250px; height:250px;">
            <h3><?= $user['nama']; ?></h3>
            <p><?= $user['jurusan']; ?></p>
            <p class="card-text"><small class="text-muted">Terdaftar Sejak : <?= date('d F Y', $user['date_created']); ?> </small></p>
        </div>
        <div class="col-md-7 col-sm-12 right mt-5" style="justify-content: center;">
            <table class="table table-striped table-responsive-lg">
                <tbody>
                    <tr>
                        <th scope="row"><i class="fa fa-envelope"></i></th>
                        <td><?= $user['email']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fa fa-list-alt" aria-hidden="true"></i></th>
                        <td><?= $user['nim']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fa fa-graduation-cap" aria-hidden="true"></i></th>
                        <td><?= $user['angkatan']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fa fa-user"></i></th>
                        <td><?= $role['role']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="fa fa-check-square-o" aria-hidden="true"></i></th>
                        <td><?php if ($user['is_active'] == 1) { ?>
                                Aktif
                            <?php } else if ($user['is_active'] == 2) { ?>
                                Nonaktif
                            <?php } else if ($user['is_active'] == 3) { ?>
                                Butuh Validasi
                            <?php } else { ?>
                                Bukan Fasilkom
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gantinama">
                    <i class="fas fa fw fa-edit " style="color: white;">
                        Ganti Nama
                    </i>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gantigambar">
                    <i class="fas fa fw fa-picture-o " style="color: white;">
                        Ganti Gambar
                    </i>
                </button>
                <a style="text-decoration: none;" href="<?php echo site_url('profile/changepassword') ?>">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa fw fa-cog " style="color: white;">
                            Ganti Password
                        </i>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div></div>
    <div></div>
</section>

<div class="modal fade" id="gantinama" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="f_kategori" id="f_kategori" action="">
                    <input type="hidden" name="txtIdPeserta" id="txtIdPeserta" value="<?= $user['id']; ?>">
                    <div id="konfirmasi" style="z-index: 100;"></div>
                    <table class="table table-form">
                        <tr>
                            <td style="width: 25%">Nama</td>
                            <td style="width: 75%">
                                <input type="text" class="form-control" name="txtNamaPeserta" id="txtNamaPeserta" required value="<?= $user['nama']; ?>">
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white btn-info btn-bold" type="button" id="btnSimpan" name="btnSimpan">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Simpan</button>
                <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="gantigambar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>Max : 3 Kali , Sisa : <?= $total ?> kali</p>
                <?php echo form_open_multipart('profile/upload'); ?>
                <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                <input type="hidden" name="delete" id="delete" value="<?= $user['img']; ?>">
                <div id="konfirmasi"></div>
                <table class="table table-form">
                    <tr>
                        <td style="width: 25%">Ganti Gambar</td>
                        <td style="width: 75%">
                            <input type="file" class="form-control" name="img" id="img" required="">
                            <p class="text-center" style="font-size: 15px;">jpg/jpeg/png - Max 1 MB</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white btn-info btn-bold" type="submit" id="btnSimpan2" name="btnSimpan2">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Simpan</button>
                <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-minus-circle"></i> Tutup</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<script>
    $("li.profile").addClass("active");
</script>

<script>
    $(document).ready(function() {
        $('#btnSimpan').click(function() {

            $.post("<?php echo base_url(); ?>profile/add/", {
                type: 1,
                txtNamaPeserta: $('#txtNamaPeserta').val(),
                txtIdPeserta: $('#txtIdPeserta').val()

            }, function(data) {

                console.log(data);
                obj = $.parseJSON(data);

                if (obj.msg[0] == "ok") {
                    $('#konfirmasi').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                        '</div>');

                    setTimeout(function() {
                        $('#konfirmasi').html('');
                    }, 2000);

                } else {

                    $('#konfirmasi').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '   <strong>Error</strong><br/>' + obj.msg[1] +
                        '</div>');
                }

            });

        });

    });
</script>