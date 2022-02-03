<div class="content-wrapper">
<section class="container-fluid lembaga"><!-- HEADER TITLE -->

                                          <h1>
                                                Detail Pengguna
                                          </h1>
                                    <div class="row">

                                          <div class="col-md-12">
                                                <img src="<?= base_url('assets/img/profile/') . $userp['img']; ?>" style="width: 225px; height: 225px;">
                                          </div>

                                          <?php
                                          $role_id = $userp['role_id'];
                                          $role = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
                                            ?>
                                            
                                          <div class="col-md-12">
                                                <div class="card-body" style="float: left;">
                                                      <h4 class="card-title"><strong>Nama : <?= $userp['nama']; ?></strong></h4>
                                                      <p class="card-text">NIM : <?= $userp['nim']; ?> </p>
                                                      <p class="card-text">Email : <?= $userp['email']; ?> </p>
                                                      <p class="card-text">Angkatan : <?= $userp['angkatan']; ?> </p>
                                                      <p class="card-text">Jurusan : <?= $userp['jurusan']; ?> </p>
                                                      <p class="card-text">Role : <?= $role['role']; ?> </p>

                                                      <?php if($userp['is_active'] == 0){?>
                                                      <p class="card-text">Status : Baru Daftar </p>
                                                      <?php } else if($userp['is_active'] == 1){?>
                                                      <p class="card-text">Status : Aktif </p>
                                                      <?php } else if($userp['is_active'] == 2) {?>
                                                      <p class="card-text">Status : Nonaktif </p>
                                                      <?php } else if($userp['is_active'] == 3) {?>
                                                      <p class="card-text">Status : Butuh Validasi </p>
                                                      <?php } else {?>
                                                      <p class="card-text">Status : Bukan Fasilkom </p>
                                                      <?php } ?>

                                                      <p class="card-text"><small class="text-muted">Terdaftar Pada : <?= date('d F Y', $userp['date_created']); ?> </small></p>
                                                </div>
                                          </div>
                                    </div>

                                    <div class="row ">
                                          <div class="col-lg-12">
                                          <br>
                                          <label><strong>KTM :</strong></label><br>

                                          <img src="<?= base_url('ktm/') . $userp['ktm']; ?>" style="width: 500px; height: 500px;">
                                          </div>
                                    </div>


</section>
</div>