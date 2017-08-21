<?php
  if ($this->session->userdata('level')=='1' || $this->session->userdata('level')=='4') {
?>

<aside id="left-panel">

  <!-- User info -->
  <div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as is -->

      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        <img src="<?php echo base_url(); ?>assets/smartadmin/img/avatars/sunny.png" alt="me" class="online" />
        <span>
          <?php echo $this->session->userdata('nama'); ?>
        </span>
      </a>

    </span>
  </div>
  <!-- end user info -->

  <nav>
    <ul>
      <li class="">
        <a href="A_content/master/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home txt-color-blue"></i> <span class="menu-item-parent">Dashboard</span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-database txt-color-blue"></i> <span class="menu-item-parent">Data Master</span></a>
        <ul>
          <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-graduation-cap txt-color-blue"></i> <span class="menu-item-parent">Event</span></a>
            <ul>
              <li class="">
                <a href="A_content/master/event" title="Seminar"><i class=" glyphicon glyphicon-book txt-color-blue"></i> <span class="menu-item-parent">Event</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="">
        <a href="#"><i class="fa fa-lg fa-fw fa-code-fork txt-color-blue"></i> <span class="menu-item-parent">Data Transaksi</span></a>
        <ul>
          <li class="">
            <a href="A_content/transaksi/bayar" title="Pembayaran"><i class="fa fa-lg fa-fw fa-credit-card txt-color-blue"></i> <span class="menu-item-parent">Pembayaran</span></a>
          </li>
          <li class="">
            <a href="A_content/transaksi/sertifikat" title="Sertifikat"><i class="fa fa-lg fa-fw fa-certificate txt-color-blue"></i> <span class="menu-item-parent">Sertifikat</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
<?php
  } else {
    redirect('auth');
  }
?>
