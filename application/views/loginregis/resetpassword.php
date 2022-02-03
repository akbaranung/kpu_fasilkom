<div class="contener forgot-mode">
      <div class="forms-contener">
        <div class="signin-signup">

          <!-- Hiasan Javascript -->
          <!-- Hiasan Javascript -->
          <form action="#" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <a href="" style="text-decoration: none;" href onclick="return false;" id="forgot-btn">Lupa Password ?</a>
          </form>

          <form action="#" class="sign-up-form">
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
          <!-- Hiasan Javascript -->
          <!-- Hiasan Javascript -->

          

          <form class="forgot-form" method="post" action="<?= base_url('auth/changePassword'); ?>">
            <h2 class="title">Reset Password</h2>

            <?= $this->session->flashdata('message'); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Password Baru" />
            </div>
            <?= form_error('password1', '<small class="text-danger pl-3">','</small>' ); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password2" name="password2" aria-describedby="emailHelp" placeholder="Konfirmasi Password" />
            </div>
            <?= form_error('password2', '<small class="text-danger pl-3">','</small>' ); ?>

            <input type="submit" class="btn" value="Reset" />
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
            <a href="" style="text-decoration: none;" href onclick="return false;" id="hreflemod"><button class="btn transparent" id="sign-up-btn">
              Daftar
            </button></a>
          </div>
          <img src="<?= base_url('logregassets/img/vector.png'); ?>" class="image" alt="" />
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
          <img src="<?= base_url('logregassets/img/vector2.png'); ?>" class="image" alt="" />
        </div>

        <div class="panel corner-panel" style="padding-bottom: 200px;">
          <img src="<?= base_url('logregassets/img/vector4.png'); ?>" class="image" alt="" />
          <div class="content" >
            <h3>Reset Password ?</h3>
            <p>
              Pastikan anda mengingat password baru anda.
            </p>
          </div>
        </div>

      </div>
    </div>