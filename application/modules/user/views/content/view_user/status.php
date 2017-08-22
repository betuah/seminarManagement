<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h4>
      </div>
      <div class="modal-body">
				<form action="" id="form-user" class="smart-form" novalidate="novalidate">
					<!--Content Pertama -->
					<fieldset>
						<div class="row">
							<section class="col col-6">
								<label class="input"> <i class="icon-prepend fa fa-user"></i>
									<input type="text" name="lid" placeholder="ID Registrasi">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"><i class="icon-prepend fa fa-calendar"></i>
									<input type="text" placeholder="Date" class="datepicker" data-dateformat='dd/mm/yy'>
								</label>
							</section>
						</div>
					</fieldset>

					<fieldset>
						<section>
							<label class="label">File input</label>
							<label for="file" class="input input-file">
								<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Include some files" readonly="">
							</label>
						</section>
					</fieldset>

					<footer>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Submit</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      	</div>
					</footer>
				</form>
      </div>

    </div>
  </div>
</div>
<!--End Modal -->

<!-- row -->
<div class="row">
	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-table"></i>
				<b>Status</b>
			<span>>
				Pembayaran
			</span>
		</h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<!-- widget grid -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
          <h2>Table Bayar</h2>
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
									<th data-hide="phone">No. </th>
									<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs">
									</i> ID Registrasi</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i> 
									Nama User</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i>
                  					Jenis Registrasi</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i>
                  					Tema</th>
                  					<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i>
                  					Status</th>
                  					<th hidden="">Action</th>
              					</tr>
							</thead>
							<tbody>
                				<?php
                					if (empty($get_v_status)) {
                					}else{ 
                					$no=1;
                					foreach ($get_v_status as $v_status): ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $v_status['id_reg'] ?></td>
											<td><?php echo $v_status['nama_usr'] ?></td>
											<td><?php echo $v_status['jen_reg'] ?></td>
											<td><?php echo $v_status['judul_event'] ?></td>
											<td><?php if($v_status['status'] == '0' ){
														echo "Belum Membayar";
													} elseif($v_status['status'] == '1' ){
														echo "Lunas";
													} elseif($v_status['status'] == '2' ){
														echo "Hadir";
													}
												?>			
											</td>
											<td hidden="">
            			   						<div class="demo-btns">
              			      						 <li>
                			        					<button type="button" name="regdlt" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>
          				         					</li>
                       							</div>
                       						</td>
                  						</tr>
                					<?php
                 				 		$no++;
                  						endforeach;}
                					?>
							</tbody>
						</table>
					</div>
					<!-- end widget content -->
				</div>
			<!-- end widget div -->
      </div>
    </article>
  </div>

</section>

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
	
	loadScript("assets/smartadmin/js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("assets/smartadmin/js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("assets/smartadmin/js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("assets/smartadmin/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("assets/smartadmin/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});

</script>
