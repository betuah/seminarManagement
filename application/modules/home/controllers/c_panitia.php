<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');
	class C_panitia extends CI_Controller
		{
			function __construct()
			{
				parent::__construct();
				$this->load->model('user');
			}
			
			public function data_panitia(){
				$data['panitia'] = $this->user->GetPanitia();
				$this->load->view('v_schedule', $data);
				
			}
		}
?>
