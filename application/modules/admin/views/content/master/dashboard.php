<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-home fa-fw "></i>
				Dashboard
			<span>
				Dashboard
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> TOTAl USER <span class="txt-color-blue"><i class="fa fa-users"></i> <?php echo $count_usr; ?></span></h5>
			</li>
			<li class="sparks-info">
				<h5> TOTAL REGISTRASI <span class="txt-color-purple"><i class="fa fa-edit"></i>&nbsp; <?php echo $count_reg; ?> </span></h5>
			</li>
			<li class="sparks-info">
				<h5> TOTAL EVENT <span class="txt-color-greenDark"><i class="fa fa-money"></i>&nbsp; <?php echo $count_event; ?> </span></h5>
			</li>
		</ul>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-1" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

				<header>
					<span class="widget-icon"> <i class="fa-fw fa fa-home"></i> </span>
					<h2>Dashboard</h2>

					<ul class="nav nav-tabs pull-right in" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Event</span></a>
						</li>

						<?php if ($this->session->userdata('jab') == 'Bendahara' || $this->session->userdata('jab') == 'Ketua') {?>
							<li>
								<a data-toggle="tab" href="#s2" onclick="return total('<?php echo $this->session->userdata('jur') ?>')"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Keuangan</span></a>
							</li>
						<?php } else {
							echo "";
						} ?>
					</ul>

				</header>

				<!-- widget div-->
				<div class="no-padding">
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">

					</div>
					<!-- end widget edit box -->

					<div class="widget-body">
						<!-- content -->
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
										<form class="form-horizontal">
											<fieldset>
												<legend>Event yang berjalan</legend>

												<div class="table-responsive col-xs-12">
													<table class="table table-bordered table-hover">
														<thead>
															<tr>
																<th style="width:60%">Event</th>
																<th style="width:22%">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$cdate = date ("Y-m-d");

																foreach ($get_event as $data) {
																	$edate = $data['tgl_event'];

																if ($edate > $cdate ) {

															?>
															<tr data-id="<?php echo $data['id_event']; ?>">
																<td>
																	<?php echo $data['judul_event']; ?>
																</td>
																<td>
																	<ul class="demo-btns">
																		<li>
																			<button type="button" name="button" class="btn btn-success" onclick="Details('<?php echo $data['id_event']; ?>')"><i class="fa  fa-search"></i> Detail</button>
																		</li>
																		<li>
																			<button type="button" name="button" class="btn btn-success" onclick="Daftar('<?php echo $data['id_event']; ?>')" data-toggle="modal" data-target="#regtambah"><i class="fa  fa-pencil-square-o"></i> Daftar</button>
																		</li>
																	</ul>
																</td>
															</tr>
															<?php
																	} else {
															?>
																	<tr>
																		<td colspan="2">Tidak Ada Event Yang Akan Dilaksanakan</td>
																	</tr>
															<?php
																	}
																}
															?>
														</tbody>
													</table><br>
												</div>
												<legend>Cari Event</legend>
												<section class="col-xs-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>Tema Event :</b></label>
														<label class="col-md-10 control-label" id="tema"></label>
													</div>
												</section>
												<section class="col-xs-10">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>ID Event</b></label>
														<div class="col-md-10">
															<input id="side" class="form-control" placeholder="Cari Berdasarkan ID atau Judul Event" name="ide" type="text"  list="idn" value="">
															<datalist id="idn">
																<?php foreach ($get_event as $v_evn): ?>
																	<option value="<?php echo $v_evn['id_event']; ?>"><?php echo $v_evn['judul_event']; ?></option>
																<?php endforeach; ?>
															</datalist>
														</div>
													</div>
												</section>
												<section class="col-xs-2">
													<button type="button" name="button" class="btn btn-success" onclick="Cari()"><i class="fa  fa-search"></i> Cari</button>
												</section>
											</fieldset>
										</form>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats" id="tgl">
										<form class="form-horizontal">
											<fieldset>
												<legend>Detail Keuangan</legend>

												<div class="form-group">
													<label class="col-md-4 control-label">Tanggal Event</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="tgle">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Tanggal Akhir Registrasi</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="tglar">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Peserta</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="peserta">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Pemakalah</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="pemakalah">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Belum Bayar</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="blunas">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Quota Tersisa</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="quota">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Quota</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="rquota">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Kehadiran</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="rabsen">
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>

								<div class="show-stat-microcharts">
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<div class="easy-pie-chart txt-color-orange" data-percent="" data-pie-size="50" id="preg">
											<span class="percent percent-sign" id="sreg">0</span>
										</div>
										<span class="easy-pie-title">Registrasi</i></span>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<div class="easy-pie-chart txt-color-greenLight" data-percent="" data-pie-size="50" id="plunas">
											<span class="percent percent-sign" id="slunas">0</span>
										</div>
										<span class="easy-pie-title">Pembayaran</span>
										<div class="sparkline txt-color-blue hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										</div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<div class="easy-pie-chart txt-color-blue" data-percent="" data-pie-size="50" id="pabsen">
											<span class="percent percent-sign keuangan" id="sabsen">0</span>
										</div>
										<span class="easy-pie-title">Kehadiran</span>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<div class="easy-pie-chart txt-color-red" data-percent="" data-pie-size="50" id="pquota">
											<span class="percent percent-sign quota" id="squota">0<i class="fa fa-caret-up"></i></span>
										</div>
										<span class="easy-pie-title">Quota Tersisa</span>
									</div>
								</div>

								<!-- Modal Tambah -->
								<div class="modal fade" id="regtambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Registrasi</h4>
											</div>
											<div class="modal-body no-padding">
												<form action="<?php echo base_url(); ?>admin/create/transaksi/reg" method="post" class="smart-form">
													<header>
														Tambah Data
													</header>

													<fieldset>
														<div class="row">
															<section class="col col-6">
																<label class="input"> <i class="icon-append fa fa-barcode"></i>
																	<input type="text" name="idreg" placeholder="No Reg" readonly value="<?php echo $auto_id_reg; ?>">
																	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
																</label>
															</section>
															<section class="col col-6">
																<label class="input"> <i class="icon-append fa fa-calendar"></i>
																	<input type="text" name="rdate" id="startdate" readonly="" value="<?php echo date("Y-m-d"); ?>">
																</label>
															</section>
														</div>
													</fieldset>

													<fieldset>
														<div class="row">
															<section class="col col-xs-6">
																<label class="input"> <i class="icon-append fa fa-user"></i>
																	<input id="idusr" class="form-control" placeholder="ID User" name="idusr" type="text"  list="usr">
																	<datalist id="usr">
																		<?php foreach ($get_usr as $v_usr): ?>
																			<option value="<?php echo $v_usr['id_usr']; ?>"><?php echo $v_usr['nama_usr']; ?></option>
																		<?php endforeach; ?>
																	</datalist>
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
																	<datalist id="evnt">
																		<?php foreach ($get_event as $v_evn): ?>
																			<option value="<?php echo $v_evn['id_event']; ?>"><?php echo $v_evn['judul_event']; ?></option>
																		<?php endforeach; ?>
																	</datalist>
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
																		<option value="0" selected="" disabled="">Jenis Registrasi</option>
																		<option value="1">Peserta</option>
																		<option value="2">Pemakalah</option>
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
							<!-- end s1 tab pane -->

							<div class="tab-pane fade in padding-10 no-padding-bottom" id="s2">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
										<form class="form-horizontal">
											<fieldset>
												<legend>Data Keuangan</legend>
												<?php if ($this->session->userdata('jur') == NULL): ?>
													<section class="col-sm-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>Pilih Prodi</b></label>
															<div class="col-md-8">
																<select style="width:100%" class="select2" onclick="total(this.value);">
																	<option value="0" selected="" disabled=""></option>
																	<?php foreach ($get_jur as $v_jur): ?>
																		<option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
														</div>
													</section>
												<?php endif; ?>

												<section class="col-sm-6">
													<div class="form-group">
														<label class="col-md-6 control-label"><b>TOTAL KEUANGAN : </b></label>
														<div class="col-md-6">
															<input class="form-control" readonly type="text" id="tot">
														</div>
													</div>
												</section>

												<div class="table-responsive col-xs-12">
													<table class="table table-bordered table-hover" id="evnt_table">
														<thead>
															<tr>
																<th style="width:75%">Event</th>
																<th style="width:15%">Action</th>
															</tr>
														</thead>
														<tbody id="test">

														</tbody>
													</table><br>
												</div>
												<legend>Cari Event</legend>
												<section class="col-xs-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>Tema Event :</b></label>
														<label class="col-md-10 control-label" id="tema"></label>
													</div>
												</section>
												<section class="col-xs-10">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>ID Event</b></label>
														<div class="col-md-10">
															<input id="ckeuangan" class="form-control" placeholder="Cari Berdasarkan ID atau Judul Event" name="ide" type="text"  list="idn" value="">
															<datalist id="idn">
																<?php foreach ($get_event as $v_evn): ?>
																	<option value="<?php echo $v_evn['id_event']; ?>"><?php echo $v_evn['judul_event']; ?></option>
																<?php endforeach; ?>
															</datalist>
														</div>
													</div>
												</section>
												<section class="col-xs-2">
													<button type="button" name="button" class="btn btn-success" onclick="cari_keuangan()"><i class="fa  fa-search"></i> Cari</button>
												</section>
											</fieldset>
										</form>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats" id="tgl">
										<form class="form-horizontal">
											<fieldset>
												<legend>Detail Event</legend>

												<div class="form-group">
													<label class="col-md-4 control-label">Target</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="target">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Prediksi Keuangan</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="pk">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Total Pembayaran Akhir</label>
													<div class="col-md-8">
														<input class="form-control" readonly type="text" id="tpa">
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<!-- end s2 tab pane -->

						</div>
						<!-- end content -->
					</div>
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
	</div>
