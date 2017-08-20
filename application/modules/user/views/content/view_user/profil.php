<style type="text/css">
.scroll-history{
    display:block;
    margin-top:5px;
    height:255px;
    overflow:scroll;
}
</style>

<!-- row -->
<div class="row">
	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark">
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-puzzle-piece"></i>
				<b>Profile</b>
			<span>>>
				ID Card
			</span>
		</h1>
	</div>
	<!-- end col -->
</div>
<!-- end row -->
<section>
<?php 
	if(!empty($get_v_user))
		foreach ($get_v_user as $v_user){}
?>
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title"><i class="icon fa fa-envelope"></i> ID Card</h3>
  			</div>
  			<div class="panel-body">
    			<div class="row">
  					<div class="col-md-4">
  						<img src="<?php echo base_url().'assets/smartadmin/img/avatars/male.png'?>" 
							style="height:150px;max-width:150px;">
						<!--<img src="<?php echo base_url()?>assets/img/<?php $v_user['img']; ?>" height="100px">-->
						<div class="padding-10" hidden="">
							<a href="<?php echo base_url().'user/detail/view_user/profil/'.$v_user['id_usr'] ?>" data-toggle="modal" data-target="#cpass"><i class="fa fa-image"></i> Upload Foto
							</a>
						</div>
						<div class="padding-10">
							<a href="<?php echo base_url().'user/detail/view_user/profil/'.$v_user['id_usr'] ?>" data-toggle="modal" data-target="#cpass"><i class="fa fa-key"></i> Change Password
							</a>
						</div>
						<div class="modal fade" id="cpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  							<div class="modal-dialog" role="document">
    							<div class="modal-content">
    							<!-- Tampil Form Registrasi-->

								</div>
							</div>
						</div>

  					</div>

  					<div class="col-md-6">
  						<h1><b><?php echo $v_user['nama_usr'] ?></b><span class="semi-bold"></span><br>
  						<small><?php echo $v_user['ket'] ?></small></h1>
  						<h5>ID : &nbsp <?php echo $v_user['id_usr']; ?></h5>
  						<h5><?php echo $v_user['jekel'] ?></h5>
  						<label><i class="fa fa-envelope"></i> &nbsp <?php echo $v_user['email'] ?></label><br>
  						<label><i class="fa fa-phone"></i> &nbsp <?php echo $v_user['no_tlpn'] ?></label><br>
  						<label><i class="fa fa-home"></i> &nbsp <?php echo $v_user['alamat'] ?></label>
  					</div>
				</div>
  			</div>
		</div>
	</div>
</div>
<!-- end row -->
</section>
<!-- end widget grid -->
