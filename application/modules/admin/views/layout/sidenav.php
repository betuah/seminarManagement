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
            <a href="A_content/master/user" title="User"><i class="fa fa-lg fa-fw fa-users txt-color-blue"></i> <span class="menu-item-parent">User</span></a>
          </li>
          <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-briefcase txt-color-blue"></i> <span class="menu-item-parent">Kepanitiaan</span></a>
            <ul>
              <li class="">
                <a href="A_content/master/panitia" title="Panitia"><i class="fa fa-lg fa-fw fa-user txt-color-blue"></i> <span class="menu-item-parent">Panitia</span></a>
              </li>
              <li class="">
                <a href="A_content/master/periode" title="Periode"><i class="fa fa-lg fa-fw fa-clock-o txt-color-blue"></i> <span class="menu-item-parent">Periode</span></a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="A_content/master/jurusan" title="Jurusan"><i class="fa fa-lg fa-fw fa-university txt-color-blue"></i> <span class="menu-item-parent">Jurusan</span></a>
          </li>
          <li class="">
            <a href="A_content/master/lokasi" title="Jurusan"><i class="fa fa-lg fa-fw fa-map-marker txt-color-blue"></i> <span class="menu-item-parent">Lokasi</span></a>
          </li>
          <li class="">
            <a href="#"><i class="fa fa-lg fa-fw fa-graduation-cap txt-color-blue"></i> <span class="menu-item-parent">Event</span></a>
            <ul>
              <li class="">
                <a href="A_content/master/event" title="Seminar"><i class=" glyphicon glyphicon-book txt-color-blue"></i> <span class="menu-item-parent">Event</span></a>
              </li>
              <li class="">
                <a href="A_content/master/speaker" title="Speaker"><i class="fa fa-lg fa-fw fa-user-md txt-color-blue"></i> <span class="menu-item-parent">Pembicara</span></a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="A_content/master/paper" title="Berkas"><i class="fa fa-lg fa-fw fa-folder-open txt-color-blue"></i> <span class="menu-item-parent">Berkas</span></a>
          </li>
        </ul>
      </li>
      <li class="">
        <a href="#"><i class="fa fa-lg fa-fw fa-code-fork txt-color-blue"></i> <span class="menu-item-parent">Data Transaksi</span></a>
        <ul>
          <li class="">
            <a href="A_content/transaksi/reg" title="Registrasi"><i class="fa fa-lg fa-fw fa-pencil-square-o txt-color-blue"></i> <span class="menu-item-parent">Registrasi</span></a>
          </li>
          <li class="">
            <a href="A_content/transaksi/bayar" title="Pembayaran"><i class="fa fa-lg fa-fw fa-credit-card txt-color-blue"></i> <span class="menu-item-parent">Pembayaran</span></a>
          </li>
          <li class="">
            <a href="A_content/transaksi/sertifikat" title="Sertifikat"><i class="fa fa-lg fa-fw fa-certificate txt-color-blue"></i> <span class="menu-item-parent">Sertifikat</span></a>
          </li>
          <li class="">
            <a href="A_content/transaksi/absen" title="Kehadiran"><i class="fa fa-lg fa-fw fa-user-md txt-color-blue"></i> <span class="menu-item-parent">Cek Kehadiran</span></a>
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
