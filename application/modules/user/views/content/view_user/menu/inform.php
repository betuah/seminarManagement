<style type="text/css">
.scroll_info{
    display:block;
    margin-top:5px;
    height: 250px;
    overflow:scroll;
}
</style>
    <div class="scroll_info">
      <div class="col-lg-12">
      	<p><i><b>Syarat & Ketentuan Untuk Mengikuti Kegiatan :</b></i></p>
      </div>
      <div class="col-sm-12" hidden="">
            <div class="input-group" id="forminfo" name="forminfo" >
                <select name="info" class="form-control" id="info">
                    <option value="0">Pilih</option>
                    <option value="2" hidden="">Pemakalah</option>
                </select>
            </div><br>
      </div>
        <div class="col-sm-12">
          <div class="awal">
            <ol>
                <li>Dimohon untuk melakukan pendaftaran sebelum batas registrasi yang telah ditentukan.</li>
                <li>Pilih jenis kegiatan yang akan di ikuti pada tabel kegiatan.</li>
                <li>Untuk dapat mengetahui bahwa anda telah melakukan pendaftaran, silahkan memilih menu <i><b>Status -> Pembayaran</b></i>.</li>
                <li>Segera melakukan pembayaran ke bagian administrasi ataupun panitia.</li>
                <li>Untuk dapat mengikuti kegiatan anda diwajibkan untuk mencetak tiket pada menu<i><b> Cetak -> Tiket.</b></i>
                </li>
            </ol>
            <p><i><b>Note :</b></i></p>
            <ol>
                <li>Bagi User yang mendaftar sebagai pemakalah, silahkan mengupload berkas pada menu<i><b> Status -> Berkas.</b></i><br></li>
                <li>Tiket hanya dapat dicetak jika proses pembayaran telah lunas.</li>
            </ol>
          </div>
        </div>
        <div id="select1" class="hasil" hidden="">
            <label id="Form1" name="Form1">
                 <p>Step 1 : </p>
                 <ul>
                    <li>Pilih Jenis Kegiatan yang ingin di ikuti</li>
                 </ul>
            </label>
        </div>
        <div id="select2" class="hasil" hidden="">
            <label id="Form2" name="Form2">
                 <p><i><b>Syarat menjadi pemakalah</b></i></p>
                 <ol>
                    <li>Setalah melakukan pendaftaran anda diwajibkan untuk mengupload berkas pada <i><b>Status -> Berkas.</b></i></li>
                    <li></li>
                 </ol>
            </label>
        </div>
      </div>
    </div>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('.hasil').hide();
    $('#info').change(function()
    {
      if($('#info').val()=='0')
      {
        $('.awal').show();
        $('#select1').hide();
        $('#select2').hide();
      }
      else if($('#info').val()=='1')
      {
        $('.awal').hide();
        $('#select1').show();
        $('#select2').hide();
      }
      else if($('#info').val()=='2')
      {
        $('.awal').hide();
        $('#select2').show();
        $('#select1').hide();
    }
  });
});
</script>
