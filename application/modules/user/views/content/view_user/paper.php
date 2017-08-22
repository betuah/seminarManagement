<!-- end widget content -->
	<div class="modal fade" id="pper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">	
				<!-- Content input paper -->
				<div class="modal-header">	
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
						<h4 align="center" class="modal-title" id="myModalLabel"><b>Input Berkas</b></h4>
				</div>
				<div class="modal-body">
				<form action="<?php echo base_url(); ?>user/create/view_user/paper" class="smart-form" enctype="multipart/form-data" novalidate="novalidate" method="post">
						<fieldset>
							<div class="row">
								<section class="col col-2" hidden="">
          					 		<label class="input"> <i class="icon-append fa fa-calendar"></i>
           		 			 			<input type="text" name="tglup" placeholder="Tanggal Upload" 
           		 			 			value="<?php echo "".date("Y-m-d");?>">
          					 		</label>
        						</section>
        						<section class="col col-sm-6" hidden="">
        							<input type="text" name="idpaper" placeholder="ID Paper" value="<?php echo $auto_id; ?>">
        							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" 
											value="<?php echo $this->security->get_csrf_hash(); ?>">
        						</section>
								<section class="col col-6">
									<label class="select">
        						   		<select name="idreg">
        						   			<option value="0">Pilih Tema Kegiatan	</option>
        						   			<?php foreach ($get_compaper as $ppr) {
        						   				echo '<option value="'.$ppr['id_reg'].'">'.$ppr['judul_event'].'</option>';
        						   			}?>
        						   		</select>
        						    </label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="nmpaper" placeholder="Nama Paper">	
									</label>
								</section>
							</div>
						</fieldset>
						<fieldset>
							<section class="col col-xs-12">
								<label for="file" class="input input-file">
									<div class="button"><input type="file" name="paper" 
									onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" 
										placeholder="Unggah Berkas Anda dalam format .pdf" readonly="">
								</label>
							</section>
						</fieldset>

						<footer>
							<div class="modal-footer">
								<button type="Submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</footer>
				 </form>
				</div>
			</div><!--End Modal -->
		</div>
	</div>

<!-- row -->
<div class="row">
	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-table"></i>
				<b>Status</b>
			<span>>>
				Berkas
			</span>
		</h1>
	</div>
	<!-- end col -->
</div><!--End row -->

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
          <h2>Table Berkas</h2>
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
							<td colspan="">
								<?php foreach ($get_v_user as $us) {
									if($us ['ket'] == "Mahasiswa"){
									?>	
										<button type="button" disabled="" class="btn btn-labeled btn-primary" 
										data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
										<span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Tambah
							 			</button>
									<?php
									}else{
										?>
										<button type="button" class="btn btn-labeled btn-primary" 
							 			data-toggle="modal" data-target="#pper"><span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>Tambah
							 			</button>
										<?php
									}
              					}?>
              				</td>
						</tr>
						<tr>
							<th class="col-sm-1"> No</th>
							<th data-hide="phone" hidden=""> ID Paper</th>
							<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> ID Registrasi</th>
                  			<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Nama User</th>
                  			<th data-hide="phone">Judul event</th>
                  			<th data-hide="phone"><i class="fa fa-fw fa- text-muted hidden-md hidden-sm hidden-xs"></i>Tgl Upload</th>
                  			<th data-hide="phone">Status</th>
							<th hidden="">Action</th>
              			</tr>
					</thead>
					<tbody>
                	<?php
                	if (empty($get_v_paper)) {
                	}else{ 
                	$no=1;
                	foreach ($get_v_paper as $v_paper): ?>
					<tr>
						<td><?php echo $no;?></td>
                		<td hidden=""><?php echo $v_paper['id_paper'] ?></td>
						<td><?php echo $v_paper['id_reg'] ?></td>
						<td><?php echo $v_paper['nama_usr'] ?></td>
						<td><?php echo $v_paper['judul_event'] ?></td>
						<td><?php echo $v_paper['tgl_upload'] ?></td>
						<td>
							<?php if($v_paper['status'] == '0'){
										echo "Proses" ;}
									else{
										echo "Terkirim";
								}
							?>
						</td>
						<td hidden="">
            			   	<div class="demo-btns">
              			      	 <li>
                			        <a href="<?php base_url() . 'user/edit/view_user/paper' . $v_paper['id_paper']; ?>">
                			        	<button type="button" name="tpaper" class="btn btn-info" data-toggle="modal" 
                			        	data-target="#tpaper"><i class="fa fa-download"></i></button>
                			        </a>
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
			
		</div>
			<!-- end widget div -->
      </div>
    </article>
  </div>
</section> <!-- end row -->

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
