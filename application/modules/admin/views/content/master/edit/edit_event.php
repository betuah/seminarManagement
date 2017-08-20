<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Event</h4>
</div>
<div class="modal-body">
  <form action="<?php echo base_url() . 'admin/update/master/event/' . $id['id_event']; ?>" method="post" enctype="multipart/form-data" class="smart-form" novalidate="novalidate">
    <header>
      No. <?php echo $id['id_event'] ?>
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="hidden" name="id_evn" value="<?php echo $id['id_event'] ?>">
            <input type="text" name="tema" placeholder="Judul Seminar" value="<?php echo $id['judul_event'] ?>" required="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-md-4">
          <label class="select">
            <select name="periode">
              <option value="<?php echo $id['id_periode'] ?>" selected="" readonly><?php echo $id['id_periode'] ?></option>
              <option value="<?php echo date('Y').'1'; ?>"><?php echo date('Y').' Semester ke 1'; ?></option>
              <option value="<?php echo date('Y').'2'; ?>"><?php echo date('Y').' Semester ke 2'; ?></option>
            </select> <i></i> </label>
        </section>
        <section class="col col-md-4">
          <label class="input"> <i class="icon-append fa fa-briefcase"></i>
            <input type="number" name="quota" min="1" max="4000" maxlength="4" placeholder="Quota" value="<?php echo $id['quota'] ?>" required="">
          </label>
        </section>
        <section class="col col-md-4">
          <label class="input"> <i class="icon-append fa fa-phone"></i>
            <input type="text" name="hrg" placeholder="Harga" value="<?php echo $id['harga'] ?>" required="">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="select">
            <select name="id_jur">
              <option value="<?php echo $id['id_jurusan'] ?>" selected="" readonly>Program Studi - <?php echo $id['nama_jur'] ?></option>
              <?php foreach ($get_jur as $v_jur): ?>
                <option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
              <?php endforeach; ?>
            </select> <i></i> </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="jen_evn">
              <option value="<?php echo $id['id_jen_event'] ?>" selected="" readonly>Jenis Event - <?php echo $id['nama_jen'] ?></option>
              <option value="1">Seminar</option>
              <option value="2">Workshop</option>
            </select> <i></i> </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="edate" id="edate" placeholder="Tanggal Di Mulai Event" value="<?php echo $id['tgl_event'] ?>" required="">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="rdate" id="rdate" placeholder="Tanggal Terakhir Registrasi Event" value="<?php echo $id['tgl_akhir_reg'] ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa  fa-calendar"></i>
            <input type="number" name="batas_byr" placeholder="Batas Pembayaran Ex: 7 Hari" required="" value="<?php echo $id['batas_bayar'] ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="idloc" required="">
              <option value="<?php echo $id['id_lokasi'] ?>" selected="" readonly><?php echo $id['nama_ruangan']." - ".$id['lokasi'] ?></option>
              <?php foreach ($get_loc as $v_loc): ?>
                <option value="<?php echo $v_loc['id_lokasi'] ?>"><?php echo $v_loc['nama_ruangan']." - ".$v_loc['lokasi'] ?></option>
              <?php endforeach; ?>
            </select> <i></i> </label>
        </section>
      </div>

      <section>
        <label for="file" class="input input-file">
          <div class="button"><input type="file" name="bg_event" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Event Wallpaper .jpg .png" readonly="">
          <input type="hidden" name="old_foto" value="<?php echo $id['foto'] ?>">
        </label>
      </section>
    </fieldset>
    <footer>
      <button type="submit" class="btn btn-primary">
        Simpan
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Batal
      </button>
    </footer>
  </form>
</div>
