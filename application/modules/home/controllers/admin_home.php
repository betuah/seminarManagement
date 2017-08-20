<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_home extends CI_Controller {

		public function __construct(){
			parent::__construct();

			//Load models
			$this->load->model('user');
			/*$this->load->model('event');
			$this->load->model('paper');
			$this->load->model('absen');
			$this->load->model('bayar');
			$this->load->model('cek_bayar');
			$this->load->model('cek_paper');
			$this->load->model('reg');
			$this->load->model('sertifikat');*/
		}

		public function h_content($content = 'index' , $pages = 'index') {
			$this->load->helper('url');

			// Controller calling view data from model
			$data['get_user'] 					= $this->user->get();
			/*$data['get_event'] 				= $this->event->get();
			$data['get_paper'] 					= $this->paper->get();
			$data['get_absen'] 					= $this->absen->get();
			$data['get_byr'] 					= $this->bayar->get();
			$data['get_c_byr'] 					= $this->cek_bayar->get();
			$data['get_c_paper'] 				= $this->cek_paper->get();
			$data['get_reg'] 					= $this->reg->get();
			$data['get_sertifikat'] 			= $this->sertifikat->get();*/

			// Controller Routing (View Pages)
			if ($content != 'index' && $pages != 'index') {
				$this->load->view('content/'.$content.'/'.$pages , $data);
			} else {
				$this->load->view($content);
			}
		}
	}
?>
