<div class="contener sign-up-mode">
      <div class="forms-contener">
        <div class="signin-signup">

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

          <form class="sign-up-form" method="post" enctype="multipart/form-data" action="<?= base_url('auth/uploadktm'); ?>">
            <h2 class="title">Reupload KTM</h2>

            <?= $this->session->flashdata('message'); ?>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="file" class="input-file" id="ktm" name="ktm" aria-describedby="emailHelp" placeholder="Upload KTM" required="" />
            </div>
              <p class="text-center" style="font-size: 12px;">jpg/jpeg/png - Max 1 MB</p>
            <input type="submit" class="btn" value="Upload" />
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
            <h3>Reupload KTM</h3>
            <p>
              Pastikan lakukan pengupload an ulang KTM anda dengan benar!.
            </p>
          </div>
          <img src="<?= base_url('logregassets/img/vector5.png'); ?>" class="image" alt="" />
        </div>

      </div>
    </div>