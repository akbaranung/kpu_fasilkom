   <section class="kandidat" id="kandidat">
       <link rel="stylesheet" type="text/css" href="<?= base_url('assets/komponen/bem.css'); ?>">
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
           <h2 class="title">Info Kanditat <strong>BEM</strong></h2>
           <div class="row mt-3">

               <?php foreach ($kandidat as $k) : ?>
                   <div class="col-lg-4 mt-3">
                       <div class="kartu card">
                           <div class="box">
                               <h2 class="name">
                                   <?= $k->no_urut; ?>. <?= $k->nama; ?>
                               </h2>
                               <a href="<?php echo base_url('useribem/detail/' . $k->id . '/index'); ?>" class="buy">Detail</a>
                               <div class="circle"></div>
                               <img src="<?php echo base_url() . '/kandidat/BEM/' . $k->img; ?>" class="product">
                           </div>
                       </div>
                   </div>
               <?php endforeach ?>

           </div>
       </div>
   </section>

   <script src="<?= base_url('assets/js/vanilla-tilt.min.js'); ?>"></script>
   <script>
       VanillaTilt.init(document.querySelectorAll(".box"), {
           max: 25,
           speed: 400
       });
   </script>