<div class="contener">
      <div class="forms-contener">
        <div class="signin-signup">

          <form action="<?= base_url('auth'); ?>" class="sign-in-form" method="post">
            <h2 class="title">Login</h2>

            <?= $this->session->flashdata('message'); ?>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="NIM" id="nim" name="nim" value="<?= set_value('nim'); ?>" required="" />
            </div>
            <?= form_error('nim', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="password" name="password" required="" />
            </div>
            <?= form_error('password', '<small class="text-danger pl-3">','</small>' ); ?>

            <input type="submit" value="Login" class="btn solid" />
            <a href="" style="text-decoration: none;" href onclick="return false;" id="forgot-btn">Lupa Password ?</a>
            <a href="<?= base_url('userpage'); ?>" style="text-decoration: none;" >Home</a>
          </form>



          <!-- Hiasan Javascript -->
          <form action="#" class="sign-up-form">
            <h2 class="title">Daftar</h2>

            <div class="overflow">
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="file" class="input-file" required="">
            </div>
              <p class="text-center" style="font-size: 12px;">jpg/jpeg/png - Max 1 MB</p>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nama">
            </div>
            <div class="input-field">
              <i class="fas fa-id-badge"></i>
              <input type="text" placeholder="NIM">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email">
            </div>
            <div class="input-field">
              <i class="fas fa-graduation-cap"></i>
              <input type="text" placeholder="Angkatan">
            </div>
            <div class="input-field">
              <i class="fas fa-user-tag"></i>
              <select type="text" placeholder="Jurusan">
                <option disabled selected value>--- Pilih Jurusan ---</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
              </select>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Ulangi Password">
            </div>
            <div>
            <input type="checkbox" name="cxbx" placeholder="Term" required="">
            <label> <a href="" style="text-decoration: none;">Persetujuan</a> Peserta</label>
            </div>
            </div>

            <input type="submit" class="btn solid" value="Daftar">
          </form>
          <!-- Hiasan Javascript -->



          <!-- Hiasan Javascript -->
          <form action="#" class="forgot-form">
            <h2 class="title">Lupa Password</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Masukkan Email" />
            </div>
            <input type="submit" class="btn" value="Send" />
            <a href="" style="text-decoration: none;" href onclick="return false;" id="sign-in-btn2">Kembali Ke Login</a>
          </form>
          <!-- Hiasan Javascript -->



        </div>
      </div>

      <div class="panels-contener">

        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Anda harus mendaftarkan akun anda terlebih dahulu untuk dapat melakukan login dan memilih kandidat.
            </p>
            <a href="" style="text-decoration: none;" href onclick="return false;" id="hreflemod"><button class="btn transparent" id="sign-up-btn">
              Daftar
            </button></a>
          </div>
          <img src="<?= base_url('logregassets/img/vector.png');?>" class="image" alt="" />
        </div>

        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun ?</h3>
            <p>
              Langsung login dengan akun anda yang telah terdaftar !.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="<?= base_url('logregassets/img/vector2.png');?>" class="image" alt="" />
        </div>

        <div class="panel corner-panel">
          <img src="<?= base_url('logregassets/img/vector3.png'); ?>" class="image" alt="" />
          <div class="content">
            <h3>Lupa Password ?</h3>
            <p>
              Masukkan email anda untuk mendapatkan link reset password.
            </p>
          </div>
        </div>

      </div>
    </div>

    <script src="<?= base_url('logregassets/js/loginregis2.js')?>"></script>
    <script>
      $('#hreflemod').click (function () {
         setTimeout(function () {
             window.location.href = "<?= base_url('auth/registration');?>"; //will redirect to your blog page (an ex: blog.html)
          }, 2000); //will call the function after 2 secs.
      });
    </script>
    <script>
      $('#forgot-btn').click (function () {
         setTimeout(function () {
             window.location.href = "<?= base_url('auth/forgotpassword');?>"; //will redirect to your blog page (an ex: blog.html)
          }, 2000); //will call the function after 2 secs.
      });
    </script>