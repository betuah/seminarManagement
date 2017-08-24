<?php
  if ($this->session->userdata('level')=='1' || $this->session->userdata('level')=='4') {
?>
<!DOCTYPE html>
<html>
  <!-- Header -->
  <?php $this->load->view('layout/header'); ?>
  <!-- End Header -->

  <body>
    <!-- Body Header -->
      <?php $this->load->view('layout/b_header'); ?>
    <!-- End Body Header -->

    <!-- SideNav -->
      <?php
        $lvl = $this->session->userdata('level');
        $jab = $this->session->userdata('jab');
        if ($lvl == '4') {
          if ($jab == 'Ketua') {
            $this->load->view('layout/sidenav_pengurus');
          } elseif ($jab == 'Bendahara') {
            $this->load->view('layout/sidenav_bendahara');
          } else {
            $this->load->view('layout/sidenav_pengurus');
          }
        } elseif ($lvl == '1') {
          $this->load->view('layout/sidenav_admin');
        }
      ?>
    <!-- End SideNav -->

    <!-- Content -->
      <?php $this->load->view('layout/content'); ?>
    <!-- End Content -->

    <!-- Footer -->
      <?php $this->load->view('layout/footer'); ?>
    <!-- End Footer -->

    <!-- JavaScript -->
      <?php $this->load->view('layout/js'); ?>
    <!-- End JavaScript -->
  </body>

</html>
<?php
  } else {
    redirect('auth');
  }
?>
