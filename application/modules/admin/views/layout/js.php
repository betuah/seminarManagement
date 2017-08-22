<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<!-- <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/pace/pace.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/smartadmin/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/smartadmin/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/smartadmin/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/smartadmin/js/jquery-ui/jquery-ui.min.js"></script>
<!-- #PLUGINS -->
<script>
	function Delete() {
	    confirm("Apakah Anda yakin ingin menghapus data ini ?");
	}
</script>
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/libs/jquery-2.1.1.min.js"></script>
<script>
  if (!window.jQuery) {
    document.write('<script src="<?php echo base_url(); ?>assets/smartadmin/js/libs/jquery-2.1.1.min.js"><\/script>');
  }
</script>

<script src="<?php echo base_url(); ?>assets/smartadmin/js/libs/jquery-ui-1.10.3.min.js"></script>
<script>
  if (!window.jQuery.ui) {
    document.write('<script src="<?php echo base_url(); ?>assets/smartadmin/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
  }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices: you can disable this in app.js -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>
  <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->

<!-- Demo purpose only -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/demo.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="<?php echo base_url(); ?>assets/smartadmin/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/smartadmin/js/smart-chat-ui/smart.chat.manager.min.js"></script>

<!-- Confirm Dialog -->
<script type="text/javascript" scr="<?php echo base_url(); ?>assets/styles/dist/jquery-confirm.min.js"></script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
