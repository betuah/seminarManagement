<section id="cek" class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><center>Form Pencarian Data Sertifikat</h3><hr>
                </div>
                <form id='cari_sertifikat' action="<?php echo base_url(); ?>home/Home/cari_sertifikat" method="post">
                <div class="form-group">
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="id_sertifikat" placeholder="Silahkan Masukan Kode Sertifikat">
                        <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
                     </div>
                      <input type="submit" class="cari" name="cari" value="Cari Sertifikat">
                 </div>
            </div>
            </form>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>Kode Sertifikat</th>
                            <th>Tema Seminar</th>
                          </tr>
                        </thead>
                        <tbody id='data-sertifikat'>
                            <tr>
                                <td colspan=5><center>Sertifikat</center></td>
                            </tr>
            
                        </tbody>
                      </table>
                </div>
            </div>
    </section>
    <style>
.cari {
    background-color: #42A5F5; /* Green */
    border: none;
    color: white;
    padding: 10px   40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    width: 270px;
}
</style>
<script type="text/javascript">
    $('#cari_sertifikat').on('submit', function(e) {
        e.preventDefault();

        var no_sertifikat = $('input[name=id_sertifikat]', this).val();
        $.get('/semnas/home/cek_sertifikat/'+no_sertifikat)
        .done(function(res) {
            var data = res.data;

            var tr = [
                '<tr>',
                    '<td>1</td>',
                    '<td>'+data.id_usr+'</td>',
                    '<td>'+data.nama_usr+'</td>',
                    '<td>'+data.no_sertifikat+'</td>',
                    '<td>'+data.judul_event+'</td>',
                '</tr>'
            ].join('\n');

            $('#data-sertifikat').html(tr);
        })
        .fail(function(jqXHR) {
            var tr = [
                '<tr>',
                    '<td colspan=5><center>Data tidak ditemukan</center></td>',
                '</tr>'
            ].join('\n');

            $('#data-sertifikat').html(tr);  
        });
    });
</script>