<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">lokasi</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/master/lokasi/' . $id['id_lokasi']; ?>" method="post" class="smart-form">
    <header>
      Edit Data lokasi
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-codepen"></i>
            <input type="text" name="idloc" placeholder="ID Lokasi" value="<?php echo $id['id_lokasi']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-building"></i>
            <input type="text" name="loc" placeholder="Nama Tempat Ex: Kampus A" value="<?php echo $id['lokasi']; ?>">
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa  fa-location-arrow"></i>
            <input type="text" name="lat" placeholder="Latitude" value="<?php echo $id['lat']; ?>" required="" required>
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa  fa-location-arrow"></i>
            <input type="text" name="long" placeholder="Longitude" required="" value="<?php echo $id['long']; ?>">
          </label>
        </section>
        <section class="col col-xs-12">
          <label class="input"> <i class="icon-append fa fa-home"></i>
            <input type="text" name="namaru" placeholder="Nama Ruangan" required="" value="<?php echo $id['nama_ruangan']; ?>">
          </label>
        </section>
        <section class="col col-xs-12">
          <label class="textarea"> <i class="icon-append fa fa-map-marker"></i>
            <textarea rows="4"class="custom-scroll"  type="text" name="alamat" placeholder="Alamat Lengkap" required=""><?php echo $id['alamat']; ?></textarea>
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
