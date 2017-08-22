<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-pencil-square-o fa-fw "></i>
				Master
			<span>
				User
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
					<h2>Data User</h2>
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
									<td colspan="">
										<button type="button" class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#jurtambah">
										 <span class="btn-label">
										  <i class="glyphicon glyphicon-plus-sign"></i></span>
										 Tambah
										</button>
									</td>
								</tr>
					      <tr>
				          <th data-class="expand">ID User</th>
				          <th data-class="expand">Nama Lengkap</th>
									<th data-class="expand">Email</th>
									<th data-class="expand">No Telepon</th>
									<th data-class="expand">Gender</th>
				          <th data-class="expand">Tipe User</th>
									<th data-class="expand">Keterangan User</th>
									<th data-class="expand">Tanggal Daftar</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
					      <tbody>
									<?php foreach ($get_usr as $v_usr): ?>
					          <tr>
					            <td><?php echo $v_usr['id_usr'] ?></td>
					            <td><?php echo $v_usr['nama_usr'] ?></td>
											<td><?php echo $v_usr['email'] ?></td>
											<td><?php echo $v_usr['no_tlpn'] ?></td>
											<td><?php echo $v_usr['jekel'] ?></td>
											<td><?php echo $v_usr['nama_type_usr'] ?></td>
											<td><?php echo $v_usr['ket'] ?></td>
											<td><?php echo $v_usr['tgl_daftar'] ?></td>
											<td>
												<ul class="demo-btns">
													<li>
														<a href="<?php echo base_url() . 'admin/edit/master/user/' . $v_usr['id_usr'] ?>" data-toggle="modal" data-target="#usredit">
															<button type="button" name="button" class="btn btn-success"><i class="fa  fa-edit"></i></button>
														</a>
													</li>
													<li>
														<a href="<?php echo base_url() . 'admin/delete/master/user/' . $v_usr['id_usr'] ?>">
															<button type="button" name="jurdel" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button>
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
					<div class="modal fade" id="jurtambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">User</h4>
								</div>
								<div class="modal-body no-padding">
									<form action="<?php echo base_url(); ?>admin/create/master/user" method="post" class="smart-form">
										<header>
											Tambah Data User
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append glyphicon glyphicon-fire"></i>
														<input type="text" name="id_usr" placeholder="NIM , Kode Dosen atau Email" required="">
														<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
													</label>
												</section>
												<section class="col col-6">
													<label class="select">
														<select name="t_user">
															<option value="0" selected="" disabled="">Tipe User</option>
															<?php foreach ($get_type_usr as $v_tipe): ?>
																<option value="<?php echo $v_tipe['id_type_usr'] ?>"><?php echo $v_tipe['nama_type_usr'] ?></option>
															<?php endforeach; ?>
														</select> <i></i> </label>
												</section>
											</div>
											<div class="row">
												<section class="col col-xs-12">
													<label class="input"> <i class="icon-append glyphicon glyphicon-user"></i>
														<input type="text" name="nama_usr" placeholder="Nama Lengkap" required="">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append glyphicon glyphicon-envelope"></i>
														<input type="email" name="email" placeholder="Masukan Email Anda" required="">
													</label>
												</section>
												<section class="col col-6">
													<label class="select">
														<select name="jekel" required="">
															<option value="0" selected="" disabled="">Jenis Kelamin</option>
															<option value="Pria">Pria</option>
															<option value="Wanita">Wanita</option>
														</select> <i></i> </label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-phone"></i>
														<input type="tel" name="no_tlp" placeholder="No Telepon" data-mask="+62 999-9999-9999" required="">
													</label>
												</section>												
												<section class="col col-6">
													<label class="select">
														<select name="ket" required="">
															<option value="0" selected="" disabled="">Keterangan Pengguna</option>
															<option value="Dosen">Dosen</option>
															<option value="Mahasiswa">Mahasiswa</option>
															<option value="User eksternal">User eksternal</option>
														</select> <i></i> </label>
												</section>
											</div>
											<section>
												<label class="textarea"><i class="icon-append fa fa-home"></i>
													<textarea rows="5" name="alamat" placeholder="Alamat Lengkap" ></textarea>
												</label>
											</section>
										</fieldset>

										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append glyphicon fa fa-lock"></i>
														<input type="password" name="old_pass" placeholder="Masukan Password Anda" required="">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append glyphicon fa fa-lock"></i>
														<input type="password" name="new_pass" placeholder="Masukan Kembali Password Anda" required="">
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
					<div class="modal fade" id="usredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
