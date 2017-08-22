<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cgen extends CI_Controller {
		public function __construct(){
			parent::__construct();
			    $this->load->library('pdf');
      		$this->load->helper(array('url','download')); 
      		$this->load->library('encrypt');
      		$this->load->model('dashboard');
      		$this->load->model('tiket');
		}

    	public function generate_pdf($content,$pages,$id){
      $req = "E_tiket/e-tiket";
      $data['id'] = $this->$pages->get_pdf($id);
      $html       = $this->load->view($req,$data,TRUE);
      $this->pdf->load_view('E_tiket/e-tiket',$html);
      $this->pdf->render();
      $this->pdf->stream($id.".pdf");
    }
	}
?>
