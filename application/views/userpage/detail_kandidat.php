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
                            <a href="<?= base_url('auth'); ?>" class="badge badge-success">Balas</a>
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
        <div class="container">
            <h2 class="title">Dukungan</h2>
            <div id="konfirmasikomen"></div>
            <div class="komen">
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Dukungan</label>
                        <textarea class="form-control" id="txtKomentar" name="txtKomentar" rows="3" placeholder="Silakan berikan dukungan anda!"></textarea>
                    </div>
                    <a href="<?= base_url('auth'); ?>"><button class="btn btn-secondary" type="button">Kirim</button></a>
                </form>
            </div>
        </div>
    </section>
    <!-- Akhir Komentar -->


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