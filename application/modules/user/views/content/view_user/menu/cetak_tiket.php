<div class="modal-header" align="center">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><b>Cetak Tiket</b></h4>
</div>
<div class="modal-body">
      <div class="row">
          <!-- NEW WIDGET START -->
          <article class="col-xs-14 col-sm-14 col-md-14 col-lg-14">
          <!-- Widget ID (each widget will need unique ID)-->
          <div class="jarviswidget well jarviswidget-color-darken" id="wid-id-0" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false">
              <header>
                <span class="widget-icon"> <i class="fa fa-barcode"></i> </span>
                <h2>Item #44761 </h2>
                </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox"></div><!-- end widget edit box -->
                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <div class="padding-10">
                                    <div class="row show-grid">
                                      <div class="col-sm-2">
                                        <img src="<?php echo base_url(); ?>assets/img/logo.png" width="100" height="100" 
                                        alt="invoice icon">
                                      </div>
                                      <div class="col-sm-7">
                                        <p><h4><strong>Universitas Pamulang</strong></h4>
                                        <br>Jalan Surya Kencana No. 1, Pamulang - Tangerang Selatan Banten, Indonesia
                                          <br>
                                          Phone   : (021) 7412-566<br>
                                          Fax     : (021) 7470-9855</p>
                                      </div>
                                      <div class="col-sm-3" align="center">
                                          <img src="<?php ?>" width="100" height="100">
                                          <label><b># : </b><?php echo $id['id_reg'] ?></label>
                                      </div>
                                    </div>
                                    <div class="row show-grid">
                                      <div class="col-sm-12">
                                        <strong><hr></strong>
                                      </div>
                                    </div>
                                    <div class="row show-grid">
                                      <div class="col-sm-9"></div>
                                      <div class="col-sm-3">
                                        
                                      </div>
                                    </div>
                                    <br><br>
                                    <div class="row show-grid">
                                        <div class="col-sm-2">
                                          <label><b>Tgl. Daftar</b></label> <br> <i><?php echo $id['tgl_reg'] ?></i>
                                        </div>
                                        <div class="col-sm-2">
                                          <label><b>No. E-Tiket</b></label> <br> <i><?php echo $id['id_reg'] ?></i>
                                        </div>
                                        <div class="col-sm-3">
                                          <label><b>Nama Peserta</b></label> <br> <i><?php echo $id['nama_usr'] ?></i>
                                        </div>
                                        <div class="col-sm-2">
                                          <label><b>Jenis</b></label> <br> <i><?php echo $id['jen_reg'] ?></i>
                                        </div>
                                        <div class="col-sm-2">
                                          <label><b>Waktu Kegiatan</b></label> <br> <i><?php echo $id['tgl_akhir_reg'] ?></i>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row show-grid">
                                        <div class="col-sm-4">
                                            <label><b>Lokasi</b></label> <br> <i><?php echo $id['tempat'] ?></i>
                                        </div>
                                        <div class="col-sm-8">
                                            <i><h4>" <?php echo $id['judul_event'] ?> "</h4></i>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row show-grid">
                                        <div class="col-sm-12">
                                            <hr>
                                            <small>* Note : Diharapkan Untuk Membawa tiket ini sebagai bukti tanda masuk</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                              <!-- end widget content -->
                    </div><!-- end widget div -->
          </article> <!-- End Article tab 3-->
    </div><!--End Row tAB 3-->
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <a href="<?php echo base_url() . 'user/pdf/eticket/' . $id['id_reg'] ?>">
    <button type="button" class="btn btn-primary" name="cetak_pdf" id="cetak_pdf" class="easyui-linkbutton" 
    data-option="iconCls:'icon-print'">Cetak</button></a>
</div>