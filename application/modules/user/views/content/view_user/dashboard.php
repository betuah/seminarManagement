<style type="text/css">
	.show-grid {
		margin-bottom: 5px;
	}
</style>
<!-- row -->
<div class="row">
	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-puzzle-piece"></i>
				<b>Dashboard</b>
			<span>>>
				Detail Kegiatan
			</span>
		</h1>
	</div>
</div>

<section>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
  				<div class="panel-heading"> <i class="icon fa fa-tags"> </i> Information</div>
  					<div class="panel-body">
    					<?php $this->load->view('menu/inform'); ?>
  					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
	    		<!-- Default panel contents -->
	    		<div class="panel-heading"><i class="icon fa fa-table"></i> Tabel Kegiatan</div>
	    		<!-- Table -->
  					<table class="table">
    					<thead>
								<tr>
									<th class="col-xs-1">Tanggal Kegiatan</th>
									<th class="col-xs-1">Batas Registrasi</th>
									<th class="col-xs-1">Jurusan</th>
									<th class="col-xs-4">Tema Kegiatan</th>
									<th class="col-xs-1">Quota</th>
									<th class="col-xs-2">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(empty($get_v_event)){?> <tr>
										<td colspan="6">Tidak ada event</td>
									</tr> <?php }
									else{
					        		$no=1;
											$cdate = date ("Y-m-d");

					        		foreach ($get_v_event as $row) {

												$edate = $row['tgl_event'];
												if ($edate > $cdate ) {

					        	?>
						        <tr>
						          	<td hidden=""><?php echo $row['id_event'] ?></td>
						          	<td><?php $tgle= $row['tgl_event'] ?><?php echo date("d F Y",strtotime($tgle));?></td>
						          	<td><?php $tgl= $row['tgl_akhir_reg'] ?><?php echo date("d F Y",strtotime($tgl));?></td>
						          	<td><?php echo $row['nama_jur'] ?></td>
						          	<td><?php echo $row['judul_event'] ?></td>
												<td><?php echo $row['quota'] ?></td>
						          	<td>
											<a class="btn btn-primary" data-toggle="modal" data-target="#creg" onclick="Daftar('<?php echo $row['id_event'] ?>')">Daftar
											</a>
						          			<a href="javascript:void(0);" class="btn btn-info"
						          			onclick="Details('<?php echo $row['id_event']; ?>')">Detail
											</a>
						          	</td>
						         </tr>
								<?php }}} ?>
					      </tbody>
  					</table>

  					<!-- Detail Event-->
  					<div class="panel-body">
  						<!-- Menu Bottom -->
						<div class="row">
							<div class="col-sm-12">
								<hr>
								<div class="padding-10">

									<ul class="nav nav-tabs tabs-pull-right">
										<li class="active">
											<a href="#a1" data-toggle="tab">Detail Event</a>
										</li>
										<li>
											<a href="#a2" data-toggle="tab">Peserta</a>
										</li>
										<li>
											<a href="#a3" data-toggle="tab">Recent Articles</a>
										</li>
										<li class="pull-left">
											<span class="margin-top-10 display-inline"> <i class="fa fa-rss text-success"> </i>
											<b>Activity</b></span>
										</li>
									</ul>

									<div class="tab-content padding-top-10">
										<?php
												if(!empty($get_v_detail))
												foreach ($get_v_detail as $detail){
 												}
										?>
										<!-- tab 1 -->
										<div class="tab-pane fade in active" id="a1">
											<div align="center">
												<label type="text" name="judul" id="jdl">
													<h2><b><?php echo $detail['judul_event'] ?></b></h2>
												</label>
												<label id="snmusr"></label>

											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="panel panel-default">
														<div class="panel-heading">
															<label id="nm_speak"><?php echo $detail['nama_speaker'] ?></label>
														</div>
  														<div class="panel-body">
  															<div hidden=""><label type="hidden" id="id_speak"></label></div>
															<div class="col-sm-5" id="img01">

															</div>
															<div class="col-sm-5">
																<label id="inst_speak"><?php echo $detail['institusi'] ?></label>
															</div>
															<div class="col-sm-5">
																<label id="mail_speak"><?php echo $detail['email'] ?></label>
															</div>
														</div>
													</div>
												</div>
											<div class="col-sm-4">
												<div class="panel panel-default">
													<div class="panel-heading">
														<label id="nmspeak"><?php echo $detail['nama_speaker'] ?></label>
														</div>
  														<div class="panel-body">
  															<div hidden=""><label type="hidden" id="idspeak"></label></div>
															<div class="col-sm-5" id="img02">
															</div>
															<div class="col-sm-5">
																<label id="instspeak"><?php echo $detail['institusi'] ?></label>
															</div>
															<div class="col-sm-5">
																<label id="mailspeak"><?php echo $detail['email'] ?></label>
															</div>
														</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel panel-default">
													<div class="panel-heading">
														<label id="nmspeaker"><?php echo $detail['nama_speaker'] ?></label>
														</div>
  														<div class="panel-body">
  															<div hidden=""><label type="hidden" id="idspeaker"></label></div>
															<div class="col-sm-5" id="img03">
															</div>
															<div class="col-sm-5">
																<label id="instspeaker"><?php echo $detail['institusi'] ?></label>
															</div>
															<div class="col-sm-5">
																<label id="mailspeaker"><?php echo $detail['email'] ?></label>
															</div>
														</div>
												</div>
											</div>
											</div>
												<div class="panel panel-default">
  													<div class="panel-body">
  													<div class="col-sm-12">
  														<div class="row show-grid">
   												 			<div class="col-sm-3">
   												 			<i class="icon fa fa-university"> </i> <b> Fakultas </b>
   												 			</div>
   												 			<div class="col-sm-3">
   												 				: <label id="jur">
   												 				<?php echo $detail['nama_jur']; ?></label>
   												 			</div>
														</div>
  														<div class="row show-grid">
   												 			<div class="col-sm-3">
   												 			<i class="icon fa fa-edit"> </i> <b> Nama Kegiatan</b>
   												 			</div>
   												 			<div class="col-sm-3">
   												 				: <label id="jns">
   												 				<?php echo $detail['nama_jen']; ?></label>
   												 			</div>
														</div>
   												 		<div class="row show-grid">
   												 			<div class="col-sm-3">
   												 				<i class="fa fa-calendar"> </i> <b> Waktu </b>
   												 			</div>
   												 			<div class="col-sm-3">
   												 				: <label id="tgle"> <?php echo $detail['tgl_event']; ?></label>
   												 			</div>
   												 		</div>
   												 		<div class="row show-grid">
   												 			<div class="col-sm-3">
   												 				<i class="fa fa-money"> </i> <b> Biaya </b>
   												 			</div>
   												 			<div class="col-sm-3">
   												 				: Rp.
																<a href="javascript:void(0);" rel="tooltip" title="Biaya pendaftaran" data-placement="bottom" data-original-title="Available"><label id="hrga"><?php echo $detail['harga'] ?>
																</label></a>
   												 			</div>
   												 		</div>
   												 		<div class="row show-grid">
   												 			<div class="col-sm-3">
   												 				<i class="fa fa-pencil"> </i> <b> Ketersidiaan Quota</b>
   												 			</div>
   												 			<div class="col-sm-8"> :
   												 				<a href="javascript:void(0);" rel="tooltip"
   												 				title="Kuota Tersedia" data-placement="bottom" data-original-title="Available"><b>
   												 				<label id="kuota"><?php echo $detail['quota']; ?></label></b></a>
															</div>
   												 		</div>
   												 		<div class="row show-grid" align="center">
   												 			<div class="col-sm-3">
   												 				<h4><i><b>Tempat</b></i></h4>
   												 			</div>
   												 			<div class="col-sm-3"><b><i>:
   												 				<label id="lokasi"><b><?php echo $detail['lokasi'] ?>, <?php echo $detail['nama_ruangan'] ?><br><?php echo $detail['alamat'] ?></b>
   												 				</label></i></b>
   												 			</div>
   												 		</div>
   												 	</div>
  													</div>
												</div>
										</div>
										<!--End tab 1 -->

										<div class="tab-pane fade" id="a2">
											<div class="alert alert-info fade in">
												<button class="close" data-dismiss="alert"> × </button>
												<i class="fa-fw fa fa-info"></i>
												<strong>50 new members </strong>joined today!
											</div>
											<?php
												if(empty($get_v_peserta)){}
													else{
												foreach ($get_v_peserta as $reg) :

											?>
											<div class="user" title="email@company.com">
												<img src="<?php echo base_url().'assets/smartadmin/img/avatars/male.png' ?>"><a href="javascript:void(0);"></a>
												<div class="email">
													<label ><?php echo $reg['nama_usr'] ?></label><br>
													<label ><?php echo $reg['email'] ?></label>
													<label ></label>
												</div>
											</div>
										<?php endforeach;}?>
											<div class="text-center" id="a2">
												<ul class="pagination pagination-sm">
												<li class="">
													<a href="javascript:void(0);">Prev</a>
												</li>
												<li class="active">
													<a href="javascript:void(0);">1</a>
												</li>
												<li>
													<a href="javascript:void(0);">2</a>
												</li>
												<li>
													<a href="javascript:void(0);">...</a>
												</li>
												<li>
													<a href="javascript:void(0);">99</a>
												</li>
												<li>
													<a href="javascript:void(0);">Next</a>
												</li>
												</ul>
											</div>
										</div><!-- end tab -->
										<div class="tab-pane fade" id="a3">
											<div class="row">
											<div class="col-sm-6">
												<?php $tgl_event = $detail['tgl_event'] ?>
												<?php echo date("d F Y",strtotime($tgl_event));?>
											</div>
											<div class="col-sm-6">
												<h6 class="no-margin"><a href="javascript:void(0);">
												<?php echo $detail['judul_event'] ?></a></h6>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div><br>
						</div><!-- end Menu -->
  					</div>
  					<!-- End Detail Event-->
				</div>
				<!-- Modal Detail Event -->
					<div class="modal fade" id="screg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  						<div class="modal-dialog" role="document">
    						<div class="modal-content">
    							<!-- Tampil Form Registrasi-->
									<div class="modal-header" align="center">
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <h4 class="modal-title" id="myModalLabel"><b>Form Registrasi</b></h4>
									</div>
									<div class="modal-body">
									<form action="<?php echo base_url(); ?>user/c_reg/view_user/dashboard" id="daftar" class="smart-form" novalidate="novalidate" method="post">
									    <!-- Table Registrasi <fieldset> Hidden-->
									      <div class="row">
									        <section class="col col-2" hidden="">
									          <label class="input"> <i class="icon-append fa fa-user"></i>
									            <input type="text" name="idusr" placeholder="ID User" value="<?php echo $this->session->userdata('uid'); ?>">
									            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
									            value="<?php echo $this->security->get_csrf_hash(); ?>">
									          </label>
									        </section>
									        <section class="col col-6" hidden="">
									          <label class="input"> <i class="icon-append fa fa-user"></i>
									            <input type="text" name="idreg" placeholder="ID Registrasi" value="<?php echo $auto_id_reg; ?>">
									          </label>
									        </section>
									        <section class="col col-2" hidden="">
									          <label class="input"> <i class="icon-append fa fa-calendar"></i>
									            <input type="text" name="tglreg" placeholder="Tanggal Registrasi" value="<?php echo "".date("Y-m-d");?>">
									          </label>
									        </section>
									        <section class="col col-2" hidden="">
									          <label class="input"> <i class="icon-append fa fa-user"></i>
									            <input type="text" name="idevent" id="idevent" placeholder="ID Event" value="<?php echo $id['id_event'] ?>" readonly="">
									          </label>
									        </section>
									      </div>
									      <!-- End Table Registrasi </fieldset> -->
									  </form>
									</div>
									<!--End Modal -->
							</div>
						</div>
					</div>

					<!-- Modal Tambah -->
					<div class="modal fade" id="creg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Registrasi</h4>
								</div>
								<div class="modal-body no-padding">
									<form action="<?php echo base_url(); ?>user/daftar" method="post" class="smart-form">
										<header>
											Form Pendaftaran Seminar
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-xs-12">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="rdate" id="startdate" readonly="" value="<?php echo date("Y-m-d"); ?>">
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
													</label>
												</section>
											</div>
										</fieldset>

										<fieldset>
											<div class="row">
												<section class="col col-xs-6">
													<label class="input"> <i class="icon-append fa fa-user"></i>
														<input id="idusr" class="form-control" placeholder="ID User" name="idusr" type="text"  list="usr" readonly>
													</label>
												</section>
												<section class="col col-xs-6">
													<label class="input"> <i class="icon-append fa fa-user"></i>
														<input type="text" name="nmusr" placeholder="Nama User" readonly id="nmusr">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-xs-6">
													<label class="input"> <i class="icon-append fa fa-graduation-cap"></i>
														<input id="idevnt" class="form-control" placeholder="ID Event" name="idevnt" type="text"  list="evnt" readonly>
													</label>
												</section>
												<section class="col col-xs-6">
													<label class="input"> <i class="icon-append fa fa-graduation-cap"></i>
														<input type="text" id="jdl_evnt" name="jdlevnt" placeholder="Nama Event" disabled="">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-6">
													<label class="select">
														<select name="jenreg">
															<?php foreach ($get_v_user as $k) {
															if($k['ket'] == "Mahasiswa"){
																?>
																	<option value="0">Pilih Jenis Registrasi</option>
																	<option value="1">Peserta</option>
																	<option value="2" hidden="">Pemakalah</option>
																<?php
																}else{?>
																<option value="0">Pilih Jenis Registrasi</option>
																<option value="1">Peserta</option>
																<option value="2">Pemakalah</option>
															<?php }}?>
														</select> <i></i> </label>
												</section>
												<section class="col col-6">
													<label class="input"><i class="icon-append fa fa-bookmark"></i>
														<input type="text" name="stat" placeholder="Sisa Quota" readonly id="rqty">
													</label>
												</section>
											</div>
										</fieldset>

										<footer>
											<button type="submit" class="btn btn-primary">
												Simpan
											</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Batal
											</button>
										</footer>
									</form>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
