<!--ini jquery buat hide kolom form nim -->
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});

</script>
</script>
<section id="registration" class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><center>Formulir Pendaftaran Akun Seminar Universitas Pamulang</h3><hr>
                </div>
            </div>
            <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>home/crud_home/insert" method="post" class="form-horizontal">
                    <div class="form-group">
                    <label class="control-label col-xs-3" for="telp">Status :</label>
                        <div class="col-xs-3">
                            <select class="form-control" name="column_select" id="column_select">
                                    <option >-Silahkan Pilih-</option>
                                    <option value="nim">Mahasiswa UNPAM</option>
                                    <option value="nidn">Dosen UNPAM</option>
                                    <option value='external'>Peserta Luar UNPAM</option>
                            </select>
                        </div>
                    </div>
                    <div class="nim box">
                        <div class="form-group">
                            <label id="nim" class="control-label col-xs-3" for="telp">Masuka NIM :</label>
                            <div class="col-xs-9">
                                <input type="tel" class="form-control" name="nim" placeholder="Masukan NIM Anda" >
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="nidn box">
                        <div class="form-group">
                            <label id="nim" class="control-label col-xs-3" for="telp">Masukan Kode Dosen :</label>
                            <div class="col-xs-9">
                                <input type="tel" class="form-control" name="nidn" placeholder="Masukan Kode Dosen Anda Anda" >
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-xs-3" for="Nama">Nama:</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name="nama_usr" placeholder="Nama Anda">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputEmail">Email :</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control"  name='email' placeholder="Email" >
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="inputPassword">Kata Sandi :</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" name="password" placeholder="Masukan Kata Sandi" >
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="telp">No. Telp :</label>
                        <div class="col-xs-9">
                            <input type="tel" class="form-control" name="no_tlpn" placeholder="Nomor Telepon / Handphone" >
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="telp">Instansi :</label>
                        <div class="col-xs-9">
                            <input type="tel" class="form-control" id="telp" placeholder="Masukan Perusahaan / Universitas" required>
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label class="control-label col-xs-3">Tanggal Lahir :</label>
                    <div class="col-xs-3">
                        <select class="form-control">
                            <option>Tanggal</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control">
                            <option>Bulan</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control">
                            <option>Tahun</option>
                        </select>
                    </div>
                    </div>
                -->
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="Alamat">Alamat:</label>
                        <div class="col-xs-9">
                            <textarea rows="3" class="form-control" name="alamat" placeholder="Masukan Alamat Lengkap"></textarea>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Kelamin:</label>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="jekel" value="Laki-laki"> Laki-laki
                            </label>
                        </div>
                        <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="jekel" value="Perempuan"> Perempuan
                            </label>
                        </div>
                    </div>
                <!--
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Setuju">  Saya Setuju dengan <a href="#">Kebijakan dan Ketentuan</a> yang berlaku.
                            </label>
                        </div>
                    </div>
                -->
                    <br>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" class="btn btn-primary" value="Kirim">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>
                    </div>
                </form>   
        </div>
    </section>