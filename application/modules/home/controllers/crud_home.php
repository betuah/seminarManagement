<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Crud_home extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
      //Load models
			$this->load->model('user');
		}

		public function insert(){
			//$this->form_validation->set_rules('column_select','NIM Anda','required');
			// $this->form_validation->set_rules('nidn','Kode Dosen Anda');
			$this->form_validation->set_rules('nama_usr','Nama Anda','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Paswword Anda','required');
			$this->form_validation->set_rules('no_tlpn','Nomer Telepon Anda','required');
			$this->form_validation->set_rules('alamat','Alamat Anda','required');
			$this->form_validation->set_rules('jekel','Jenis Kelamin Anda','required');

			// echo $this->input->post('nama_usr');
			// echo "<br>".$this->input->post('email');
			// echo "<br>".$this->input->post('password');
			// echo "<br>".$this->input->post('no_tlpn');
			// echo "<br>".$this->input->post('alamat');
			// echo "<br>".$this->input->post('jekel');

			if($this->form_validation->run() == TRUE){
				 $this->load->user->tambah_user();
         		 $this->load->view('v_sukses');
				// echo $this->input->post('nama_usr');
				// echo "<br>".$this->input->post('email');
				// echo "<br>".$this->input->post('password');
				// echo "<br>".$this->input->post('no_tlpn');
				// echo "<br>".$this->input->post('alamat');
				// echo "<br>".$this->input->post('jekel');
			}else{
			 echo "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.history.back()
              </SCRIPT>";
			}
		}

    // public function insert() {
    //     $this->load->user->tambah_user();
    //     $this->load->view('v_sukses');
    // }
}
?>
