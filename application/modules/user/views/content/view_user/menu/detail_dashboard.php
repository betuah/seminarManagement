 <!-- Modal Print -->
<div class="modal-header" align="center">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel"><b>Form Registrasi</b></h4>
</div>
<div class="modal-body">
<form action="<?php echo base_url(); ?>user/c_reg/view_user/dashboard" id="daftar" class="smart-form" novalidate="novalidate" method="post">
    <!-- Table Registrasi <fieldset> Hidden-->
      <div class="row">
        <section class="col col-2" hidden="">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idusr" placeholder="ID User" value="<?php echo $this->session->userdata('uid'); ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
            value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6" hidden="">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idreg" placeholder="ID Registrasi" value="<?php echo $auto_id_reg; ?>">
          </label>
        </section>
        <section class="col col-2" hidden="">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="tglreg" placeholder="Tanggal Registrasi" value="<?php echo "".date("Y-m-d");?>">
          </label>
        </section>
        <section class="col col-2" hidden="">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idevent" id="idevent" placeholder="ID Event" value="<?php echo $id['id_event'] ?>" readonly="">
          </label>
        </section>
      </div>
      <!-- End Table Registrasi </fieldset> -->

    <fieldset>
      <div class="row">
        <section class="col col-4">
          <label class="input">
            <input type="text" name="namajen" id="namajen" placeholder="Jenis Kegiatan" value="<?php echo $id['nama_jen'] ?>" readonly="">
          </label>
        </section>
        <section class="col col-8">
          <label class="input">
            <input type="text" name="judulevent" id="judulevent" placeholder="Judul Event" value="<?php echo $id['judul_event'] ?>" readonly="">
            <input type="text" name="qty" id="qty" placeholder="Quota" value="<?php echo $id['judul_event'] ?>" readonly="">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-6">
            <select name="jenreg" class="form-control">
              <?php foreach ($get_v_user as $k) {
              if($k['ket'] == "Mahasiswa"){
                ?>
                  <option value="0">Pilih Jenis Registrasi</option>
                  <option value="1">Peserta</option>
                  <option value="2" hidden="">Pemakalah</option>
                <?php
                }else{?>
                <option value="0">Pilih</option>
                <option value="1">Peserta</option>
                <option value="2">Pemakalah</option>
              <?php }}?>
            </select>
        </section>

        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="tglevent" id="tglevent" placeholder="Tanggal Kegiatan" value="<?php $tgle = $id['tgl_event'] ?><?php echo date("d F Y",strtotime($tgle)); ?>" readonly="">
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-university"></i>
            <input type="text" name="namajur" id="namajur" placeholder="Jurusan" value="<?php echo $id['nama_jur'] ?>"
            readonly="">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-money"></i>
            <input type="text" name="harga" id="harga" placeholder="Biaya" value="<?php echo $id['harga'] ?>" readonly="">
          </label>
        </section>
        <section class="col col-6" hidden="">
          <label class="input"> <i class="icon-append fa fa-money"></i>
            <input type="text" name="status" id="status" placeholder="Status">
          </label>
        </section>
      </div>
    </fieldset>

    <footer>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Daftar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </footer>
  </form>
</div>
<!--End Modal -->

<script type="text/javascript">
  var $registerForm = $("#daftar").validate({
      // Rules for form validation
      rules : {
         namajen : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        judulevent : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        tglevent : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        namajur : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        harga : {
          required : true,
          minlength : 3,
          maxlength : 20
        }
      },

      // Messages for form validation
      messages : {
        namajen : {
          required : 'Please enter your current password'
        },
        judulevent : {
          required : 'Please enter new password'
        },
        tglevent : {
          required : 'Please enter new password'
        },
        namajur : {
          required : 'Please enter new password'
        },
        harga : {
          required : 'Please enter new password'
        }
      },
      // Do not change code below
      errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
      }
    });
</script>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('.tmplfile').hide();
    $('#form').change(function()
    {
      if($('#form').val()=='1')
      {
        $('#file').show();
        $('#file2').hide();
      }
      else if($('#form').val()=='2')
      {
        $('#file2').show();
        $('#file').hide();
    }
  });
});
</script>
