<div class="page-signin">

    <div class="wrapper">
        <div class="main-body">
            <div class="body-inner">
                <div class="card bg-white">
                    <div class="card-content">
                        <section class="logo text-center">
                            <h1><a href="<?php echo base_url(); ?>">SEMNAS UNPAM</a></h1>
                        </section>
                        <form class="form-horizontal" action="<?php echo base_url(); ?>auth/login" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="text" name="username" required class="form-control" >
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <span class="input-bar"></span>
                                        <label>Username</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="ui-input-group">
                                        <input type="password" name="password" required class="form-control">
                                        <span class="input-bar"></span>
                                        <label>Password</label>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="card-action no-border text-right">
                      <button type="submit" name="button" class="md-raised btn-w-md md-primary md-button md-ink-ripple color-primary">Sign in</button>
                    </div>
                    </form>
                </div>
                <div class="additional-info">
                    <span class="divider-h"></span>
                    <a href="<?php echo base_url(); ?>home/detail_event/2017101001#registration">Registrasi</a>
                    <span class="divider-h"></span>
                </div>
            </div>
        </div>
    </div>
</div>
