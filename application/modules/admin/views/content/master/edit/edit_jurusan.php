<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Jurusan</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/jurusan/' . $id['id_jurusan']; ?>" method="post" class="smart-form">
    <header>
      Edit Data Jurusan
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idjur" placeholder="No Reg" value="<?php echo $id['id_jurusan']; ?>" readonly="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="nama_jur" placeholder="Nama Jurusan" value="<?php echo $id['nama_jur']; ?>" >
          </label>
        </section>
      </div>

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
