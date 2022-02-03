<!-- Home -->
      <section class="home" style="height:200vh;">

        <div class="container" style="padding: 50px 10px">
            <h5 class="text-center">Contact Us</h5><hr style="background-color: white; border-width: 3px;">
            <h2 class="text-center">Contact Kami Jika Ada Keluhan / Kesulitan Menggunakan Aplikasi</h2>
            <h2 class="text-center"><span class="fa fa-whatsapp"> Whatsapp</span></h2>
            <h2 class="text-center"><span class="fa fa-instagram"> Instagram</span></h2><br><br><br>
            <h3 class="text-center">Atau Kirim Pesan Langsung <strong contenteditable="true">KESINI</strong></h3>


                <div id="konfirmasi"></div>
                <div class="komen" style="background-color: #232a31;">
                    <?php echo form_open_multipart('contact/pesan'); ?>
                        <div class="form-group">

                          <?= $this->session->flashdata('message'); ?>

                          <?php 
                          $month = date('m');
                          $day = date('d');
                          $year = date('Y');

                          $today = $year . '-' . $month . '-' . $day;
                          ?>
                            <input class="form-control" type="hidden" name="tanggal" id="tanggal" value="<?= $today; ?>">
                            <input class="form-control" type="hidden" name="status" id="status" value="Unreaded">

                            <input class="form-control" type="hidden" name="nama" id="nama"value="<?= $user['nama'] ?>">

                            <input class="form-control" type="hidden" name="nim" id="nim" value="<?= $user['nim'] ?>">

                            <input class="form-control" type="hidden" name="email" id="email" value="<?= $user['email'] ?>">

                            <input class="form-control" type="hidden" name="jurusan" id="jurusan"  value="<?= $user['jurusan'] ?>">

                            <input class="form-control" type="hidden" name="angkatan" id="angkatan" value="<?= $user['angkatan'] ?>">

                            <input class="form-control" type="hidden" name="img" id="img" value="<?= $user['img'] ?>">

                            <label for="exampleFormControlTextarea1">Pesan :</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" required="" placeholder="Masukkan Pesan..."></textarea>

                        </div>
                        <button  class="btn btn-secondary" name="btnPesan" id="btnPesan" type="submit">Kirim</button>
                    <?php echo form_close(); ?>
                </div>
        </div>

      </section>