</section>

<script type="text/javascript">
	function Daftar(ID){
		ide = ID;
		idu = '<?php echo $this->session->userdata('uid') ?>';

		$('#idusr').val(idu);
		$('#idevnt').val(ide);


		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/users"; ?>',
			data: {"id": idu, "act":"get"},
			success: function(res_usr) {
				$('#nmusr').val(res_usr[0].nama_usr);

			},
			error: function () {
				alert("cannot check fetch client data");
			}
		});

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/event"; ?>',
			data: {"id": ide, "act":"get"},
			success: function(res_evnt) {
				$('#jdl_evnt').val(res_evnt[0].judul_event);
				var qty = res_evnt[0].quota;

				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()."api/dash"; ?>',
					data: {"id": ide, "act":"get"},
					success: function(dash) {
						var rqty 		= qty - dash.lunas;
						if (rqty == '0') {
							alert("Maaf Quota Peserta Untuk Event "+tema+" Sudah Habis");
							window.location.href='<?php echo base_url()."User#U_content/view_user/dashboard"?>';
						} else {
							$('#rqty').val(rqty);
						}
					},
					error: function () {
						alert("cannot check fetch client data");
					}
				});
			},
			error: function () {
				alert("cannot check fetch client data");
			}
		});
	}
</script>

<script type="text/javascript">
	function Details(ID){
		var id = ID;
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/u_event"; ?>',
			data: {"id": id, "act":"get"},
			success: function(res) {

				//Detail Event
				document.getElementById("jdl").innerHTML = '<h2><b>'+res[0].judul_event+'</b></h2>';
				document.getElementById("hrga").innerHTML = res[0].harga;
				document.getElementById("tgle").innerHTML = res[0].tgl_event;
				document.getElementById("jur").innerHTML = res[0].nama_jur;
				document.getElementById("jns").innerHTML = res[0].nama_jen;
				document.getElementById("lokasi").innerHTML = '<b>'+res[0].lokasi+' , '+res[0].nama_ruangan+'<br>'+res[0].alamat+'</b>';
				// alert(res[0].tgl_event);
				//Speaker 1
				document.getElementById("id_speak").innerHTML = res[0].id_speaker;
				document.getElementById("nm_speak").innerHTML = res[0].nama_speaker;
				document.getElementById("inst_speak").innerHTML = res[0].institusi;
				document.getElementById("mail_speak").innerHTML = res[0].email;
				//Speaker 2
				document.getElementById("idspeak").innerHTML = res[1].id_speaker;
				document.getElementById("nmspeak").innerHTML = res[1].nama_speaker;
				document.getElementById("instspeak").innerHTML = res[1].institusi;
				document.getElementById("mailspeak").innerHTML = res[1].email;
				//Speaker 3
				document.getElementById("idspeaker").innerHTML = res[2].id_speaker;
				document.getElementById("nmspeaker").innerHTML = res[2].nama_speaker;
				document.getElementById("instspeaker").innerHTML = res[2].institusi;
				document.getElementById("mailspeaker").innerHTML = res[2].email;

				var img01 = '';
				img01 += '<img src="<?php echo base_url()."assets/file_upload/file_event/pembicara/'+ res[0].foto_speaker +'" ?>" height="100px" width="100px">';
				$('#img01').html(img01);

				var img02 = '';
				img02 += '<img src="<?php echo base_url()."assets/file_upload/file_event/pembicara/'+ res[1].foto_speaker +'" ?>" height="100px" width="100px">';
				$('#img02').html(img02);

				var img03 = '';
				img03 += '<img src="<?php echo base_url()."assets/file_upload/file_event/pembicara/'+ res[2].foto_speaker +'" ?>" height="100px" width="100px">';
				$('#img03').html(img03);

				//quota
				var qty = res[0].quota;

				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()."api/dash"; ?>',
					data: {"id": id, "act":"get"},
					success: function(dash) {

						var rqty 		= qty - dash.lunas;
						document.getElementById("kuota").innerHTML = rqty;

					},
					error: function () {
						alert("cannot check fetch client data");
					}
				});


				//Detail Peserta

				var ID = res[0].id_event;

					$.ajax({
						type: 'GET',
						url: '<?php echo base_url()."api/u_paper"; ?>',
						data: {"id": id,"act":"get"},
						success: function(user){;
							document.getElementById("id_e").innerHTML = res[0].judul_event;
							document.getElementById("id_f").innerHTML = res[1].id_paper;
							document.getElementById("id_g").innerHTML = res[2].id_paper;
							// document.getElementById("id_f").innerHTML = res[1].judul_event;
							// document.getElementById("id_g").innerHTML = res[2].judul_event;
						}
				});

			},
			error: function () {
				alert("cannot check fetch client data");
			}
		});
	}
