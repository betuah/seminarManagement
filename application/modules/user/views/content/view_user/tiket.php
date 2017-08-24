<!-- Section Header -->
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-mortar-board fa-fw "></i>
				<b>Cetak</b>
			<span>>>
				Tiket
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
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

        <header>

          <span class="widget-icon"> <i class="fa fa-table"></i> </span>
          <h2>Table Tiket</h2>
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
									<th data-hide="phone">No.</th>
									<th data-hide="phone">No. Tiket</th>
									<th data-class="expand">Nama User</th>
									<th data-hide="phone">Tipe User</th>
									<th data-hide="phone,tablet">Tgl Daftar </th>
									<th data-hide="phone,tablet">Tgl Kegiatan</th>
									<th data-hide="phone,tablet">Judul Kegiatan</th>
									<th data-hide="phone,tablet">Biaya</th>
									<th data-hide="phone,tablet">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if(empty($get_v_tiket)){}
								else{
							$no=1;
							foreach ($get_v_tiket as $v_tik): ?>
					          <tr>
					          	<td><?php echo $no; ?></td>
					            <td><?php echo $v_tik['id_reg'] ?></td>
								<td><?php echo $v_tik['nama_usr'] ?></td>
								<td><?php echo $v_tik['jen_reg'] ?></td>
								<td><?php echo $v_tik['tgl_reg'] ?></td>
								<td><?php echo $v_tik['tgl_event'] ?></td>
								<td><?php echo $v_tik['judul_event'] ?></td>
								<td><?php echo $v_tik['harga'] ?></td>
								<td>
									<ul class="demo-btns">

										<div hidden="">
											<a href="<?php echo base_url() . 'user/cetak/view_user/tiket/' . $v_tik['id_reg'] ?>" data-toggle="modal" data-target="#ctiket">
												<button type="button" name="button" class="btn btn-info">
												<i class="fa fa-search"></i>
												</button>
											</a>
										</div>
										<li>
											<a href="<?php echo base_url() . 'admin/pdf/eticket/'.$v_tik['id_reg'] ?>">
												<button type="button" name="button" class="btn btn-info">
												<i class="fa fa-download"></i>
												</button>
											</a>
										</li>
									</ul>
								</td>
					          </tr>
					         
							<?php $no++; endforeach;} ?>
					      </tbody>
						</table>
					</div>
					<!-- end widget content -->

					<!-- Modal Edit -->
					<div class="modal fade bs-example-modal-lg" id="ctiket" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
