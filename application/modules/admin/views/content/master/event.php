<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-pencil-square-o fa-fw "></i>
				Master
			<span>
				Event
			</span>
		</h1>
	</div>

</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon blue"> <i class="fa fa-edit"></i> </span>
					<h2>Data Event</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<form action="<?php echo base_url(); ?>admin/create/master/event" method="post" enctype="multipart/form-data" class="smart-form" id="order-form" novalidate="novalidate">
								<div class="col col-md-12">
									<header>
										No. <?php echo $auto_id_evn; ?>
									</header>
									<fieldset>
										<div class="row">
											<section class="col col-xs-12">
												<label class="input"> <i class="icon-append fa fa-user"></i>
													<input type="hidden" name="id_evn" value="<?php echo $auto_id_evn; ?>">
													<input type="text" name="tema" placeholder="Judul Seminar" required="">
													<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
												</label>
											</section>
										</div>

										<div class="row">
											<section class="col col-md-4">
												<label class="select">
													<select name="periode" required="">
														<option value="0" selected="" disabled="">Periode</option>
														<?php foreach ($get_per as $v_per): ?>
															<option value="<?php echo $v_per['id_periode'] ?>"><?php echo $v_per['id_periode'] ?></option>
														<?php endforeach; ?>
													</select> <i></i> </label>
											</section>
											<section class="col col-md-4">
												<label class="input"> <i class="icon-append fa fa-briefcase"></i>
													<input type="number" name="quota" min="1" max="4000" maxlength="4" placeholder="Quota" required="">
												</label>
											</section>
											<section class="col col-md-4">
												<label class="input"> <i class="icon-append fa fa-money"></i>
													<input type="text" name="hrg" placeholder="Harga" required="">
												</label>
											</section>
										</div>
									</fieldset>

									<fieldset>
										<div class="row">
											<section class="col col-6">
												<label class="select">
													<select name="id_jur" required="">
														<option value="0" selected="" disabled="">Program Studi</option>
														<?php foreach ($get_jur as $v_jur): ?>
															<option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
														<?php endforeach; ?>
													</select> <i></i> </label>
											</section>
											<section class="col col-6">
												<label class="select">
													<select name="jen_evn" required="">
														<option value="0" selected="" disabled="">Jenis Event</option>
														<option value="1">Seminar</option>
														<option value="2">Workshop</option>
													</select> <i></i> </label>
											</section>
										</div>

										<div class="row">
											<section class="col col-6">
												<label class="input"> <i class="icon-append fa fa-calendar"></i>
													<input type="text" name="edate" id="edate" placeholder="Tanggal Di Mulai Event" required="">
												</label>
											</section>
											<section class="col col-6">
												<label class="input"> <i class="icon-append fa fa-calendar"></i>
													<input type="text" name="rdate" id="rdate" placeholder="Tanggal Terakhir Registrasi Event" required="">
												</label>
											</section>
											<section class="col col-6">
												<label class="input"> <i class="icon-append fa  fa-calendar"></i>
													<input type="number" name="batas_byr" placeholder="Batas Pembayaran Ex: 7 Hari" required="">
												</label>
											</section>
											<section class="col col-6">
												<label class="select">
													<select name="idloc" required="">
														<option value="0" selected="" disabled="">Lokasi</option>
														<?php foreach ($get_loc as $v_loc): ?>
															<option value="<?php echo $v_loc['id_lokasi'] ?>"><?php echo $v_loc['nama_ruangan']." - ".$v_loc['lokasi'] ?></option>
														<?php endforeach; ?>
													</select> <i></i> </label>
											</section>
										</div>

										<section class="">
											<label for="file" class="input input-file">
												<div class="button"><input type="file" name="bg_event" required onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Event Wallpaper .jpg .png" required readonly="">
											</label>
										</section>
									</fieldset>
								</div>

								<div class="col col-md-12" >
									<header>
										Tambah Pembicara
									</header>
										<fieldset>
											<div class="row">
												<section class="col col-12">
													<table id="mytable" class="table table-bordered">
														<thead>
															<tr>
																<th>Nama Pembicara</th>
																<th>Institusi</th>
																<th>No Telepon</th>
																<th>Email</th>
																<th>Foto</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
															<tr class="person">
																<td>
																	<label class="input"> <i class="icon-append fa fa-user"></i>
																		<input type="text" name="nama[]" placeholder="Nama Pembicara" required="">
																	</label>
																</td>
																<td>
																	<label class="input"> <i class="icon-append fa fa-institution"></i>
																		<input type="text" name="institusi[]" placeholder="Asal Institusi" required="">
																	</label>
																</td>
																<td>
																	<label class="input"> <i class="icon-append fa fa-phone"></i>
																		<input type="tel" name="tlpn[]" placeholder="Nomor Telepon" required="">
																	</label>
																</td>
																<td>
																	<label class="input"> <i class="icon-append fa fa-envelope"></i>
																		<input type="email" name="email[]" placeholder="Email" required="">
																	</label>
																</td>
																<td>
																	<label for="file" class="input input-file">
																		<div class="button"><input type="file" name="pembicara[]" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder=".jpg .png" readonly="">
																	</label>
																</td>
																<td style="width: 10%">
																	<a href="javascript:void(0);" class="btn btn-default btn-sm" id="add"><i class="fa fa-plus-circle fa-lg"></i></a>
																	<a href="javascript:void(0);" class="btn btn-default btn-sm" id="hapus"><i class="fa fa-minus-square fa-lg"></i></a>
																</td>
															</tr>
														</tbody>
													</table>
												</section>
											</div>
										</fieldset>
								</div>

								<div class="col col-md-12">
									<footer>
										<button type="submit" class="btn btn-primary">
											Simpan
										</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Batal
										</button>
									</footer>
								</div>
						</form>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>

			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2" data-widget-editbutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Event</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget content -->
					<div>
						<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					    <thead>
								<tr>
									<!-- <td colspan="2">
										<button type="button" class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#evnt_tambah">
										 <span class="btn-label">
										  <i class="glyphicon glyphicon-plus-sign"></i></span>
										 Tambah
										</button>
									</td> -->
								</tr>
					      <tr>
				          <th data-class="expand">ID</th>
				          <th data-class="expand">Tema Event</th>
									<th data-class="expand">Periode</th>
				          <th data-class="expand">Tanggal Mulai</th>
									<th data-class="expand">Tanggal Terakhir Registrasi</th>
				          <th data-class="expand">Prodi</th>
									<th data-class="expand" width="20%">Action</th>
					      </tr>
					    </thead>
					        <tbody>
										<?php foreach ($get_event as $v_event): ?>
					            <tr>
					                <td><?php echo $v_event['id_event'] ?></td>
					                <td><?php echo $v_event['judul_event'] ?></td>
													<td><?php echo $v_event['id_periode'] ?></td>
					                <td><?php echo $v_event['tgl_event'] ?></td>
													<td><?php echo $v_event['tgl_akhir_reg'] ?></td>
					                <td><?php echo $v_event['nama_jur'] ?></td>
													<td>
														<ul class="demo-btns">
															<li>
																<button type="button" name="evndel" class="btn btn-success" onclick="Daftar('<?php echo $v_event['id_event']; ?>')" data-toggle="modal" data-target="#regtambah" title="Daftar"><i class="fa fa-plus-circle"></i></button>
															</li>
															<li>
																<a href="<?php echo base_url().'Admin?id='.$v_event['id_event'] ?>#A_content/transaksi/absen" title="Cek Kehadiran">
																	<button type="button" name="evndel" class="btn btn-success"><i class="fa fa-list-alt"></i></button>
																</a>
															</li>
															<li>
																<a href="<?php echo base_url().'Admin?id='.$v_event['id_event'] ?>#A_content/transaksi/reg" title="Data Peserta">
																	<button type="button" name="evndel" class="btn btn-success"><i class="fa fa-code-fork"></i></button>
																</a>
															</li>
															<li>
																<a href="<?php echo base_url().'Admin?id='.$v_event['id_event'] ?>#A_content/transaksi/sertifikat" title="Data Sertifikat">
																	<button type="button" name="evndel" class="btn btn-success"><i class="fa fa-certificate"></i></button>
																</a>
															</li>
															<li>
																<a href="<?php echo base_url() . 'admin/edit/master/event/' . $v_event['id_event'] ?>" data-toggle="modal" data-target="#evnedit">
																	<button type="button" name="button" class="btn btn-primary"><i class="fa  fa-edit"></i></button>
																</a>
															</li>
															<li>
																<a href="<?php echo base_url() . 'admin/delete/master/event/' .  $v_event['id_event'] ?>">
																	<button type="button" name="evndel" onclick="Delete()" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
																</a>
															</li>
														</ul>
													</td>
					            </tr>
										<?php endforeach; ?>
					        </tbody>
						</table>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

			<!-- Modal Tambah Event -->
			<div class="modal fade" id="evnt_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Event</h4>
						</div>
						<div class="modal-body">

							<form action="<?php echo base_url(); ?>admin/create/master/event" method="post" enctype="multipart/form-data" class="smart-form" id="order-form" novalidate="novalidate">
								<header>
									No. <?php echo $auto_id_evn; ?>
								</header>

								<fieldset>
									<div class="row">
										<section class="col col-xs-12">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="hidden" name="id_evn" value="<?php echo $auto_id_evn; ?>">
												<input type="text" name="tema" placeholder="Judul Seminar" required="">
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
											</label>
										</section>
									</div>

									<div class="row">
										<section class="col col-md-4">
											<label class="select">
												<select name="periode" required="">
													<option value="0" selected="" disabled="">Periode</option>
													<?php foreach ($get_per as $v_per): ?>
														<option value="<?php echo $v_per['id_periode'] ?>"><?php echo $v_per['id_periode'] ?></option>
													<?php endforeach; ?>
												</select> <i></i> </label>
										</section>
										<section class="col col-md-4">
											<label class="input"> <i class="icon-append fa fa-briefcase"></i>
												<input type="number" name="quota" min="1" max="4000" maxlength="4" placeholder="Quota" required="">
											</label>
										</section>
										<section class="col col-md-4">
											<label class="input"> <i class="icon-append fa fa-money"></i>
												<input type="text" name="hrg" placeholder="Harga" required="">
											</label>
										</section>
									</div>
								</fieldset>

								<fieldset>
									<div class="row">
										<section class="col col-6">
											<label class="select">
												<select name="id_jur" required="">
													<option value="0" selected="" disabled="">Program Studi</option>
													<?php foreach ($get_jur as $v_jur): ?>
														<option value="<?php echo $v_jur['id_jurusan'] ?>"><?php echo $v_jur['nama_jur'] ?></option>
													<?php endforeach; ?>
												</select> <i></i> </label>
										</section>
										<section class="col col-6">
											<label class="select">
												<select name="jen_evn" required="">
													<option value="0" selected="" disabled="">Jenis Event</option>
													<option value="1">Seminar</option>
													<option value="2">Workshop</option>
												</select> <i></i> </label>
										</section>
									</div>

									<div class="row">
										<section class="col col-6">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="edate" id="edate" placeholder="Tanggal Di Mulai Event" required="">
											</label>
										</section>
										<section class="col col-6">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="rdate" id="rdate" placeholder="Tanggal Terakhir Registrasi Event" required="">
											</label>
										</section>
									</div>

									<section>
										<label for="file" class="input input-file">
											<div class="button"><input type="file" name="bg_event" required onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Event Wallpaper .jpg .png" required readonly="">
										</label>
									</section>

									<section>
										<label class="select">
											<select name="idloc" required="">
												<option value="0" selected="" disabled="">Lokasi</option>
												<?php foreach ($get_loc as $v_loc): ?>
													<option value="<?php echo $v_loc['id_lokasi'] ?>"><?php echo $v_loc['nama_ruangan']." - ".$v_loc['lokasi'] ?></option>
												<?php endforeach; ?>
											</select> <i></i> </label>
									</section>

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

			<!-- Modal Tambah Registrasi-->
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

			<!-- Modal Edit -->
			<div class="modal fade" id="evnedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

					</div>
				</div>
			</div>

		</article>
		<!-- WIDGET END -->
	</div>
</section>
<!-- end widget grid -->

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
</script>

<script type="text/javascript">
		var i;
    $(document).ready(function() {
        $("#add").click(function() {
          $('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
					i = $('#mytable tr').size();
          return false;
        });
    });

		$(document).on('click','#hapus' ,function() {
    	if( i > 2 ) {
        $(this).parents('tr').remove();
        i--;
      }
      return false;
    });
</script>

<script type="text/javascript">
	// START AND FINISH DATE
	$('#edate').datepicker({
		dateFormat : 'yy-mm-dd',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#finishdate').datepicker('option', 'minDate', selectedDate);
		}
	});

	$('#rdate').datepicker({
		dateFormat : 'yy-mm-dd',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#startdate').datepicker('option', 'maxDate', selectedDate);
		}
	});
</script>

<script type="text/javascript">

	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();

	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 *
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 *
	 */

	// PAGE RELATED SCRIPTS

	// pagefunction
	var pagefunction = function() {
		//console.log("cleared");

		/* // DOM Position key index //

			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class

			Also see: http://legacy.datatables.net/usage/features
		*/

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
