<section class="change-password">
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
    <h2><strong>Isi Password Terkini Terlebih Dahulu</strong></h2><br>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('profile/changepassword'); ?>" method="post">
                  <div class="form-group">
                    <label for="current_password">Password Saat Ini :</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required="">
                    <?= form_error('current_password', '<small class="text-danger pl-3">','</small>' ); ?>
                  </div>
                  <div class="form-group">
                    <label for="new_password1">Password Baru :</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1" required="">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">','</small>' ); ?>
                  </div>
                  <div class="form-group">
                    <label for="new_password2">Konfirmasi Password Baru :</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2" required="">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">','</small>' ); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
            </form>
            
        </div>
    </div>
  </div>
</section>