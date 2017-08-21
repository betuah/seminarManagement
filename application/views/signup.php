<div class="page-signup" ng-controller="authCtrl">

    <div class="wrapper">
        <div class="main-body">
            <div class="body-inner">
                <div class="card bg-white">
                    <div class="card-content">
                        <section class="logo text-center">
                            <h1><a href="<?php echo base_url(); ?>">SEMNAS UNPAM</a></h1>
                        </section>
                        <form class="form-horizontal" action="<?php echo base_url(); ?>auth/signup" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="text" required class="form-control" name="nama">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <span class="input-bar"></span>
                                        <label>Nama</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="text" required class="form-control" name="email">
                                        <span class="input-bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="text" required class="form-control" name="tlpn">
                                        <span class="input-bar"></span>
                                        <label>No. Telepon</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="password" required class="form-control" name="pass">
                                        <span class="input-bar"></span>
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="password" required class="form-control" name="repass">
                                        <span class="input-bar"></span>
                                        <label>Re Password</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                      <label>Pilih Program Studi</label>
                                        <select class="" name="jur">
                                          <?php foreach ($get_jur as $v_jur): ?>
            																<option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
            															<?php endforeach; ?>
                                        </select>
                                        <span class="input-bar"></span>

                                    </div>
                                </div>
                            </fieldset>
                            <div class="card-action no-border text-right">
                                <a href="<?php echo base_url(); ?>auth">Login</a>
                                <button type="submit" name="button" class="md-raised btn-w-md md-primary md-button color-primary"><i class="zmdi zmdi-mail-send"></i> Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
