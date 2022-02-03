<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/wave.css'); ?>">

<!-- Home -->
<section class="home1">
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
    <?php
    $dpm = $this->db->get_where('hp_kdpm', ['nim_pemilih' => $user['nim']])->row_array();
    $bem = $this->db->get_where('hp_kbem', ['nim_pemilih' => $user['nim']])->row_array();

    if ($user['jurusan'] == 'Teknik Informatika') {
      $hima = $this->db->get_where('hp_khti', ['nim_pemilih' => $user['nim']])->row_array();
    } else {
      $hima = $this->db->get_where('hp_khsi', ['nim_pemilih' => $user['nim']])->row_array();
    }
    ?>

    <?php
    if ($user['jurusan'] == 'Teknik Informatika') {
      $himpunan = 'HiMTI';
    } else {
      $himpunan = 'Himsisfo';
    }
    ?>


    <?php if (!$dpm && !$bem && !$hima) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat DPM, BEM, dan <?= $himpunan; ?>
      </div>
    <?php } else if (!$dpm && !$bem) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat DPM dan BEM
      </div>
    <?php } else if (!$dpm && !$hima) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat DPM dan <?= $himpunan; ?>
      </div>
    <?php } else if (!$bem && !$hima) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat BEM dan <?= $himpunan; ?>
      </div>
    <?php } else if (!$bem) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat BEM
      </div>
    <?php } else if (!$hima) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat <?= $himpunan; ?>
      </div>
    <?php } else if (!$dpm) { ?>
      <div class="alert alert-danger" role="alert" style="z-index : 1;">
        Anda belum memilih kandidat DPM
      </div>
    <?php } else { ?>
      <div style="padding-top: 70px;">

      </div>
    <?php } ?>
    <h5><?= $home['sub_header']; ?></h5>
    <h3><?= $home['header']; ?></h3>
    <span><?= $home['isi']; ?></span>
  </div>
  <div class="wave wave1"></div>
  <div class="wave wave2"></div>
  <div class="wave wave3"></div>
  <div class="wave wave4"></div>
</section>
<!-- End Home -->

<section class="lembagaBg">
  <div class="container">
    <div class="">
      <main class="container py-2">
        <div class="h1 text-center text-dark" id="pageHeaderTitle"><h5>Kelembagaan Fakultas Ilmu Komputer</h5></div>

        <?php foreach($lembaga as $l) : ?>
        <article class="postcard light blue">
          <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="<?php echo base_url('lembagapic/'.$l->image)?>" alt="Image Title" />
          </a>
          <div class="postcard__text t-dark">
            <h1 class="postcard__title blue"><a href="#"><?= $l->lembaga ?></a></h1>
            <div class="postcard__bar"></div>
            <div class="postcard__preview-txt"><?= $l->deskripsi; ?></div>
          </div>
        </article>
        <?php endforeach; ?>
        
      </main>
    </div>
  </div>
</section>


<section class="section-slider">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#3399ff" fill-opacity="1" d="M0,128L30,117.3C60,107,120,85,180,90.7C240,96,300,128,360,144C420,160,480,160,540,138.7C600,117,660,75,720,80C780,85,840,139,900,149.3C960,160,1020,128,1080,122.7C1140,117,1200,139,1260,122.7C1320,107,1380,53,1410,26.7L1440,0L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
  </svg>
  <div class="title">
    <h2>Tata Cara Pemilihan</h2>
  </div>
  <div class="slider">
    <div class="img-slider">
      <div class="slide active">
        <img src="<?= base_url('assets/image/1.jpg') ?>" alt="">
        <div class="info">
          <h2>Slide 01</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="<?= base_url('assets/image/2.jpg') ?>" alt="">
        <div class="info">
          <h2>Slide 02</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="<?= base_url('assets/image/3.jpg') ?>" alt="">
        <div class="info">
          <h2>Slide 03</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="<?= base_url('assets/image/4.jpg') ?>" alt="">
        <div class="info">
          <h2>Slide 04</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="slide">
        <img src="<?= base_url('assets/image/5.jpg') ?>" alt="">
        <div class="info">
          <h2>Slide 05</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="navigation">
        <div class="btn btnn active"></div>
        <div class="btn btnn"></div>
        <div class="btn btnn"></div>
        <div class="btn btnn"></div>
        <div class="btn btnn"></div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btnn');
    let currentSlide = 1;

    // Javascript for image slider manual navigation
    var manualNav = function(manual) {
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btnn) => {
          btnn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btnn, i) => {
      btnn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass) {
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function() {
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

          slides[i].classList.add('active');
          btns[i].classList.add('active');
          i++;

          if (slides.length == i) {
            i = 0;
          }
          if (i >= slides.length) {
            return;
          }
          repeater();
        }, 10000);
      }
      repeater();
    }
    repeat();
  </script>
</section>