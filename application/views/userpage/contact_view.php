<!-- Home -->
      <section class="home" style="height:100%;">

        <div class="container" style="padding : 50px 10px">
            <h5 class="text-center">Contact Us</h5><hr style="background-color: white; border-width: 3px;">
            <h2 class="text-center">Contact Kami Jika Ada Keluhan / Kesulitan Menggunakan Aplikasi</h2>
            <h2 class="text-center"><span class="fa fa-whatsapp"> Whatsapp</span></h2>
            <h2 class="text-center"><span class="fa fa-instagram"> Instagram</span></h2><br><br><br>
            <h3 class="text-center">Atau Kirim Pesan Langsung <strong contenteditable="true">KESINI</strong></h3>


                <div id="konfirmasi"></div>
                <div class="komen" style="background-color: #232a31;">
                    <?php echo form_open_multipart('contactuser/pesan'); ?>
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

                            <label for="exampleFormControlTextarea1">Nama :</label>
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama" required="" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">','</small>' ); ?><br>

                            <label for="exampleFormControlTextarea1">NIM :</label>
                            <input class="form-control" type="text" name="nim" id="nim" placeholder="Masukkan NIM" required="" value="<?= set_value('nim') ?>">
                            <?= form_error('nim', '<small class="text-danger pl-3">','</small>' ); ?><br>

                            <label for="exampleFormControlTextarea1">Email :</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Masukkan Email" required="" value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">','</small>' ); ?><br>

                            <label for="exampleFormControlTextarea1">No. Telpon :</label>
                            <input class="form-control" type="number" name="notelpon" id="notelpon" placeholder="Masukkan Nomor Telepon" required="" value="<?= set_value('notelpon') ?>">
                            <?= form_error('notelpon', '<small class="text-danger pl-3">','</small>' ); ?><br>

                            <label for="exampleFormControlTextarea1">Jurusan :</label>
                            <select class="form-control" type="text" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan">
                              <option>Teknik Informatika</option>
                              <option>Sistem Informasi</option>
                            </select><br>

                            <label for="exampleFormControlTextarea1">Angkatan :</label>
                            <input class="form-control" type="text" name="angkatan" id="angkatan" placeholder="Masukkan Angkatan" maxlength="4" required="" value="<?= set_value('angkatan') ?>">
                            <?= form_error('angkatan', '<small class="text-danger pl-3">','</small>' ); ?><br>

                            <label for="exampleFormControlTextarea1">Pesan :</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Masukkan Pesan" required=""></textarea>
                            <?= form_error('pesan', '<small class="text-danger pl-3">','</small>' ); ?>


                        </div>
                        <button  class="btn btn-secondary" name="btnPesan" id="btnPesan" type="submit">Kirim</button>
                    <?php echo form_close(); ?>
                </div>
        </div>

      </section>