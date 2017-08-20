<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semnas UNPAM</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/bootstrap.min.css" >
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/responsive.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/fonts/font-awesome.min.css">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/fonts/simple-line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/animate.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/owl.carousel.css">
    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="assets/landingpages/css/colors/blue.css" media="screen" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Main Slider Section Start -->
    <div id="carousel-area">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

          <div class="item active">
            <img src="assets/landingpages/img/slider/bg-3.jpg" alt="" width='100%'>
            <div class="carousel-caption">
              <h2 class="wow fadeInRight" data-wow-delay="300ms">Selamat Data Di Website Seminar Nasional Universitas Pamulang <br>
                Silahkan Pilih Tema Seminar Sesuai Program Studi Anda</h2>
            </div>
          </div>
         <?php foreach($judul as $data) { ?>
          <div class="item">
            <img src="<?php echo base_url();?>timthumb.php?src=<?php echo base_url()."assets/file_upload/file_event/background/";?><?php echo $data['foto'];?>&w=1400%&h=690%"
                                style="max-width:100%;">
                <div class="carousel-caption">
                    <a href="<?php echo base_url()."Home/detail_event/".$data['id_event'];?>">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">Seminar Nasional Program Studi <?php echo $data['nama_jur'];?>
                        <br><?php echo $data['judul_event'];?></h2>
                    </a>
                <div class="buttons">
                    <a class="btn btn-lg btn-common wow fadeInLeft" data-wow-delay="300ms" href="<?php echo base_url()."Home/detail_event/".$data['id_event'];?>">Lihat Selengkapnya</a>
                </div>
            </div>
          </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
          <span class="icon-arrow-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
          <span class="icon-arrow-right" aria-hidden="true"></span>
        </a>
         <?php };?>
      </div>
    </div>
</div>

    <!-- jQuery Load -->
    <script src="assets/landingpages/js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/landingpages/js/bootstrap.min.js"></script>
    <!-- Countdown Js -->
    <script src="assets/landingpages/js/jquery.countdown.min.js"></script>
    <!-- Smooth scroll JS -->
    <script src="assets/landingpages/js/smooth-scroll.js"></script>
    <!-- Wow Scroll -->
    <script src="assets/landingpages/js/wow.js"></script>
    <!-- Owl carousel -->
    <script src="assets/landingpages/js/owl.carousel.min.js"></script>
    <!-- Slicknav js -->
    <script src="assets/landingpages/js/jquery.slicknav.js"></script>
    <!--  Nivo lightbox Js -->
    <script src="assets/landingpages/js/nivo-lightbox.js"></script>
    <!-- Contact Form Scripts -->
    <script src="assets/landingpages/js/form-validator.min.js"></script>
    <script src="assets/landingpages/js/contact-form-script.js"></script>

    <!-- All Js plugin -->
    <script src="assets/landingpages/js/main.js"></script>
    <!-- Map JS -->
    <script type="text/javascript" src="assets/landingpages/js/jquery.mapit.min.js"></script>
    <script src="assets/landingpages/js/initializers.js"></script>

  </body>
</html>
