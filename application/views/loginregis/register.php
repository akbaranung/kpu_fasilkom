<div class="contener sign-up-mode">
      <div class="forms-contener">
        <div class="signin-signup">



        <!-- Hiasan Javascript -->
          <form action="#" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="NIM" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <a href="" style="text-decoration: none;" href onclick="return false;" id="forgot-btn">Lupa Password ?</a>
            <a href="<?= base_url('userpage'); ?>" style="text-decoration: none;" >Home</a>
          </form>
        <!-- Hiasan Javascript -->



          <form class="sign-up-form" method="post" enctype="multipart/form-data" action="<?= base_url('auth/registration'); ?>">
            <h2 class="title">Daftar</h2>

            <div class="overflow">

            <?= $this->session->flashdata('message'); ?>
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="file" class="input-file" id="ktm" name="ktm" placeholder="Upload" required="">
            </div>
            <p class="text-center" style="font-size: 12px;">jpg/jpeg/png - Max 1 MB</p>
            <?= form_error('ktm', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>" required="">
            </div>
            <?= form_error('nama', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-id-badge"></i>
              <input type="text" id="nim" name="nim" placeholder="NIM" value="<?= set_value('nim') ?>" required="">
            </div>
            <?= form_error('nim', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required="">
            </div>
            <?= form_error('email', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-graduation-cap"></i>
              <input type="text" id="angkatan" name="angkatan" placeholder="Angkatan" maxlength="4" value="<?= set_value('angkatan') ?>" required="">
            </div>
            <?= form_error('angkatan', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-user-tag"></i>
              <select type="text" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= set_value('jurusan') ?>" required="">
                <option disabled selected value>--- Pilih Jurusan ---</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
              </select>
            </div>
            <?= form_error('jurusan', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password1" name="password1" placeholder="Password" required="">
            </div>
            <?= form_error('password1', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password2" name="password2" placeholder="Ulangi Password" required="">
            </div>
            <?= form_error('password2', '<small class="text-danger pl-3">','</small>' ); ?>

            <div>
            <input type="checkbox" name="cxbx" placeholder="Term" required="">
            <label> <a href="" style="text-decoration: none;">Persetujuan</a> Peserta</label>
            <?= form_error('cxbx', '<small class="text-danger pl-3">','</small>' ); ?>
            </div>


            </div>

            <input type="submit" class="btn solid" value="Daftar">

          </form>

        </div>
      </div>

      <div class="panels-contener">

        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Anda harus mendaftarkan akun anda terlebih dahulu untuk dapat melakukan login dan memilih kandidat.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
          <img src="<?= base_url('logregassets/img/vector.png');?>" class="image" alt="" />
        </div>

        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun ?</h3>
            <p>
              Langsung login dengan akun anda yang telah terdaftar !.
            </p>
            <a href="" style="text-decoration: none;" href onclick="return false;" id="hreflemod"><button class="btn transparent" id="sign-in-btn">
              Login
            </button></a>
          </div>
          <img src="<?= base_url('logregassets/img/vector2.png'); ?>" class="image" alt="" />
        </div>

      </div>
    </div>

    <script src="<?= base_url('logregassets/js/loginregis.js'); ?>"></script>
    <script>
      $('#hreflemod').click (function () {
         setTimeout(function () {
             window.location.href = "<?= base_url('auth'); ?>"; //will redirect to your blog page (an ex: blog.html)
          }, 2000); //will call the function after 2 secs.
      });
    </script>