<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	// session_start();
	class Admin extends CI_Controller {

		public function __construct(){
			parent::__construct();

			$this->load->helper('text');

			//Load models
			$this->load->model('jurusan');
			$this->load->model('event');
			$this->load->model('paper');
			$this->load->model('absen');
			$this->load->model('bayar');
			$this->load->model('cek_paper');
			$this->load->model('reg');
			$this->load->model('sertifikat');
			$this->load->model('user');
			$this->load->model('panitia');
			$this->load->model('speaker');
			$this->load->model('periode');
			$this->load->model('dashboard');
			$this->load->model('lokasi');

			// Report Model
			$this->load->model('report_reg');
		}

		public function v_content($content = 'index' , $pages = 'index') {
			$this->load->helper('url');

			// Controller calling view data from model
			$data['get_jur'] 					= $this->jurusan->get();
			$data['get_loc'] 					= $this->lokasi->get();
			$data['get_type_usr'] 		= $this->user->get_type_usr();
			$data['get_usr']					= $this->user->get();
			$data['get_panitia']			= $this->panitia->get();
			$data['get_spk']					= $this->speaker->get();
			$data['get_event'] 				= $this->event->get();
			$data['get_jen_evn'] 			= $this->event->get_jen_evn();
			$data['get_periode']			= $this->periode->get();
			$data['get_per'] 					= $this->periode->get_per();
			$data['get_paper'] 				= $this->paper->get();
			$data['get_absen'] 				= $this->absen->get();
			$data['get_byr'] 					= $this->bayar->get();
			$data['get_c_paper'] 			= $this->cek_paper->get();
			$data['get_reg'] 					= $this->reg->get();
			$data['get_sertifikat'] 	= $this->sertifikat->get();
			$data['count_usr']				= $this->user->count_all();
			$data['count_event']			= $this->event->count_all();
			$data['count_reg']				= $this->reg->count_all();
			$data['auto_id_jur']			= $this->jurusan->auto_id_jur();
			$data['auto_id_loc']			= $this->lokasi->auto_id_loc();
			$data['auto_id_paper']		= $this->paper->auto_id_paper();
			$data['auto_id_reg']			= $this->reg->auto_id_reg();
			$data['auto_id_evn']			= $this->event->auto_id_evn();
			$data['auto_id_byr']			= $this->bayar->auto_id_byr();
			$data['report_reg']				= $this->report_reg->get_all();
			$data['count_reg']				= $this->report_reg->count_all();
			$data['sum_byr']					= $this->bayar->sum();

			// Controller Routing (View Pages)
			if ($content != 'index' && $pages != 'index') {
				$this->load->view('content/'.$content.'/'.$pages , $data);
			} else {
				$this->load->view($content);
			}
		}

		public function insert($content, $pages) {
			$insrt = $this->$pages->insert();

			if ($insrt == '1') {
				redirect('Admin#A_content/'.$content.'/'.$pages);
			} else {
				echo $insrt;
			}
    }

		public function filter($id) {
			$this->panitia->filter_panitia($id);
		}

		public function edit($content, $pages , $id) {
			$data['get_type_usr'] 		= $this->user->get_type_usr();
			$data['get_jur'] 					= $this->jurusan->get();
			$data['get_jen_evn'] 			= $this->event->get_jen_evn();
			$data['id'] 							= $this->$pages->get_id($id);

			$this->load->view('content/'. $content .'/edit/edit_' . $pages, $data);
		}

		public function count($id) {
			$all 				= $this->dashboard->count_all();
			$peserta		= $this->dashboard->jml_reg($id,'1');
			$pemakalah	= $this->dashboard->jml_reg($id,'2');

			$r = array('all' => $all, 'peserta' => $peserta, 'pemakalah' => $pemakalah,);
      echo json_encode($r);
		}

		public function update($content, $pages , $id) {
			$updt 						= $this->$pages->update($id);
			$data['get_jur'] 	= $this->$pages->get();

			if ($updt == '1') {
				redirect('Admin#A_content/'.$content.'/'.$pages , $data);
			} else {
				echo $updt;
			}
		}

		public function delete($content, $pages , $id) {
			$this->$pages->delete($id);
			redirect('Admin#A_content/'.$content.'/'.$pages);
		}

		public function search($content, $pages , $key) {
			$this->$pages->search($key);
			redirect('Admin#A_content/'.$content.'/'.$pages, $data);
		}

		public function cek($content, $pages , $id) {
			// $data['id'] 							= $this->$pages->get_id($id);
			//
			$this->load->view('content/'. $content .'/'. $pages);
			// echo "string";
		}
	}
?>
