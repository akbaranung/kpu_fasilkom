<!-- Detail Kandidat -->
<section class="detail-kandidat">
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
    <div class="container card">
        <div class="row">
            <div class="col-md-5 pt-4 pb-4"">
                    <img src=" <?= base_url('kandidat/') . $kandidat . $userk['img']; ?>" class="rounded-circle img-kandidat" style="width: 250px; height:250px;">
                <h3 style="text-align: center;" class="mt-5"><?= $userk['nama']; ?></h3>
            </div>
            <div class="col-md-7 right mt-5">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Calon Kandidat</th>
                            <td><?= $calon; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">No. Urut</th>
                            <td><?= $userk['no_urut']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Slogan</th>
                            <td><?= $userk['slogan']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Visi</th>
                            <td><?= $userk['visi']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Misi</i></th>
                            <td><?= $userk['misi']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Detail Kandidat -->

<!-- Show Komentar -->
<section class="show-komentar">

    <?php foreach ($komen as $km) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo base_url() . '/assets/img/profile/' . $km->gambar; ?>" class="img-profile rounded-circle" width="70px">
                    <span class="ml-3 d-lg-inline text-gray-600 small"><?php echo $km->nama_pengomentar; ?></span>
                    <div class=" head mt-3">
                        <span class="badge badge-primary">KPU</span>
                        <a href="" class="badge badge-success" data-toggle="modal" data-target="#reply<?php echo $km->id; ?>">Balas</a>

                        <?php
                        $id = $km->id;
                        $nim = $this->session->userdata('nim');
                        $cek = $this->db->query("SELECT * FROM $cekkomen WHERE id = $id AND nim_pengomentar = '$nim'")->row_array();
                        ?>

                        <?php if (!$cek) { ?>

                        <?php } else { ?>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapuskomen<?php echo $km->id; ?>">Hapus</a>
                        <?php } ?>

                    </div>
                    <hr style="border: 1px solid black;">
                    <div class="body">
                        <span><?php echo $km->tanggal; ?></span>
                        <p class="mt-2"><?php echo $km->komentar; ?>.</p>
                    </div>
                </div>
            </div>

            <?php
            $id = $km->id;

            $balasan = $this->db->get_where($reply, ['id_komentar' => $id])->result();
            ?>

            <?php if (!$balasan) { ?>

            <?php } else { ?>

                <?php
                $jumlah = $this->db->query("SELECT COUNT(balasan) AS jumlah FROM $reply WHERE id_komentar = $id")->row_array();
                ?>

                <a href="" class="txt-primary mt-5 showreply<?php echo $km->id; ?>" href onclick="return false;" style="text-decoration: none;" id="showreply<?php echo $km->id; ?>">show <?php echo $jumlah['jumlah'] ?> reply</a>

                <a href="" class="txt-primary mt-5 hidereply<?php echo $km->id; ?> d-none" href onclick="return false;" style="text-decoration: none;" id="hidereply<?php echo $km->id; ?>">hide <?php echo $jumlah['jumlah'] ?> reply</a>

                <?php foreach ($balasan as $b) : ?>
                    <div class="row balasan d-none takterlihat<?php echo $km->id; ?>">
                        <div class="col-md-12">
                            <img src="<?php echo base_url() . '/assets/img/profile/' . $b->gambar; ?>" class="img-profile rounded-circle" width="70px">
                            <span class="ml-3 d-lg-inline text-gray-600 small"><?php echo $b->nama_pembalas; ?></span>
                            <div class=" head mt-3">
                                <span class="badge badge-primary">KPU</span>

                                <?php
                                $id = $b->id;
                                $nim = $this->session->userdata('nim');
                                $hr = $this->db->query("SELECT * FROM $reply WHERE id = $id AND nim_pembalas = $nim")->row_array();
                                ?>

                                <?php if (!$hr) { ?>

                                <?php } else { ?>
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusreply<?php echo $b->id; ?>">Hapus</a>
                                <?php } ?>

                            </div>
                            <hr style="border: 1px solid black;">
                            <div class="body">
                                <span><?php echo $b->tanggal; ?></span>
                                <p class="mt-2"><?php echo $b->balasan; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            <?php } ?>

        </div>
    <?php endforeach; ?>
    <br>

    <?= $this->pagination->create_links(); ?>

