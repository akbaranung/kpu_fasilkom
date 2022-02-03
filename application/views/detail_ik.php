<section class="container-fluid lembaga">

                       

                                          <h1>
                                                Detail Kandidat
                                          </h1>
                                    <div class="row">

                                          <div class="col-md-12">
                                                <img src="<?= base_url('kandidat/'). $kandidat . $userk['img']; ?>" style="width: 500px; height: 500px;">
                                          </div>

                                          <div class="col-md-10">
                                                <div class="card-body" style="float: left;">
                                                      <h4 class="card-title"><strong>Nama : <?= $userk['nama']; ?></strong></h4>
                                                      <p class="card-text">Calon Kandidat : <?= $calon; ?> </p>
                                                      <p class="card-text">No Urut : <?= $userk['no_urut']; ?> </p>
                                                      <p class="card-text">Slogan : <?= $userk['slogan']; ?> </p>
                                                      <p class="card-text">Visi : <?= $userk['visi']; ?> </p>
                                                      <p class="card-text">Misi : <?= $userk['misi']; ?> </p>
                                                </div>
                                          </div>
                                    </div>

</section>