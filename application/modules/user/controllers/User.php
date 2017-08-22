<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller {

		public function __construct(){
			parent::__construct();
			//$this->load->library('session');
			//session_start();
			if ($this->session->userdata('level')!=="3") {
				redirect('auth');
			}

			//$this->load->model('New folder/Mprofil');
			$this->load->model('profil');
			//Parent -> Load Model
			$this->load->model('dashboard');
			$this->load->model('Mview');
			$this->load->model('paper');
			$this->load->model('tiket');
			$this->load->model('sert');
		}

		public function u_content($content = 'index', $pages='index')
		{
			$this->load->helper('url');
			//Controller -> load Model
			$data['auto_id']      		= $this->paper->auto_id_paper();

			$data['get_v_user']   		= $this->profil->get_user();
			$data['get_v_reg']	 		= $this->profil->get_reg();
			$data['get_v_jenreg']	 	= $this->profil->get_jen_reg();

			$data['get_v_event'] 		= $this->dashboard->get_event();
			$data['get_v_detail'] 		= $this->dashboard->get_detail_event();
			$data['get_v_peserta'] 		= $this->dashboard->get_peserta();

			$data['get_v_pmkalah']		= $this->Mview->get_pmkalah();
			$data['get_v_status'] 		= $this->Mview->get_status();
			$data['get_v_speaker'] 		= $this->Mview->get_speaker();

			$data['get_v_sertifikat'] 	= $this->sert->get();
			$data['get_v_paper'] 		= $this->paper->get_paper();
			$data['get_v_tiket']  		= $this->tiket->get_tiket();
			
			//Auto Id Reg
			$data['auto_id_reg']		= $this->dashboard->auto_id_reg();
			$data['auto_id_paper']      = $this->paper->auto_id_paper();
			//Combo box
			$data['get_compaper'] 		= $this->dashboard->get_cpaper();
			//$data['get_com'] 			= $this->Mview->get_jen();

			//Controller -> Routing
			if ($content != 'index' && $pages != 'index') {
				$this->load->view('content/'.$content.'/'.$pages , $data);
			} else {
				$this->load->view($content);
			}
		}

		public function insert($content, $pages)
		{
			$ins = $this->paper->insert();
			//redirect('User#U_content/'.$content.'/'.$pages);

			if ($ins == '1') 
			{
				 echo "<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('File Telah Tersimpan')
                     window.location.href='".base_url()."User#U_content/view_user/paper';
                     </SCRIPT>";
			} 
			else 
			{
				echo $ins;
			}
    	}

	}
?>
