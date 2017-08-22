<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SemNas-UNPAM</title>

    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landingpages/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landingpages/bower_components/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landingpages/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/landingpages/assets/css/logincss.css">
</head>
<body data-spy="scroll" data-target="#site-nav">
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-items">
            </div>
        </div><!-- /.container -->
    </nav>
    <header id="site-header" class="site-header valign-center">
        <div class="intro">
            <h1>Selamat Anda Telah Berhasil Registrasi</h1>
            <h2>Selanjutnya Tekan Tombol Kembali Untuk Ke Menu Utama</h2>
            <p>Atau Tekan Tombol Login Untuk Melihat Halaman Pribadi Anda</p>
            <button onclick="goBack()" class="button button4">Kembali</button>
            <a href="<?php echo base_url()."auth" ?>">
                <button class="button button4">login</button></a>
        </div>
    </header>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <?php echo $this->load->view('v_login'); ?>
    <!-- script -->
    <script src="<?php echo base_url();?>assets/landingpages/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/landingpages/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/landingpages/bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/landingpages/assets/js/main.js"></script>
</body>
</html>
