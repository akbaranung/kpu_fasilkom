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
                                <a href="<?= base_url('auth'); ?>" class="buy">Pilih</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>
    <!-- Akhir Kandidat -->