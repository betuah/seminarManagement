<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Registrasi</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/transaksi/reg/' . $id['id_reg']; ?>" method="post" enctype="multipart/form-data" class="smart-form">
    <header>
      Tambah Data
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="noreg" placeholder="No Reg" readonly value="<?php echo $id['id_reg']; ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="sdate" id="startdate" placeholder="Tanggal Mulai" value="<?php echo $id['tgl_reg']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="idusr" placeholder="ID User" value="<?php echo $id['id_usr']; ?>" required="">
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"><i class="icon-append fa fa-envelope-o"></i>
            <input type="text" id="" name="idevnt" placeholder="ID Event"  value="<?php echo $id['id_event']; ?>">
          </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-6">
          <label class="select">
            <select name="jenreg">
              <option value="0" selected="" disabled="">Jenis Registrasi</option>
              <option value="1">Peserta</option>
              <option value="2">Pemakalah</option>
            </select> <i></i> </label>
        </section>
        <section class="col col-6">
          <label class="input"><i class="icon-append fa fa-user"></i>
            <input type="text" name="stat" placeholder="Status" readonly value="<?php echo $id['status']; ?>">
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
