<!DOCTYPE html>
<html>
  <!-- Header -->
  <head>
    <meta charset="utf-8">
    <title> Seminar Nasional</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  </head>
  <!-- End Header -->

  <body>

    <!-- Content -->
    <table border='1' style="width: 100%">
      <tr>
        <th style="width: 5%"></th>
        <th colspan="1" style="width: 20%"></th>
        <th colspan="1" style="width: 20%"></th>
        <th colspan="1" style="width: 20%"></th>
        <th style="width: 15%"></th>
      </tr>
      <tr>
        <td colspan="2"><br><center><img src="<?php echo base_url(); ?>assets/img/logo.png" width="100" height="100" alt="invoice icon"></center><br></td>
        <td colspan="2"><center><h1 class="font-300"><b>Seminar E-Ticket</b></h1></center></td>
        <td colspan="1" rowspan="4"><center><img src="<?php echo base_url(); ?>assets/file_upload/qr_code/eticket/<?php echo $data['qr_code']; ?>" width="150" height="100" alt="invoice icon"></center></td>
      </tr>
      <tr>
        <td colspan="4"><strong>University of Pamulang</strong></td>
      </tr>
      <tr>
        <td colspan="4"><?php echo $data['nama_ruangan'].' , '.$data['lokasi']; ?></td>
      </tr>
      <tr>
        <td colspan="4"><?php echo $data['alamat']; ?></td>
      </tr>
      <tr>
        <td colspan="5">Phone   : (021) 7412-566Fax     : (021) 7470-9855</td>
      </tr>
      <tr>
        <td colspan="5"><br><br></td>
      </tr>
      <tr>
        <td colspan="3"><b><?php echo $data['jen_reg']; ?></b></td>
        <td colspan="1"><strong>Registration ID :</strong></td>
        <td colspan="1"><span> <?php echo $data['id_reg'] ?> </span></td>
      </tr>
      <tr>
        <td colspan="3">
          <strong>
            <?php
            if ($data['jekel'] == 'pria') {
              echo "Mr. ";
            } else {
              echo "Mrs. ";
            }
            echo $data['nama_usr']
            ?></strong>
        </td>
        <td colspan="1"><strong>Batas Akhir Pembayaran :</strong></td>
        <td colspan="1"><span class="pull-right"> <i class="fa fa-calendar"></i> <?php echo $data['tgl_akhir_reg'] ?> </span></td>
      </tr>
      <tr>
        <td colspan="3"><?php echo $data['email']; ?></td>
        <td colspan="1"><strong>Price :</strong></td>
        <td><span><strong>Rp <?php echo $data['harga'] ?>,00- </strong></span></td>
      </tr>
      <tr>
        <td colspan="5"><br><br></td>
      </tr>
      <tr>
        <th colspan="1">No.</th>
        <th colspan="3">Tema Seminar</th>
        <th colspan="1">Waktu Pelaksanaan Seminar</th>
      </tr>
      <tr>
        <td colspan="1"><center><strong>1</strong></center></td>
        <td colspan="3"><center><?php echo $data['judul_event']; ?></center></td>
        <td colspan="1"><center><?php echo $data['tgl_event']; ?></center></td>
      </tr>
      <tr>
        <td colspan="5"><br><br></td>
      </tr>
      <tr>
        <td colspan="3"><h4>Pembayaran Cash di : <br>Loket Universitas Pamulang</h4></td>
        <td colspan="1"><h3><strong>Status : <span class="text-success"></h3></td>
        <td colspan="1"><h3><center>
            <?php
              if ($data['status'] == '0') {
                echo "Belum Bayar";
              } elseif ($data['status'] == '1') {
                echo "LUNAS";
              } else {
                echo "HADIR";
              }
            ?></center></h3>
        </td>
      </tr>
      <tr>
        <td colspan="5">**Segera lakukan pembayaran sebelum batas akhir pembayaran. Peserta yang belum membayar tidak akan terhitung masuk kuota seminar</td>
      </tr>
      <tr>
        <th colspan="1"></th>
        <th colspan="1"></th>
        <th colspan="1"></th>
        <th colspan="1"></th>
        <th colspan="1"></th>
      </tr>
    </table>
    <!-- End Content -->

  </body>


</html>
