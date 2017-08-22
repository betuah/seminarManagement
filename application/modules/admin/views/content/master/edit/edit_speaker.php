<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Jurusan</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/speaker/' . $id['id_speaker']; ?>" method="post" enctype="multipart/form-data" class="smart-form">
    <header>
      Edit Data Pembicara
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idevn" placeholder="Id Event" value="<?php echo $id['id_event'] ?>" required="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="institusi" placeholder="Asal Institusi" value="<?php echo $id['institusi'] ?>" required="">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="nama" placeholder="Nama Pembicara" value="<?php echo $id['nama_speaker'] ?>" required="">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="email" name="email" placeholder="Email" value="<?php echo $id['email'] ?>" required="">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="tlpn" placeholder="Nomor Telepon" value="<?php echo $id['tlpn'] ?>" required="">
          </label>
        </section>
        <section class="col col-6">
          <label for="file" class="input input-file">
            <div class="button"><input type="file" name="pembicara" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Foto Pembicara .jpg .png" readonly="">
            <input type="hidden" name="old_foto" value="<?php echo $id['foto_speaker'] ?>">
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
