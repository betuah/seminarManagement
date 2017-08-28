<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-user-md fa-fw "></i>
				Transaksi
			<span>>
				Kehadiran
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

			<!-- Cek Absen Form-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon blue"> <i class="fa fa-edit"></i> </span>
					<h2>Konfirmasi Kehadiran</h2>
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
						<form action="<?php echo base_url() . 'admin/update/transaksi/absen/1?id='.$this->input->get('id');?>" method="post" class="smart-form">
							<header>
								Konfirmasi Kehadiran dengan id event <?php echo $this->input->get('id'); ?>
							</header>

							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-edit"></i>
											<input id="idreg" class="form-control" placeholder="No Registrasi atau NIM" name="noreg" type="text"  list="reg">
											<datalist id="reg">
												<?php foreach ($get_reg as $v_reg): ?>
													<option value="<?php echo $v_reg['id_reg']; ?>"><?php echo $v_reg['id_reg']; ?></option>
												<?php endforeach; ?>
											</datalist>
											<!-- <input type="text" id="reg" name="noreg" placeholder="No Registrasi" required=""> -->
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
											<input type="hidden" name="ide" value="<?php echo $this->input->get('id'); ?>">
										</label>
									</section>
									<section class="col col-6">
										<label class="select">
											<select name="absen">
												<option value="0" disabled="">Konfirmasi Kehadiran</option>
												<option value="2" selected="">Hadir</option>
												<option value="1">Tidak Hadir</option>
											</select> <i></i> </label>
									</section>
								</div>
							</fieldset>

							<fieldset>
								<div class="row">
									<section class="col col-xs-6">
										<label class="input"> <i class="icon-append fa fa-graduation-cap"></i>
											<input type="text" name="jdlevnt" id="tema" placeholder="Judul Event" readonly="">
										</label>
									</section>
									<section class="col col-xs-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="nmusr" id="nama" placeholder="Nama User" readonly="">
										</label>
									</section>
								</div>
							</fieldset>

							<footer>
								<button type="submit" class="btn btn-primary">
									Simpan
								</button>
							</footer>
						</form>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

			<!-- Data Table -->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-2" data-widget-editbutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Kehadiran</h2>
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
				          <th data-class="expand">No Reg</th>
				          <th data-class="expand">Nama</th>
									<th data-class="expand">Tema Seminar</th>
				          <th data-class="expand">Status</th>
									<th data-class="expand">Action</th>
					      </tr>
					    </thead>
							<tbody>
								<?php foreach ($get_absen as $v_absen): ?>
									<tr>
										<td><?php echo $v_absen['id_reg'] ?></td>
										<td><?php echo $v_absen['nama_usr'] ?></td>
										<td><?php echo $v_absen['judul_event'] ?></td>
										<td>
											<?php
												if($v_absen['status'] == '0') {
													echo "Belum Bayar";
												} elseif ($v_absen['status'] == '1') {
													echo "LUNAS";
												} else {
													echo "HADIR";
												}
											?>
										</td>
										<td>
											<ul class="demo-btns">
												<li>
													<button type="button" onclick="del('<?php echo $v_absen['id_reg'] ?>')" name="absndel" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button>
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
	   if (confirm("Apakah Anda yakin ingin menghapus data ini ? Note: Status Kehadiran Akan berubah") == true) {
	       window.location.href='<?php echo base_url() . "admin/delete/transaksi/absen/"?>'+ID;
	   } else {
	       return FALSE;
	   }
	}
</script>

<script type="text/javascript">
	$("input").on("paste",function(e){
			$("#test").focus();
	});

	$(document).ready(function() {
		$('#idreg').change(function() {
			var reg = $(this).val();

			$.ajax({
	 			type: 'GET',
	 			url: '<?php echo base_url()."api/reg"; ?>',
	 			data: {"id": reg, "act":"get"},
	 			success: function(res) {
					var stat = res[0].status;
					if (stat == '0') {
						alert('Maaf No registrasi ' + reg + ' Belum Melakukan Pembayaran, Segera lakukan pembayaran sebelum mengisi form absensi');
						window.location.href='<?php base_url() ?>Admin#A_content/transaksi/bayar';
					} else {
						$('#tema').val(res[0].judul_event);
						$('#nama').val(res[0].nama_usr);
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

		$(document).ready(function(){
		 	$('#npm').change(function(){    // KETIKA ISI DARI FIEL 'NPM' BERUBAH MAKA ......
		  var id = $('#npm').val();  // AMBIL isi dari fiel NPM masukkan variabel 'npmfromfield'
		  $.ajax({        // Memulai ajax
		    method: "GET",
		    url: "http://http://localhost/semnas/api/users?id="+id,    // file PHP yang akan merespon ajax
		    data: { id_usr: id}   // data POST yang akan dikirim
		  })
		    .done(function( hasilajax ) {   // KETIKA PROSES Ajax Request Selesai
		        $('#nama').val(hasilajax);  // Isikan hasil dari ajak ke field 'nama'
		    });
		 })
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
