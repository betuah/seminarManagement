<section id="speakers" class="section speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Speakers</h3>
                </div>
            </div>
            <?php foreach($speaker as $spe) { ?>
                    <div class="col-md-4">
                        <div class="speaker">
                            <figure>
                                <img alt="" class="img-responsive center-block" 
                                 src="<?php echo base_url();?>timthumb.php?src=<?php echo base_url()."assets/file_upload/file_event/pembicara/";?><?php echo $spe['foto_speaker'];?>&w=300%&h=300%"
                                style="max-width:100%;">
                            </figure>
                            <h4><?php echo $spe['nama_speaker'];?></h4>
                            <p><?php echo $spe['institusi'];?></p>
                            <!-- <ul class="social-block">
                                <li><a href=""><i class="ion-social-twitter"></i></a></li>
                                <li><a href=""><i class="ion-social-facebook"></i></a></li>
                                <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
                                <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                            </ul> -->
                        </div><!-- /.speaker -->
                    </div><!-- /.col-md-4 -->
                    <?php };?>
            </div><!-- /.row -->
        </div>
        
    </section>
