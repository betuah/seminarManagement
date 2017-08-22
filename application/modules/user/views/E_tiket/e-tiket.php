<!DOCTYPE html>
<style type="text/css">
  #barcode{
    margin-top: 20px;
    margin-left: 550px;
  }
  .logo{
    align-content: left;
  }
  #barcode{
    margin-bottom: 50px;
  }
  #loc{
    margin-top: 20px; 
  }
  #tema{
    margin-top: 50px;
  }
</style>
<html>
  <head>
    <title>Tiket</title>
  </head>
  <body>
    <div align="center">
      <img src="<?php echo base_url(); ?>assets/img/logo.png" width="100px" height="100px" alt="pict">
      <h2><b>Universitas Pamulang</b></h2>
      <h5>Jalan Surya Kencana No. 1, Pamulang - Tangerang Selatan Banten, Indonesia<br>
          Phone : (021) 7412-566 | Fax : (021) 7470-9855
      </h5>
    </div>
    <hr><hr>
    <div class="body">
      <label>Acara &nbsp : <?php echo $id['nama_jen'] ?></label>
      <div align="right">Tgl. Daftar : <?php echo $id['tgl_reg']; ?></div>
      <div id="barcode" align="center">
        <img src="<?php base_url()?>assets/barcode/<?php echo $id['qr_code'] ?>"  alt="tiket">
      </div>
      <div id="form">
        <table class="table" width="600px" height="20px;" align="center">
          <thead align="left">
            <th>No. E-tiket</th>
            <th>Nama User</th>
            <th>Jenis Registrasi</th>
            <th>Waktu/Tanggal</th>
          </thead>
          <tbody align="left">
            <td><i><?php echo $id['id_reg'] ?></i></td>
            <td><i><?php echo $id['nama_usr'] ?></i></td>
            <td><i><?php echo $id['jen_reg'] ?></i></td>
            <td><i><?php $tgle= $id['tgl_event'] ?><?php echo date("d F Y",strtotime($tgle));?></i>
          </tbody>
        </table>
      </div>
      <div id="tema" align="center"><label><h3> " <i><?php echo $id['judul_event'] ?></i> " </h3></label></div>
      <div id="loc"><label><h4>Lokasi : <i><?php echo $id['tempat'] ?></i></h4></label></div>
    </div>
    <br>
    <div id="footer" align="left">
      <hr>
        <small>* Note : Diharapkan Untuk Membawa tiket ini sebagai bukti tanda masuk</small>
      <hr>
    </div>
  </body>
</html>