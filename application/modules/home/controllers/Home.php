<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');
	class Home extends CI_Controller
		{
			function __construct()
			{
				parent::__construct();
				$this->load->model('user');
			}

			public function index()
			{	
				$data['judul'] = $this->user->GetEvent();
				$this->load->view('v_index',$data);
			}
			public function v_home(){
				$data['panitia'] = $this->user->GetPanitia();
				$this->load->view('v_home',$data);
			}

			public function data_panitia(){
				$data['panitia'] = $this->user->GetPanitia();
				$this->load->view('v_home',$data);
			}

			
			public function data_event(){
				$data['event'] = $this->user->GetEvent();
				$this->load->view('v_home',$data);
			}

			/*public function lihat_sertifikat(){
				$no_sertifikat = $this->input->post('no_sertifikat');
				$data['sertifikat'] = $this->user->cari_sertifikat($no_sertifikat);
				$this->load->view('v_home',$data);
			}*/

			public function cek_sertifikat($no_sertifikat)
			{
				$sertifikat = $this->user->cekSertifikat($no_sertifikat);

				if (NULL == $sertifikat) {
					$this->output->set_header('HTTP/1.1 400');
					$this->output->set_header('Content-Type: application/json');

					$result['message'] = 'Sertifikat tidak ditemukan';
					return $this->output->set_output(json_encode($result));
				}

				$this->output->set_header('HTTP/1.1 200 OK');
				$this->output->set_header('Content-Type: application/json');
				$result['data'] = $sertifikat;
				$this->output->set_output(json_encode($result));
			}

			public function detail_event($id_event){
				$data['detail_event'] = $this->user->GetDetailEvent("where id_event = $id_event");
				$data['speaker'] = $this->user->GetSpeaker("where id_event = $id_event");
				$data['panitia'] = $this->user->GetPanitia1("where id_event = $id_event");
				$this->load->view('v_home',$data);
		}		
	}
?>
