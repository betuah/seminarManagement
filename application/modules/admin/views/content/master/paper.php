<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-folder-open fa-fw "></i>
				Master
			<span>>
				Berkas Makalah
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
					<h2>Data Berkas</h2>
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
									<th class="hasinput" style="width:10%">
										<input type="text" class="form-control" placeholder="No Reg" />
									</th>
									<th class="hasinput" style="width:11%">
										<input type="text" class="form-control" placeholder="ID Makalh" />
									</th>
									<th class="hasinput" style="width:20%">
										<input type="text" class="form-control" placeholder="Judul" />
									</th>
									<th class="hasinput icon-addon">
										<input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="dd/mm/yy">
										<label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
									</th>
									<th class="hasinput" style="width:13%">
										<input type="text" class="form-control" placeholder="Status" />
									</th>
									<td colspan="2">
										<button type="button" class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#papertambah">
										 <span class="btn-label">
										  <i class="glyphicon glyphicon-plus-sign"></i></span>
										 Tambah
										</button>
									</td>
								</tr>
					      <tr>
				          <th data-class="expand">ID</th>
									<th data-class="expand">No Reg</th>
				          <th data-class="expand">Judul</th>
									<th data-class="expand">Tanggal</th>
				          <th data-class="expand">Status</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
					        <tbody>
										<?php foreach ($get_paper as $v_paper): ?>
					            <tr>
					                <td><?php echo $v_paper['id_paper'] ?></td>
													<td><?php echo $v_paper['id_reg'] ?></td>
					                <td><?php echo $v_paper['nama_paper'] ?></td>
													<td><?php echo $v_paper['tgl_upload'] ?></td>
					                <td><?php echo $v_paper['status'] ?></td>
													<td>
														<ul class="demo-btns">
															<li>
																<a href="<?php echo base_url() . 'admin/edit/master/paper/' . $v_paper['id_paper'] ?>" data-toggle="modal" data-target="#paperedit">
																	<button type="button" name="byredit" class="btn btn-warning"><i class="fa  fa-edit"></i></button>
																</a>
															</li>
															<li>
																	<button type="button" onclick="del('<?php echo $v_paper['id_paper']?>')" name="jurdel" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button>
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

					<!-- Modal Tambah -->
					<div class="modal fade" id="papertambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Data Berkas</h4>
								</div>
								<div class="modal-body no-padding">
									<form action="<?php echo base_url(); ?>admin/create/master/paper" method="post" enctype="multipart/form-data" class="smart-form">
										<header class="">
											No.Makalah : <?php echo $auto_id_paper; ?>
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-user"></i>
														<input id="idreg" class="form-control" placeholder="No Registrasi" name="id_reg" type="text"  list="reg">
														<datalist id="reg">
															<?php foreach ($get_reg as $v_reg): ?>
																<option value="<?php echo $v_reg['id_reg']; ?>"><?php echo $v_reg['id_reg']; ?></option>
															<?php endforeach; ?>
														</datalist>
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="pdate" id="startdate" placeholder="Tanggal Upload" value="<?php echo date("Y-m-d"); ?>" readonly="">
													</label>
												</section>
											</div>
										</fieldset>

										<fieldset>
											<div class="row">
												<section class="col col-xs-12">
													<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
														<input type="text" name="jdl_mklh" placeholder="Judul Makalah" readonly id="judul">
													</label>
												</section>
												<section class="col col-xs-12">
													<label for="file" class="input input-file">
														<div class="button"><input type="file" name="paper" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Unggah Berkas Anda dalam format .pdf" readonly="">
													</label>
												</section>
											</div>
										</fieldset>

										<footer>
											<button type="submit" name="papertambah" class="btn btn-primary">
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
					<div class="modal fade" id="paperedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">

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
	   if (confirm("Apakah Anda ingin menghapus data ini ? ") == true) {
	       window.location.href='<?php echo base_url() . "admin/delete/master/paper/"?>'+ID;
	   } else {
	       return FALSE;
	   }
	}
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#idreg').change(function() {
			var reg = $(this).val();

			$.ajax({
	 			type: 'GET',
	 			url: '<?php echo base_url()."api/reg"; ?>',
	 			data: {"id": reg, "act":"get"},
	 			success: function(res) {
					$('#judul').val(res[0].judul_event);
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
