<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-credit-card fa-fw "></i>
				Transaksi
			<span>>
				Cek Pembayaran
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
									<th class="hasinput" style="width:8%">
										<input type="text" class="form-control" placeholder="Filter ID" />
									</th>
									<th class="hasinput" style="width:10%">
										<input type="text" class="form-control" placeholder="Filter No Reg" />
									</th>
									<th class="hasinput" style="width:13%">
										<input type="text" class="form-control" placeholder="Filter Harga" />
									</th>
									<th class="hasinput" style="width:13%">
										<input type="text" class="form-control" placeholder="Filter Total Bayar" />
									</th><th></th>
									<th class="hasinput icon-addon">
										<input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
										<label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
									</th>
									<td colspan="2">
										<button type="button" class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#pilihevent">
										 <span class="btn-label">
										  <i class="glyphicon glyphicon-plus-sign"></i></span>
										 Pilih Event
										</button>
									</td>
								</tr>
					      <tr>
				          <th data-class="expand">ID Pembayaran</th>
				          <th data-class="expand">No Reg</th>
				          <th data-class="expand">Harga</th>
				          <th data-class="expand">Total Bayar</th>
				          <th data-class="expand">Bukti Bayar</th>
				          <th data-class="expand">Tanggal Bayar</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
					        <tbody>
					            <tr>
					                <td>PAY001</td>
					                <td>REG0001.17.01.2001</td>
					                <td>Rp 175,000</td>
					                <td>Rp 175,000</td>
					                <td>Gambar 1</td>
					                <td>2017/02/01</td>
													<td>
														<ul class="demo-btns">
															<li>
																<button type="button" name="byredit" class="btn btn-warning" data-toggle="modal" data-target="#lihatbayar"><i class="fa  fa-search"></i></button>
															</li>
															<li>
																<button type="button" name="byrdlt" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button>
															</li>
														</ul>
													</td>
					            </tr>
					        </tbody>
						</table>
					</div>
					<!-- end widget content -->

					<!-- Modal Lihat Berkas -->
					<div class="modal fade" id="lihatberkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Cek Pembayaran</h4>
								</div>
								<div class="modal-body no-padding">
									<form action="" method="post" class="smart-form">
										<header>
											Periksa Bukti Pembayaran
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-xs-12">
													<h1>Preview Foto Bukti Pembayaran</h1>
												</section>
											</div>
										</fieldset>

										<fieldset>
											<div class="row">
												<section class="col col-xs-12">
													<label class="select">
														<select name="k_paper">
															<option value="0" selected="" disabled="">Konfirmasi Pembayaran</option>
															<option value="1">Terima</option>
															<option value="2">Tolak</option>
														</select><i></i>
													</label>
												</section>
											</div>
										</fieldset>

										<footer>
											<button type="submit" name="paperedit" class="btn btn-primary">
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

					<!-- Modal Pilih Event -->
					<div class="modal fade" id="pilihevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Cek Berkas</h4>
								</div>
								<div class="modal-body no-padding">
									<form action="" method="post" class="smart-form">
										<header>
											Pilih event
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-xs-3">
													<h5>
														ID Event
													</h5>
												</section>
												<section class="col col-xs-6">
													<label class="input"> <i class="icon-append fa fa-user"></i>
														<input type="text" name="idpaper" placeholder="No Reg" value="MKH001">
													</label>
												</section>
											</div>
										</fieldset>

										<fieldset>
											<div class="row">
												<section class="col col-xs-3">
													<h5>
														Pilih Judul
													</h5>
												</section>
												<section class="col col-xs-6">
													<label class="select">
														<select name="k_paper">
															<option value="0" selected="" disabled="">Konfirmasi Pembayaran</option>
															<option value="1">Terima</option>
															<option value="2">Tolak</option>
														</select><i></i>
													</label>
												</section>
											</div>
										</fieldset>

										<footer>
											<button type="submit" name="caripaper" class="btn btn-primary">
												Cari Data
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
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
</section>
<!-- end widget grid -->

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
