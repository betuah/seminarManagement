<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Cek Berkas</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/transaksi/cek_paper/' . $id['id_paper']; ?>" method="post" class="smart-form">
    <header>
      Periksa Berkas
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-xs-12">
          <h1>Preview File PDF dengan No Makalah <?php echo $id['id_paper']; ?></h1>
        </section>
      </div>
      <div class="">
        <embed width="600" height="450" src="assets\file_upload\file_paper\<?php echo $id['paper']; ?>.pdf" type="application/pdf"></embed>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-xs-12">
          <label class="select">
            <select name="status">
              <option value="0" selected="" disabled="">Konfirmasi Berkas</option>
              <option value="Di Terima">Terima</option>
              <option value="Di Tolak">Tolak</option>
            </select><i></i>
          </label>
        </section>
      </div>
    </fieldset>

    <footer>
      <button type="submit" name="paperedit" class="btn btn-primary">
        Simpan
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Batal
      </button>
    </footer>
  </form>
</div>
