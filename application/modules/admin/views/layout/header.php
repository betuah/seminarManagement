
<head>
  <meta charset="utf-8">
  <title> Seminar Nasional</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- #CSS Links -->
  <!-- Basic Styles -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/font-awesome.min.css">

  <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/smartadmin-production-plugins.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/smartadmin-production.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/smartadmin-skins.min.css">

  <!-- SmartAdmin RTL Support -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/smartadmin-rtl.min.css">

  <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/smartadmin/css/demo.min.css">

  <!-- #FAVICONS -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/smartadmin/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url(); ?>assets/smartadmin/img/favicon/favicon.ico" type="image/x-icon">

  <!-- #GOOGLE FONT -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/sptouch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/touch-icon-ipad-retina.png">

  <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <!-- Startup image for web apps -->
  <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
  <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
  <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>assets/smartadmin/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/dist/jquery-confirm.min.css">

  <style media="screen">
    <?php
      $lvl = $this->session->userdata('level');
      $jab = $this->session->userdata('jab');
      if ($jab == 'Ketua') {
        echo '.shk {
          display:none;
        }';
      } elseif ($jab == 'Bendahara') {
        echo '.shb {
          display:none;
        }';
      } elseif ($jab == 'Anggota') {
        echo '.sha {
          display:none;
        }';
      }
    ?>
  </style>

</head>
