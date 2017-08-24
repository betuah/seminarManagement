<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-table fa-fw "></i>
				<b>Cetak</b>
			<span>>
				Sertifikat
			</span>
		</h1>
	</div>
</div>

<section id="widget-grid" class="">
		<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

        <header>
          <span class="widget-icon"> <i class="fa fa-table"></i> </span>
          <h2>Table Sertifikat</h2>
        </header>
        <!-- widget div -->
        <div>
				<!-- widget edit box -->
					<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
					</div>
       				<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No Sertifikat</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama User</th>
									<th data-class="expand">Jenis Registrasi</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i> Tema Kegiatan</th>
                 					<th hidden="">Action</th>
              					</tr>
							</thead>
							<tbody>
                				<?php
                					if (empty($get_v_sertifikat)) {
                						}else{
                							$no=1;
                							foreach ($get_v_sertifikat as $v_sert): ?>
											<tr>
                								<td><?php echo $v_sert['no_sertifikat'] ?></td>
																<td><?php echo $v_sert['nama_usr'] ?></td>
                  							<td><?php echo $v_sert['jen_reg'] ?></td>
                 	 							<td><?php echo $v_sert['judul_event'] ?></td>
                 	 							</td>
												<td hidden="">
            			   							<div class="demo-btns">
          				         						<li>
															<a href="<?php echo base_url().'user/sert/view_user/sert/'.
															$v_sert['id_reg'] ?>">
																<button type="button" name="button" class="btn btn-info">
																	<i class="fa fa-download"></i>
																</button>
															</a>
														</li>
                       								</div>
                  								</td>
											</tr>
                				<?php $no++; endforeach;} ?>
							</tbody>
						</table>
					</div>
					<!-- end widget content -->

					<!-- Modal Edit -->
					<div class="modal fade bs-example-modal-lg" id="csert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  						<div class="modal-dialog modal-lg" role="document">
    						<div class="modal-content">
    						<!-- Tampil Cetak Tiket -->
							</div>
						</div>
					</div>

				</div>
			<!-- end widget div -->
      </div>
    </article>
  </div>
</section>

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
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
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
	};

	// load related plugins

	loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/jquery.dataTables.min.js'?>", function(){
		loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.colVis.min.js' ?>", function(){
			loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.tableTools.min.js'?>", function(){
				loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatables/dataTables.bootstrap.min.js'?>", function(){
					loadScript("<?php echo base_url().'assets/smartadmin/js/plugin/datatable-responsive/datatables.responsive.min.js'?>", pagefunction)
				});
			});
		});
	});

</script>
