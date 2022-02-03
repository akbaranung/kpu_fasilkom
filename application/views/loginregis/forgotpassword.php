<div class="contener forgot-mode">
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



        <!-- Hiasan Javascript -->
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



          <form method="post" action="<?= base_url('auth/forgotpassword'); ?>" class="forgot-form">
            <h2 class="title">Lupa Password</h2>

            <?= $this->session->flashdata('message'); ?>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email" required="" />
            </div>
            <?= form_error('email', '<small class="text-danger pl-3">','</small>' ); ?>

            <input type="submit" class="btn" value="Send" />
            <a href="" style="text-decoration: none;" href onclick="return false;" id="sign-in-btn2">Kembali Ke Login</a>
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

        <div class="panel corner-panel">
          <a href='https://www.freepik.com/vectors/people'>
          <img src="<?= base_url('logregassets/img/vector3.png'); ?>" class="image" alt="" />
          </a>
          <div class="content">
            <h3>Lupa Password ?</h3>
            <p>
              Masukkan email anda untuk mendapatkan link reset password.
            </p>
          </div>
        </div>

      </div>
    </div>

    <script src="<?= base_url('logregassets/js/loginregis2.js'); ?>"></script>
    <script>
      $('#sign-in-btn2').click (function () {
         setTimeout(function () {
             window.location.href = "<?= base_url('auth') ?>"; //will redirect to your blog page (an ex: blog.html)
          }, 2000); //will call the function after 2 secs.
      });
    </script>