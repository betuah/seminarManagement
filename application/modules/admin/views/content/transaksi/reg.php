<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-pencil-square-o fa-fw "></i>
				Transaksi
			<span>>
				Registrasi
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
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Registrasi</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox"></div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					    <thead>
								<tr>
									<td colspan="2">
										<button type="button" class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#regtambah">
										 <span class="btn-label">
										  <i class="glyphicon glyphicon-plus-sign"></i></span>
										 Tambah
										</button>
									</td>
								</tr>
					      <tr>
				          <th data-class="expand">No Reg</th>
				          <th data-class="expand">ID User</th>
				          <th data-class="expand">Tanggal Reg</th>
				          <th data-class="expand">ID Event</th>
									<th data-class="expand">Jenis Reg</th>
				          <th data-class="expand">Status</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
					        <tbody>
										<?php foreach ($get_reg as $v_reg): ?>
					            <tr>
					                <td><?php echo $v_reg['id_reg'] ?></td>
					                <td><?php echo $v_reg['id_usr'] ?></td>
					                <td><?php echo $v_reg['tgl_reg'] ?></td>
					                <td><?php echo $v_reg['id_event'] ?></td>
													<td><?php if($v_reg['id_jen_reg'] == '1') {
														echo "Peserta";
													} else {
														echo "Pemakalah";
													} ?></td>
					                <td><?php if($v_reg['status'] == '0') {
														echo "Belum Bayar";
													} elseif ($v_reg['status'] == '1') {
														echo "LUNAS";
													} else {
														echo "Hadir";
													} ?></td>
													<td>
														<ul class="demo-btns">
															<li>
																<a href="<?php echo base_url() . 'admin/edit/transaksi/reg/' . $v_reg['id_reg'] ?>" data-toggle="modal" data-target="#regedit">
																	<button type="button" name="button" class="btn btn-success"><i class="fa  fa-edit"></i></button>
																</a>
															</li>
															<li>
																<a href="<?php echo base_url() . 'admin/pdf/eticket/'.$v_reg['id_reg'] ?>" data-toggle="modal">
																	<button type="button" class="btn btn-success"><i class="fa  fa-download"></i></button>
																</a>
															</li>
															<li>
																<button type="button" name="jurdel" class="btn btn-danger" onclick="del('<?php echo $v_reg['id_reg'] ?>')"><i class="fa  fa-trash-o"></i></button>
															</li>
														</ul>
													</td>
					            </tr>
										<?php endforeach; ?>
					        </tbody>
						</table>
					</div>
					<!-- end widget content -->

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
														<input id="idevnt" class="form-control" placeholder="ID Event" name="idevnt" type="text"  list="evnt">
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

					<!-- Modal edit -->
					<div class="modal fade" id="regedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">

							</div>
						</div>
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
</section>
<!-- end widget grid -->

<script>
	function del(ID) {
	   if (confirm("Apakah Anda ingin menghapus data registrasi ini ? Note : Semua yang berkaitan dengan data registrasi seperti pembayaran akan ikut terhapus.") == true) {
	       window.location.href='<?php echo base_url() . "admin/delete/transaksi/reg/"?>'+ID;
	   } else {
	       return FALSE;
	   }
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
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

		$('#idevnt').change(function() {
		 	var evn = $(this).val();

			$.ajax({
	 			type: 'GET',
	 			url: '<?php echo base_url()."api/event"; ?>',
	 			data: {"id": evn, "act":"get"},
	 			success: function(res) {
					var tema = res[0].judul_event;
	 				$('#jdl_evnt').val(tema);
					var qty 		= res[0].quota;
					var rdate		= res[0].tgl_akhir_reg;
					var cdate  	= '<?php echo date ("Y-m-d"); ?>';

					if (cdate > rdate) {
						alert('Batas Akhir Registrasi untuk Event '+tema+' telah berakhir pada tanggal '+rdate);
						$('#idusr').val('');
						$('#nmusr').val('');
						$('#idevnt').val('');
						$('#jdl_evnt').val('');
						$('#rqty').val('');
					} else {
						$.ajax({
							type: 'GET',
							url: '<?php echo base_url()."api/dash"; ?>',
							data: {"id": evn},
							success: function(dash) {
								var rqty 		= qty - dash.lunas;
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
					}
	 			},
	 			error: function () {
	 				alert("cannot check fetch client data");
	 			}
			});
		});
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

		/*
		 * AUTO COMPLETE AJAX
		 */

		function log(message) {
			$("<div>").text(message).prependTo("#log");
			$("#log").scrollTop(0);
		}

		$("#city").autocomplete({
			source : function(request, response) {
				$.ajax({
					url : "http://ws.geonames.org/searchJSON",
					dataType : "jsonp",
					data : {
						featureClass : "P",
						style : "full",
						maxRows : 12,
						name_startsWith : request.term
					},
					success : function(data) {
						response($.map(data.geonames, function(item) {
							return {
								label : item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
								value : item.name
							}
						}));
					}
				});
			},
			minLength : 2,
			select : function(event, ui) {
				log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
			}
		});

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
