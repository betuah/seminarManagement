<section id="location" class="section location">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php foreach($detail_event as $data) { ?>
                    <h3 class="section-title">Lokasi Seminar Nasional<br></h3>
                        <address>
                            <p><b>Program Studi <?php echo $data['nama_jur'];?></b></p>
                        </address>
                    <address>
                        <p>Tempat :<?php echo $data['lokasi'];?><br>
                            <?php echo $data['nama_ruangan'];?></p>
                    </address>
                </div>
                    <?php } ;?>
                <div class="col-sm-9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.382420696531!2d106.
                    73504311476974!3d-6.34449619540873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef77e633d4b5%3A0x5a8e61db3dbfa6e5!2s
                    Universitas+Pamulang!5e0!3m2!1sid!2sid!4v1483620942058" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="site-info">Designed and Developed by <a href="http://developerkampus.com"><b>Developer Kampus</b></a></p>
                    <ul class="social-block">
                        <li><a href=""><i class="ion-social-twitter"></i></a></li>
                        <li><a href=""><i class="ion-social-facebook"></i></a></li>
                        <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
                        <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>