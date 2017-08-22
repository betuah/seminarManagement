<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
</div>
<div class="modal-body no-padding">
  <form action="<?php echo base_url() . 'admin/update/transaksi/bayar/' . $id['id_bayar']; ?>" method="post" enctype="multipart/form-data" class="smart-form">
    <header>
      Edit Data Pemabayaran
    </header>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="id" placeholder="ID Pembayaran" disabled="" value="<?php echo $id['id_bayar']; ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="select">
            <select name="j_event">
              <option value="0" selected="" disabled="">Jenis Pembayaran</option>
              <option value="1">Cash</option>
              <option value="2">Transfer</option>
            </select> <i></i> </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="noreg" placeholder="No Registrasi">
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="nama" placeholder="Nama" disabled="">
          </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="nama" placeholder="Tipe Event" disabled="">
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="nama" placeholder="Tipe Pendaftar" disabled="">
          </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-xs-12">
          <label for="file" class="input input-file">
            <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload Bukti Pembayaran" readonly="">
          </label>
        </section>
      </div>

      <div class="row">
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="hrg" placeholder="Harga" disabled="">
          </label>
        </section>
        <section class="col col-xs-6">
          <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            <input type="text" name="tbyr" placeholder="Total Bayar" >
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
