<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Panitia</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/panitia/' . $id['id_panitia']; ?>" method="post" class="smart-form">
    <header>
      Edit Data panitia
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-prepend fa fa-user"></i>
            <input type="text" name="nama" placeholder="Nama panitia" value="<?php echo $id['nama'] ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
            <input type="text" name="email" placeholder="Email panitia" value="<?php echo $id['email'] ?>" readonly>
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-prepend fa fa-phone"></i>
            <input type="text" name="tlpn" placeholder="No Telepon panitia" value="<?php echo $id['tlpn'] ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="pan" required="">
              <option value="<?php echo $id['tipe_panitia'] ?>" selected="" readonly><?php echo $id['tipe_panitia'] ?></option>
              <option value="Ketua">Ketua</option>
              <option value="Bendahara">Bendahara</option>
              <option value="Anggota">Anggota</option>
            </select> <i></i> </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-prepend fa fa-lock"></i>
            <input type="password" name="pass" placeholder="Masukan Password Baru" >
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="jur" required="">
              <option value="<?php echo $id['id_jurusan'] ?>" selected="" readonly>Jurusan</option>
              <?php foreach ($get_jur as $v_jur): ?>
                <option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
              <?php endforeach; ?>
            </select> <i></i> </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-prepend fa fa-lock"></i>
            <input type="password" name="re_pass" placeholder="Masukan Kembali Password Baru" >
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="confirm" required="">
              <option value="<?php echo $id['status'] ?>" selected="" readonly><?php if ($id['status'] == '0') {
                echo "Not Confirmed";
              } else { echo "Confirmed"; }?></option>
              <option value="0">Not Confirmed</option>
              <option value="1">Confirmed</option>
            </select> <i></i> </label>
        </section>
      </div>
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