</section>
<!-- Show Komentar -->

<!-- Komentar -->
<section class="komentar" id="komentar">
    <?php
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
    ?>
    <div class="container">
        <h2 class="title">Dukungan</h2>
        <div id="konfirmasikomen"></div>
        <div class="komen">
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dukungan</label>
                    <textarea class="form-control" id="txtKomentar" name="txtKomentar" rows="3" placeholder="Silakan berikan dukungan anda!"></textarea>
                    <input class="d-none" type="text" name="txtNamaAsli" id="txtNamaAsli" value="<?= $user['nama']; ?>">
                    <input class="d-none" type="text" name="txtNim" id="txtNim" value="<?= $user['nim']; ?>">
                    <input class="d-none" type="text" name="txtEmail" id="txtEmail" value="<?= $user['email']; ?>">
                    <input class="d-none" type="text" name="txtGambar" id="txtGambar" value="<?= $user['img']; ?>">
                    <input class="d-none" type="date" name="txtDate" id="txtDate" value="<?= $today; ?>">
                    <input class="d-none" type="text" name="txtIdKandidat" id="txtIdKandidat" value="<?= $userk['id']; ?>">
                    <input class="d-none" type="text" name="txtNamaKandidat" id="txtNamaKandidat" value="<?= $userk['nama']; ?>">
                </div>
                <button class="btn btn-secondary" name="btnKomen" id="btnKomen" type="button">Kirim</button>
            </form>
        </div>
    </div>
</section>
<!-- Akhir Komentar -->




<!-- Modal Reply -->
<?php $no = 0;
foreach ($komen as $km) : $no++; ?>

    <?php
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
    ?>
    <div class="modal fade" id="reply<?php echo $km->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="konfirmasi<?php echo $km->id; ?>"></div>
                        <div class="form-group">
                            <textarea class="form-control" id="txtBalasan<?php echo $km->id; ?>" name="txtBalasan<?php echo $km->id; ?>" rows="3" placeholder="Repy Disini!"></textarea>
                            <input class="d-none" name="txtNamaPembalas" id="txtNamaPembalas" value="<?= $user['nama']; ?>">
                            <input class="d-none" name="txtNimPembalas" id="txtNimPembalas" value="<?= $user['nim']; ?>">
                            <input class="d-none" name="txtEmailPembalas" id="txtEmailPembalas" value="<?= $user['email']; ?>">
                            <input class="d-none" name="txtGambarPembalas" id="txtGambarPembalas" value="<?= $user['img']; ?>">
                            <input class="d-none" name="txtDateBalasan" id="txtDateBalasan" value="<?= $today; ?>">
                            <input class="d-none" name="txtNimPengomentar<?php echo $km->id; ?>" id="txtNimPengomentar<?php echo $km->id; ?>" value="<?= $km->nim_pengomentar; ?>">
                            <input class="d-none" name="txtIdKomentar<?php echo $km->id; ?>" id="txtIdKomentar<?php echo $km->id; ?>" value="<?= $km->id; ?>">
                            <input class="d-none" name="txtIdKandidat" id="txtIdKandidat" value="<?= $userk['id']; ?>">
                            <input class="d-none" name="txtNamaKandidat" id="txtNamaKandidat" value="<?= $userk['nama']; ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="btnSimpan2<?php echo $km->id; ?>" id="btnSimpan2<?php echo $km->id; ?>">Kirim</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Akhir Modal Reply -->

