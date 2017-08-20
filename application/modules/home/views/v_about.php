<section id="about" class="section about">
        <div class="container">
            <div class="row">
            <h3 align="center"><b>INFORMASI SEMINAR NASIONAL</b></h3><hr>
                <div class="col-sm-6">
                    <h3 class="section-title">PROLOG</h3>
                    <?php foreach($detail_event as $data) { ?>
                    <p><?php echo $data['ket'];?></p>

                    <figure>
                        <img alt="" class="img-responsive"  src="<?php echo base_url();?>assets/file_upload/file_event/background/<?php echo $data['foto'];?>">
                    </figure>
                </div><!-- /.col-sm-6 -->
                <div class="col-sm-6">
                    <h3 class="section-title multiple-title">ACARA</h3>

                    <p>Telah dibuka pendaftaran Seminar Nasional Program Studi <?php echo $data['nama_jur'];?> dengan Detail sebagai berikut:</p>
                    <ul class="list-arrow-right">
                            <li>Tema :<?php echo $data['judul_event'];?></li>
                            <?php };?>
                            <?php foreach($speaker as $spe) { ?>   
                            <li>Pembicara :<?php echo $spe['nama_speaker'];?></li>
                            <?php } ;?>
                            <?php foreach($detail_event as $data) { ?>
                            <li>Tanggal : <?php echo $data['tgl_event'];?></li>
                            <li>Tempat :<?php echo $data['lokasi'];?></li>
                            <li>HTM : Rp.<?php echo $data['harga'];?></li>
                            <li>Kuota Peserta :<?php echo $data['quota'];?></li>
                            <?php } ;?>
                        
                    </ul>
                    <br><br><br><br>
                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
