<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Edit periode</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/periode/' . $id['id_periode']; ?>" method="post" class="smart-form">
    <header>
      Edit Periode Kepanitiaan
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="select">
            <select name="jenreg">
              <option value="<?php echo $id['id_periode']; ?>" selected="" disabled="">Periode</option>
              <option value="<?php date('Y').'1' ?>"><?php echo date('Y').'1' ?></option>
              <option value="<?php date('Y').'2' ?>"><?php echo date('Y').'2' ?></option>
            </select> <i></i> </label>
        </section>
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append fa fa-codepen"></i>
            <input type="text" name="id_panitia" placeholder="ID Panitia" required="" value="<?php echo $id['id_panitia']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
