<?php

class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('a4', 'landscape');
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}
