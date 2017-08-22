<!DOCTYPE html>
<html>
  <!-- Header -->
  <?php $this->load->view('layout/header') ?>
  <!-- End Header -->
  <body>
    <!-- Body Header -->
      <?php $this->load->view('layout/b_header') ?>
    <!-- End Body Header -->

    <!-- SideNav -->
      <?php $this->load->view('layout/sidenav') ?>
    <!-- End SideNav -->

    <!-- Content -->
      <?php $this->load->view('layout/content') ?>
    <!-- End Content -->

    <!-- Footer -->
      <?php $this->load->view('layout/footer') ?>
    <!-- End Footer -->

    <!-- JavaScript -->
      <?php $this->load->view('layout/js') ?>
    <!-- End JavaScript -->
  </body>
</html>