</script>

<script type="text/javascript">

	pageSetUp();

	// pagefunction
	var pagefunction = function() {
		//console.log("cleared");
		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;

			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */

		/* COLUMN FILTER  */
	    var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}

	    });

	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();

	    } );
	    /* END COLUMN FILTER */

		/* COLUMN SHOW - HIDE */
		$('#datatable_col_reorder').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_col_reorder) {
					responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_col_reorder.respond();
			}
		});

		/* END COLUMN SHOW - HIDE */

		/* TABLETOOLS */
		$('#datatable_tabletools').dataTable({

			// Tabletools options:
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
	        "oTableTools": {
	        	 "aButtons": [
	             "copy",
	             "csv",
	             "xls",
	                {
	                    "sExtends": "pdf",
	                    "sTitle": "SmartAdmin_PDF",
	                    "sPdfMessage": "SmartAdmin PDF Export",
	                    "sPdfSize": "letter"
	                },
	             	{
                    	"sExtends": "print",
                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                	}
	             ],
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
	        },
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_tabletools) {
					responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_tabletools.respond();
			}
		});

		/* END TABLETOOLS */

	};

	// load related plugins

	loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/jquery.dataTables.min.js' ?>", function(){
		loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.colVis.min.js' ?>", function(){
			loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.tableTools.min.js' ?>", function(){
				loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.bootstrap.min.js' ?>", function(){
					loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatable-responsive/datatables.responsive.min.js' ?>", pagefunction)
				});
			});
		});
	});

</script>
