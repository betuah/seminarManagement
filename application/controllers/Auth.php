<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Load models
		$this->load->model('auth_model');
	}

	public function index()
	{
		$data['req'] = 'login';
		$this->load->view('index', $data);
	}

	public function req($req = 'else')
	{
		$data['req'] 							= $req;
		$data['get_jur'] 					= $this->auth_model->get_jur();

		if ($req == 'index') {
			$this->load->view('index', $data);
		} elseif ($req == 'signup') {
			$this->load->view('index', $data);
		} else {
			$this->load->view('404');
		}
	}

	public function signup() {
		$insrt = $this->auth_model->insert();

		if ($insrt == '1') {
			echo "<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Pendaftaran akun panitia anda telah di simpan Silahkan hubungi administrator untuk mengaktifasi akun anda')
						window.location.href='".base_url()."auth';
						</SCRIPT>";
		} else {
			echo $insrt;
		}
	}

	public function login() {
		$datau = array(
						'id_usr' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$rusr 		= $this->auth_model->cek_user($datau);

		$datap = array(
						'email' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$rpanitia = $this->auth_model->cek_panitia($datap);

		if ($rusr->num_rows() == 1) {
			foreach ($rusr->result() as $sess) {
				$sess_data['uid'] 		= $sess->id_usr;
				$sess_data['nama'] 		= $sess->nama_usr;
				$sess_data['level'] 	= $sess->id_type_usr;
				$sess_data['status'] 	= $sess->status;
				$this->session->set_userdata($sess_data);
			}

			if ($this->session->userdata('level')=='1') {
				redirect('Admin');
			} else {
				redirect('User');
			}
		} elseif ($rpanitia->num_rows() == 1) {

			foreach ($rpanitia->result() as $sess) {
				$sess_data['email'] 			= $sess->email;
				$sess_data['nama'] 				= $sess->nama;
				$sess_data['jab'] 				= $sess->tipe_panitia;
				$sess_data['level'] 			= $sess->id_type_usr;
				$sess_data['status'] 			= $sess->status;
				$sess_data['jur']					= $sess->id_jurusan;
				$this->session->set_userdata($sess_data);
			}

			if ($this->session->userdata('level')=='4' && $this->session->userdata('status')=='1') {
				redirect('Admin');
			} elseif ($this->session->userdata('level')=='4' && $this->session->userdata('status')=='0') {
				echo "<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Maaf Akun Panitia Anda Belum Aktif Silahkan hubungi administrator pada prodi masing - masing')
							window.location.href='".base_url()."auth';
							</SCRIPT>";
			} else {
				redirect('User');
			}
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('jur');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('jab');
		$this->session->unset_userdata('uid');
		session_destroy();
		redirect(base_url());
	}
}
