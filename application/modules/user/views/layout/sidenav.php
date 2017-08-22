<aside id="left-panel">

  <!-- User info -->
  <div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as is -->

      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        <img src="<?php echo base_url().'assets/smartadmin/img/avatars/male.png' ?>" alt="me" class="online" />
        <span>
          <?php echo $this->session->userdata('nama'); ?>
        </span>
        <i class="fa fa-angle-down"></i>
      </a>

    </span>
  </div>
  <!-- end user info -->
  <nav>
    <ul>
      <li class="#">
        <a href="U_content/view_user/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home txt-color-blue"></i> <span class="menu-item-parent">Dashboard</span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-check txt-color-blue"></i> <span class="menu-item-parent">Status</span></a>
        <ul>
          <li class="">
            <a href="U_content/view_user/paper" title="Paper"><i class="fa fa-lg fa-fw fa-file txt-color-blue"></i> <span class="menu-item-parent">Berkas</span></a>
          </li>
          <li class="">
            <a href="U_content/view_user/status" title="Pembayaran"><i class="fa fa-lg fa-fw fa-money txt-color-blue"></i> <span class="menu-item-parent">Pembayaran</span></a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-history txt-color-blue"></i> <span class="menu-item-parent">Cetak</span></a>
        <ul>
          <li class="">
            <a href="U_content/view_user/sert" title="sertifikat"><i class="fa fa-lg fa-fw fa-certificate txt-color-blue"></i> <span class="menu-item-parent">Sertifikat</span></a>
          </li>
          <li class="">
            <a href="U_content/view_user/tiket" title="tiket"><i class="fa fa-lg fa-fw fa-ticket txt-color-blue"></i> <span class="menu-item-parent">Tiket</span></a>
          </li>
        </ul>
      </li>
      <li hidden="">
        <a href="" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-lg fa-fw fa-sign-out txt-color-blue"></i>
        <span class="menu-item-parent">Logout</span></a>
      </li>
    </ul>
  </nav>
  <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
