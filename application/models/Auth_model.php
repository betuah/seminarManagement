<?php
  /**
   *
   */
  class Auth_model extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function cek_user($data) {
      $query = $this->db->get_where('v_user', $data);
      return $query;
    }

    public function get_jur() {
      $query = $this->db->get('tb_jurusan');
      return $query->result_array();
    }

    public function cek_panitia($data) {
      $query = $this->db->get_where('tb_panitia', $data);
      return $query;
    }

    public function get_type_usr() {
      $query = $this->db->get('tb_type_usr');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_usr' , array('id_usr' => $id));
      return $query->row_array();
    }

    public function insert() {
      $data = array(
  				'email' => $this->input->post('email', TRUE)
  		);
  		$r      = $this->db->get_where('tb_panitia', $data);

  		if ($r->num_rows() == 1) {
  			return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
  						window.alert('Email telah tersedia')
  						window.location.href='".base_url()."auth/req/signup';
  						</SCRIPT>";
  		} else {

  			$pass   = $this->input->post('pass');
  			$repass = $this->input->post('repass');

  			$this->form_validation->set_rules('nama','Nama','required');
  			$this->form_validation->set_rules('tlpn','No Telepon','required');
  			$this->form_validation->set_rules('email','Email','required');
  			$this->form_validation->set_rules('pass','Password','required');
  			$this->form_validation->set_rules('repass','Re Password','required');

  			if ($this->form_validation->run() == FALSE) {
  				return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
  							window.alert('Pastikan Semua data telah terisi ')
  							window.location.href='".base_url()."auth/req/signup';
  							</SCRIPT>";
  			} else {
  				if ($pass === $repass) {

  					$data = array(
  						'nama'        => $this->input->post('nama'),
  						'tlpn'        => $this->input->post('tlpn'),
  						'email'       => $this->input->post('email'),
              'id_jurusan'  => $this->input->post('jur'),
  						'password'    => md5($pass),
  						'id_type_usr' => '4',
  						'status'  		=> '0'
  					);
  					$this->db->insert('tb_panitia' , $data);
  					return $mssg = '1';
  				} else {
  					return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
  								window.alert('Password tidak sesuai')
  								window.location.href='".base_url()."auth/req/signup';
  								</SCRIPT>";
  				}
  			}
  		}
    }
  }
?>
