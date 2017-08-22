<section id="schedule" class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><center>Daftar Panitia Seminar</h3><hr>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Prodi</th>
                            <th>Kontak</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                            $no = 1;
                            foreach($panitia as $pn) { ?>
                          <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $pn['nama'];?></td>
                            <td><?php echo $pn['tipe_panitia'];?></td>
                            <td><?php echo $pn['nama_jur'];?></td>
                            <td><?php echo $pn['tlpn'];?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                </div>
            </div>
    </section>