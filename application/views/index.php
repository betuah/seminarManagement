<!doctype html>
<html class="no-js">
    <head>
      <meta charset="utf-8">
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Semnas Unpam</title>
      <meta name="description" content="Responsive Admin Web App with Bootstrap and AngularJS">
      <meta name="keywords" content="angularjs admin, admin templates, admin themes, bootstrap admin">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

      <!-- Needs images, font... therefore can not be part of main.css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/styles/loader.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,500,700,300,300italic,500italic|Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
      <!-- end Needs images -->

      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/styles/main.css">
    </head>
    <body>
      <!-- Start Content -->
        <?php
          if ($this->session->userdata('level')=='1' || $this->session->userdata('level')=='4') {
            redirect(base_url().'Admin');
          } elseif ($this->session->userdata('level')=='3') {
            redirect(base_url().'User');
          } else {
            $this->load->view($req);
          }
        ?>
      <!-- End Content -->

      <!-- Start Java Script -->
        <script src="<?php echo base_url(); ?>assets/material/scripts/vendor.js"></script>
        <script src="<?php echo base_url(); ?>assets/material/scripts/ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/material/scripts/app.js"></script>
      <!-- End Java Script -->
    </body>
</html>
