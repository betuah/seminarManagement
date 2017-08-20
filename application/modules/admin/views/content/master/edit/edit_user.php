<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">User</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/user/' . $id['id_usr']; ?>" method="post" class="smart-form">
    <header>
      Edit Data User
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon glyphicon-fire"></i>
            <input type="text" name="id_usr" placeholder="NIM , Kode Dosen atau Email" required="" value="<?php echo $id['id_usr']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="t_user">
              <option value="<?php echo $id['id_type_usr']; ?>" selected="" readonly><?php echo $id['nama_type_usr']; ?></option>
              <?php foreach ($get_type_usr as $v_tipe): ?>
                <option value="<?php echo $v_tipe['id_type_usr'] ?>"><?php echo $v_tipe['nama_type_usr'] ?></option>
              <?php endforeach; ?>
            </select> <i></i> </label>
        </section>
      </div>
      <div class="row">
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append glyphicon glyphicon-user"></i>
            <input type="text" name="nama_usr" placeholder="Nama Lengkap" required="" value="<?php echo $id['nama_usr']; ?>">
          </label>
        </section>
      </div>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon glyphicon-envelope"></i>
            <input type="email" name="email" placeholder="Masukan Email Anda" required="" value="<?php echo $id['email']; ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="jekel" required="">
              <option value="<?php echo $id['jekel']; ?>" selected="" readonly><?php echo $id['jekel']; ?></option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select> <i></i> </label>
        </section>
      </div>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon glyphicon-phone-alt"></i>
            <input type="text" name="no_tlp" placeholder='Masukan Nomor telepon Anda +62' required="" value="<?php echo $id['no_tlpn']; ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="ket" required="">
              <option value="<?php echo $id['ket']; ?>" selected="" readonly><?php echo $id['ket']; ?></option>
              <option value="Dosen">Dosen</option>
              <option value="Mahasiswa">Mahasiswa</option>
              <option value="User eksternal">User eksternal</option>
            </select> <i></i> </label>
        </section>
      </div>
      <section>
        <label class="textarea"><i class="icon-append fa fa-home"></i>
          <textarea rows="5" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $id['alamat_usr']; ?>" ><?php echo $id['alamat_usr']; ?></textarea>
        </label>
      </section>
    </fieldset>

    <fieldset>
      <h7>Catata : Kosongkan bagian ini jika anda tidak ingin mengubah password</h7><br><br>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon fa fa-lock"></i>
            <input type="password" name="old_pass" placeholder="Masukan Password Lama" >
            <input type="hidden" name="old_pass1" value="<?php echo $id['password']; ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon fa fa-lock"></i>
            <input type="password" name="new_pass" placeholder="Masukan Password Baru" >
          </label>
        </section>
        <section class="col col-6">
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append glyphicon fa fa-lock"></i>
            <input type="password" name="re_pass" placeholder="Masukan Kembali Password Baru">
          </label>
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
