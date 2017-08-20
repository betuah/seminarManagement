<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-credit-card fa-fw "></i>
				Transaksi
			<span>>
				Pembayaran
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

			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon blue"> <i class="fa fa-edit"></i> </span>
					<h2>Tambah Pembayaran</h2>
				</header>

				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
					</div>

					<!-- widget content -->
					<div class="widget-body no-padding">
						<form action="<?php echo base_url(); ?>admin/create/transaksi/bayar" method="post" enctype="multipart/form-data" class="smart-form">
							<header>
								Tambah Data Pemabayaran
							</header>

							<fieldset>
								<div class="row">
									<section class="col col-xs-12">
										<label class="input"> <i class="icon-append fa fa-book"></i>
											<input type="text" id="tema" name="tema" placeholder="Tema Seminar" readonly>
										</label>
									</section>
									<section class="col col-xs-6">
										<label class="input"> <i class="icon-append fa fa-edit"></i>
											<input id="reg" class="form-control" placeholder="No Registrasi" name="noreg" type="text"  list="susr">
											<datalist id="susr">
												<?php foreach ($get_reg as $v_reg): ?>
													<option value="<?php echo $v_reg['id_reg']; ?>"><?php echo $v_reg['id_reg']; ?></option>
												<?php endforeach; ?>
											</datalist>
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="nama" id="nama" placeholder="Nama Peserta" readonly value="">
										</label>
									</section>
								</div>
							</fieldset>

							<fieldset>
								<div class="row">
									<section class="col col-xs-6">
										<label class="input"> <i class="icon-append fa fa-money"></i>
											<input type="text" id="tbyr" name="tbyr" placeholder="Total Bayar" >
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-credit-card"></i>
											<input type="text" id="harga" name="harga" placeholder="Harga" readonly value="">
											<input type="hidden" name="id_bayar" placeholder="ID Pembayaran" readonly value="<?php echo $auto_id_byr; ?>">
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
					<!-- end widget content -->
				</div>
			</div>

			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2" data-widget-editbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Pembayaran</h2>
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
				          <th data-class="expand">ID Pembayaran</th>
				          <th data-class="expand">No Reg</th>
				          <th data-class="expand">Status</th>
				          <th data-class="expand">Total Bayar</th>
				          <th data-class="expand">Tanggal Bayar</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
					        <tbody>
										<?php foreach ($get_byr as $v_byr): ?>
					            <tr>
					                <td><?php echo $v_byr['id_bayar'] ?></td>
					                <td><?php echo $v_byr['id_reg'] ?></td>
					                <td><?php echo $v_byr['stat_byr'] ?></td>
					                <td>Rp <?php echo $v_byr['total_bayar'] ?></td>
													<td><?php echo $v_byr['tgl_bayar'] ?></td>
													<td>
														<ul class="demo-btns">
															<!-- <li>
																<a href="<?php echo base_url() . 'admin/edit/transaksi/bayar/' . $v_byr['id_bayar'] ?>" data-toggle="modal" data-target="#byredit">
																	<button type="button" name="button" class="btn btn-success"><i class="fa  fa-edit"></i></button>
																</a>
															</li> -->
															<li>
																<button type="button" onclick="del('<?php echo $v_byr['id_bayar'] ?>')" name="byrdel" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button>
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
		</article>
		<!-- WIDGET END -->
	</div>
</section>
<!-- end widget grid -->

<script>
	function del(ID) {
	   if (confirm("Apakah Anda yakin ingin menghapus data pembayaran ini ? Note : Jika Anda menghapus data pembayaran ini maka sertifikat yang akan berhubungan dengan data ini akan terhapus dikarenakan status registrasi akan berubah.") == true) {
	       window.location.href='<?php echo base_url() . "admin/delete/transaksi/bayar/"?>'+ID;
	   } else {
	       return FALSE;
	   }
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#reg').change(function() {
		 	var reg = $(this).val();

			$.ajax({
	 			type: 'GET',
	 			url: '<?php echo base_url()."api/reg"; ?>',
	 			data: {"id": reg, "act":"get"},
	 			success: function(res) {
					var stat = res[0].status;
					if (stat == '1') {
						alert('No registrasi ' + reg + ' Sudah Melakukan Pembayaran');
						window.location.href='<?php base_url() ?>Admin#A_content/transaksi/absen';
					} else {
						var pdate = res[0].pay_date;
						var cdate = '<?php echo date("Y-m-d"); ?>'

						if (pdate <= cdate) {
							if (confirm("Waktu pembayaran untuk nomor registrasi "+reg+" sudah berakhir, Apakah Anda Ingin melanjutkan ?") == true) {
									$('#tema').val('Tema : ' + res[0].judul_event);
									$('#nama').val('Nama : ' +res[0].nama_usr);
									$('#harga').val('Harga : Rp ' +res[0].harga);
					 	   } else {
								 	$('#tema').val('');
									$('#nama').val('');
									$('#harga').val('');
									$('#reg').val('');
									$('#tbyr').val('');
					 	   }
						} else {
							$('#tema').val('Tema : ' + res[0].judul_event);
							$('#nama').val('Nama : ' +res[0].nama_usr);
							$('#harga').val('Harga : Rp ' +res[0].harga);
						}
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
					url : "http://localhost/semnas/api/users",
					dataType : "jsonp",
					data : {
						featureClass : "P",
						style : "full",
						maxRows : 10,
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