<!-- Modal Hapus Komentar-->
<?php $no = 0;
foreach ($komen as $km) : $no++; ?>
    <div class="modal fade" id="hapuskomen<?php echo $km->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Komentar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="konfirmasihapus<?php echo $km->id; ?>"></div>
                        <h2>Hapus Komentar?</h2>
                        <div class="form-group">
                            <input class="d-none" name="txtIdHapusKomentar<?php echo $km->id; ?>" id="txtIdHapusKomentar<?php echo $km->id; ?>" value="<?php echo $km->id; ?>">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" name="btnHapusK<?php echo $km->id; ?>" id="btnHapusK<?php echo $km->id; ?>">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Modal Hapus Komentar-->


<?php
$hapusr = $this->db->get($reply)->result();
?>
<!-- Modal Hapus Reply-->
<?php $no = 0;
foreach ($hapusr as $h) : $no++; ?>
    <div class="modal fade" id="hapusreply<?php echo $h->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Balasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="konfirmasihapusreply<?php echo $h->id; ?>"></div>
                        <h2>Hapus Balasan?</h2>
                        <div class="form-group">
                            <input class="d-none" name="txtIdHapusReply<?php echo $h->id; ?>" id="txtIdHapusReply<?php echo $h->id; ?>" value="<?php echo $h->id; ?>">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="btnHapusR<?php echo $h->id; ?>" id="btnHapusR<?php echo $h->id; ?>">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Akhir Modal Hapus Reply-->


<!-- Jquery Show hide reply -->
<?php $no = 0;
foreach ($komen as $km) : $no++; ?>
    <script>
        $('#showreply<?php echo $km->id; ?>').click(function() {
            $("div.takterlihat<?php echo $km->id; ?>").removeClass("d-none");
            $("a.hidereply<?php echo $km->id; ?>").removeClass("d-none");
            $("a.showreply<?php echo $km->id; ?>").addClass("d-none");
        });

        $('#hidereply<?php echo $km->id; ?>').click(function() {
            $("div.takterlihat<?php echo $km->id; ?>").addClass("d-none");
            $("a.hidereply<?php echo $km->id; ?>").addClass("d-none");
            $("a.showreply<?php echo $km->id; ?>").removeClass("d-none");
        });
    </script>
<?php endforeach ?>
<!-- Jquery Show hide reply -->



<!-- tambah komentar -->
<script>
    $(document).ready(function() {
        <?php
        $url = $this->uri->segment(1);
        ?>
        $('#btnKomen').click(function() {
            $.post("<?php echo base_url(); ?><?php echo $url ?>/add/", {
                type: 1,
                txtNamaAsli: $('#txtNamaAsli').val(),
                txtNim: $('#txtNim').val(),
                txtEmail: $('#txtEmail').val(),
                txtGambar: $('#txtGambar').val(),
                txtDate: $('#txtDate').val(),
                txtKomentar: $('#txtKomentar').val(),
                txtIdKandidat: $('#txtIdKandidat').val(),
                txtNamaKandidat: $('#txtNamaKandidat').val()

            }, function(data) {

                console.log(data);
                obj = $.parseJSON(data);

                if (obj.msg[0] == "repeat") {
                    $('#konfirmasikomen').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '   <strong>Error</strong><br/>' + obj.msg[1] +
                        '</div>');
                    setTimeout(function() {
                        $('#konfirmasikomen').html('');
                    }, 3000);

                } else if (obj.msg[0] == "ok") {
                    $('#konfirmasikomen').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                        '</div>');

                    setTimeout(function() {
                        $('#konfirmasikomen').html('');
                    }, 2000);

                    $('#txtNamaPencitraan').val('');
                    $('#txtKomentar').val('');
                    setInterval('location.reload()', 2000);

                } else {

                    $('#konfirmasikomen').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '   <strong>Error</strong><br/>' + obj.msg[1] +
                        '</div>');
                }

            });

        });


    });
</script>
<!-- tambah komentar -->