</section>
<!-- end widget grid -->

<script type="text/javascript">
		function total (JUR) {

			//Counting
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()."api/r"; ?>',
				data: {"id": JUR, "act":"get"},
				success: function(dash) {
					var total = dash['sum'].total_bayar;
					$('#tot').val('Rp. '+ total);

					// Show Event
					var edate;
					var cdate 	= '<?php date ("Y-m-d"); ?>';
					var data = '';

					for (var i = 0; i < dash['evnt'].length; i++) {
						edate = dash['evnt'][i].tgl_event;
						if (cdate < edate) {
							data += '<tr><td>'+ dash['evnt'][i].judul_event +'</td><td><button type="button" name="button" class="btn btn-success" onclick="detail_keuangan('+ dash['evnt'][i].id_event +')"><i class="fa  fa-search"></i> Detail</button></td></tr>';
						} else {
							data += "<tr><td>Tidak Ada Data</td></tr>";
						}
					}
					$('#test').html(data);
				},
				error: function () {
					alert("cannot check fetch client data");
				}
			});
    }

		function detail_keuangan(ID) {
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()."api/event"; ?>',
				data: {"id": ID, "act":"get"},
				success: function(dash) {
					var hrg 	 = dash[0].harga
					var target = dash[0].quota * hrg;
					$('#target').val('Rp. '+target);

					$.ajax({
						type: 'GET',
						url: '<?php echo base_url()."api/dash"; ?>',
						data: {"id": ID, "act":"get"},
						success: function(dash) {
							var p		= dash.peserta == 0 ? 0 : dash.peserta;
							var l		= dash.lunas == 0 ? 0 : dash.lunas;
							var pk 	= p * hrg;
							var tpa = l * hrg;

							$('#pk').val('Rp. '+pk);
							$('#tpa').val('Rp. '+tpa);
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

		function cari_keuangan() {
			var ID = $('#ckeuangan').val();

			$.ajax({
				type: 'GET',
				url: '<?php echo base_url()."api/event"; ?>',
				data: {"id": ID, "act":"get"},
				success: function(dash) {
					var hrg 	 = dash[0].harga
					var target = dash[0].quota * hrg;
					$('#target').val('Rp. '+target);

					$.ajax({
						type: 'GET',
						url: '<?php echo base_url()."api/dash"; ?>',
						data: {"id": ID, "act":"get"},
						success: function(dash) {
							var p		= dash.peserta == 0 ? 0 : dash.peserta;
							var l		= dash.lunas == 0 ? 0 : dash.lunas;
							var pk 	= p * hrg;
							var tpa = l * hrg;

							$('#pk').val('Rp. '+pk);
							$('#tpa').val('Rp. '+tpa);
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

<script>
	// Auto Count
  $(document).ready(function(){
    setInterval(function() {
			var randomnumber=Math.floor(Math.random()*100)
			var x = document.getElementById("sparks").innerHTML;
			document.getElementById("sparks").innerHTML = x;
		}, 5000);
  });
</script>

<script type="text/javascript">
	$('#idusr').change(function() {
		var jur = $(this).val();

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/users"; ?>',
			data: {"id": jur, "act":"get"},
			success: function(res) {
				$('#nmusr').val(res[0].nama_usr);
			},
			error: function () {
				alert("cannot check fetch client data");
			}
		});
	});

	function Daftar(ID) {
		$('#idevnt').val(ID);

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/event"; ?>',
			data: {"id": ID, "act":"get"},
			success: function(res) {
				var tema 		= res[0].judul_event;
				$('#jdl_evnt').val(res[0].judul_event);
				var qty 		= res[0].quota;

				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()."api/dash"; ?>',
					data: {"id": ID},
					success: function(dash) {
						var rqty 		= qty - dash.peserta;
						if (rqty == '0') {
							alert("Maaf Quota Peserta Untuk Event "+tema+" Sudah Habis");
							$('#idusr').val('');
							$('#nmusr').val('');
							$('#idevnt').val('');
							$('#jdl_evnt').val('');
							$('#rqty').val('');
						}
						$('#rqty').val(rqty);
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

	function Details(ID){
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/event"; ?>',
			data: {"id": ID, "act":"get"},
			success: function(res) {
				// alert(res[0].tgl_event);
				$('#tgle').val(res[0].tgl_event);
				$('#tglar').val(res[0].tgl_akhir_reg);
				$('#rquota').val(res[0].quota);

				var qty = res[0].quota;

				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()."api/dash"; ?>',
					data: {"id": ID, "act":"get"},
					success: function(dash) {

						$('#peserta').val(dash.peserta);
						$('#pemakalah').val(dash.pemakalah);

						var rqty 		= qty - dash.lunas;
						var reg  		= dash.peserta / qty * 100;
						var rquota 	= dash.peserta == 0 ? 0 : qty % dash.lunas;
						var quota		= rqty / qty * 100;
						// var lunas		= dash.peserta == 0 ? 0 : ((dash.lunas / dash.peserta) * 100);
						var lunas		= dash.peserta == 0 ? 0 : ((dash.lunas / qty) * 100);
						var blunas	= ((dash.blunas / qty) * 100);
						var absen		= dash.absen == 0 ? 0 : ((dash.lunas / dash.absen) * 100);

						$('#quota').val(rqty);
						$('#blunas').val(dash.blunas);
						$('#rabsen').val(dash.absen);

						// alert(quota);
						$('#preg').data('easyPieChart').update(reg.toFixed(1));
						$('#plunas').data('easyPieChart').update(lunas.toFixed(1));
						$('#pquota').data('easyPieChart').update(quota.toFixed(1));
						$('#pabsen').data('easyPieChart').update(absen.toFixed(1));

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

	function Cari(){
		var id = $('#side').val();
		$('#preg').data('easyPieChart').update(0);
		$('#plunas').data('easyPieChart').update(0);
		$('#pquota').data('easyPieChart').update(0);
		$('#pabsen').data('easyPieChart').update(0);

		$.ajax({
			type: 'GET',
			url: '<?php echo base_url()."api/event"; ?>',
			data: {"id": id, "act":"get"},
			success: function(res) {
				// alert(res[0].tgl_event);
				var text = document.getElementById("tema");
				text.innerHTML = '<center><h2><b>'+res[0].judul_event+'</b></h2></center>';

				$('#tgle').val(res[0].tgl_event);
				$('#tglar').val(res[0].tgl_akhir_reg);
				$('#rquota').val(res[0].quota);

				var qty = res[0].quota;

				$.ajax({
					type: 'GET',
					url: '<?php echo base_url()."api/dash"; ?>',
					data: {"id": id, "act":"get"},
					success: function(dash) {

						$('#peserta').val(dash.peserta);
						$('#pemakalah').val(dash.pemakalah);

						var rqty 		= qty - dash.lunas;

						var reg  		= dash.peserta / qty * 100;
						var rquota 	= dash.peserta == 0 ? 0 : qty % dash.lunas;
						var quota		= rqty / qty * 100;
						// var lunas		= dash.peserta == 0 ? 0 : ((dash.lunas / dash.peserta) * 100);
						var lunas		= dash.peserta == 0 ? 0 : ((dash.lunas / qty) * 100);
						var blunas	= ((dash.blunas / qty) * 100);
						var absen		= dash.peserta == 0 ? 0 : ((dash.lunas / dash.absen) * 100);

						$('#quota').val(rqty);
						$('#blunas').val(dash.blunas);

						// alert(quota);
						$('#preg').data('easyPieChart').update(reg.toFixed(1));
						$('#plunas').data('easyPieChart').update(lunas.toFixed(1));
						$('#pquota').data('easyPieChart').update(quota.toFixed(1));
						$('#pabsen').data('easyPieChart').update(absen.toFixed(1));

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

	pageSetUp();
	// PAGE RELATED SCRIPTS

	// pagefunction
	var pagefunction = function() {

		/* BASIC ;*/
			var responsiveHelper_datatable_fixed_column = undefined;
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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
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
	            "sSwfPath": "<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
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

	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();

	    } );
	    /* END COLUMN FILTER */
	};

	// load related plugins

	loadScript("<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo base_url(); ?>assets/smartadmin/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});


</script>
