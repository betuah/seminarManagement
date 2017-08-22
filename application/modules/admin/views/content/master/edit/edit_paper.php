<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Data Berkas</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url(); ?>admin/create/master/paper" method="post" enctype="multipart/form-data" class="smart-form">
    <header class="">
      No.Makalah : <?php echo $id['id_paper']; ?>
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="id_reg" placeholder="No Reg" value="REG0000000001">
            <input type="hidden" name="id_paper" readonly value="<?php echo $id['id_paper']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="pdate" id="startdate" placeholder="Tanggal Upload" value="<?php echo date("Y-m-d"); ?>" readonly="">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="jdl_mklh" placeholder="Judul Makalah" value="<?php echo $id['nama_paper']; ?>">
          </label>
        </section>
        <section class="col col-xs-12">
          <label for="file" class="input input-file">
            <div class="button"><input type="file" name="paper" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Unggah Berkas Anda dalam format .pdf" readonly="">
          </label>
        </section>
      </div>
    </fieldset>

    <footer>
      <button type="submit" name="papertambah" class="btn btn-primary">
        Simpan
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Batal
      </button>
    </footer>
  </form>
</div>
</div>