<!-- Reply -->
<?php $no = 0;
foreach ($komen as $km) : $no++; ?>

    <script>
        $(document).ready(function() {
            <?php
            $url = $this->uri->segment(1);
            ?>
            $('#btnSimpan2<?php echo $km->id; ?>').click(function() {

                $.post("<?php echo base_url(); ?><?php echo $url ?>/add2/", {
                    type: 1,
                    txtNamaPembalas: $('#txtNamaPembalas').val(),
                    txtNimPembalas: $('#txtNimPembalas').val(),
                    txtEmailPembalas: $('#txtEmailPembalas').val(),
                    txtGambarPembalas: $('#txtGambarPembalas').val(),
                    txtDateBalasan: $('#txtDateBalasan').val(),
                    txtBalasan: $('#txtBalasan<?php echo $km->id; ?>').val(),
                    txtNimPengomentar: $('#txtNimPengomentar<?php echo $km->id; ?>').val(),
                    txtIdKomentar: $('#txtIdKomentar<?php echo $km->id; ?>').val(),
                    txtIdKandidat: $('#txtIdKandidat').val(),
                    txtNamaKandidat: $('#txtNamaKandidat').val()

                }, function(data) {

                    console.log(data);
                    obj = $.parseJSON(data);

                    if (obj.msg[0] == "repeat") {
                        $('#konfirmasi<?php echo $km->id; ?>').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '   <strong>Error</strong><br/>' + obj.msg[1] +
                            '</div>');
                        setTimeout(function() {
                            $('#konfirmasi<?php echo $km->id; ?>').html('');
                        }, 3000);

                    } else if (obj.msg[0] == "ok") {
                        $('#konfirmasi<?php echo $km->id; ?>').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                            '</div>');

                        setTimeout(function() {
                            $('#konfirmasi<?php echo $km->id; ?>').html('');
                        }, 2000);

                        setInterval('location.reload()', 2000);

                    } else {

                        $('#konfirmasi<?php echo $km->id; ?>').html(
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
<!-- Reply -->



<!-- Hapus Komentar -->
<?php $no = 0;
foreach ($komen as $km) : $no++; ?>

    <script>
        $(document).ready(function() {
            <?php
            $url = $this->uri->segment(1);
            ?>
            $('#btnHapusK<?php echo $km->id; ?>').click(function() {

                $.post("<?php echo base_url(); ?><?php echo $url ?>/hapuskomentar/", {
                    type: 1,
                    txtIdHapusKomentar: $('#txtIdHapusKomentar<?php echo $km->id; ?>').val()

                }, function(data) {

                    console.log(data);
                    obj = $.parseJSON(data);

                    if (obj.msg[0] == "hapus") {
                        $('#konfirmasihapus<?php echo $km->id; ?>').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                            '</div>');

                        setTimeout(function() {
                            $('#konfirmasihapus<?php echo $km->id; ?>').html('');
                        }, 2000);

                        setInterval('location.reload()', 2000);

                    } else {

                        $('#konfirmasihapus<?php echo $km->id; ?>').html(
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
<!-- Hapus Komentar -->




<!-- Hapus Reply -->
<?php $no = 0;
foreach ($hapusr as $h) : $no++; ?>

    <script>
        $(document).ready(function() {
            <?php
            $url = $this->uri->segment(1);
            ?>
            $('#btnHapusR<?php echo $h->id; ?>').click(function() {

                $.post("<?php echo base_url(); ?><?php echo $url ?>/hapusreply/", {
                    type: 1,
                    txtIdHapusReply: $('#txtIdHapusReply<?php echo $h->id; ?>').val()

                }, function(data) {

                    console.log(data);
                    obj = $.parseJSON(data);

                    if (obj.msg[0] == "hapus") {
                        $('#konfirmasihapusreply<?php echo $h->id; ?>').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '   <strong>Sukses</strong><br/>' + obj.msg[1] +
                            '</div>');

                        setTimeout(function() {
                            $('#konfirmasihapusreply<?php echo $h->id; ?>').html('');
                        }, 2000);

                        setInterval('location.reload()', 2000);

                    } else {

                        $('#konfirmasihapusreply<?php echo $h->id; ?>').html(
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
<!-- Hapus Reply -->