<?php
  /**
   *
   */
  class User extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_user');
      return $query->result_array();
    }

    public function count_all() {
      return $this->db->count_all('tb_usr');
    }

    public function get_type_usr() {
      $query = $this->db->get('tb_type_usr');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('v_user' , array('id_usr' => $id));
      return $query->row_array();
    }

    public function insert() {

      $a = $this->input->post('old_pass');
      $b = $this->input->post('new_pass');

      $data = array(
  						'id_usr' => $this->input->post('id_usr', TRUE)
  		);
      $r      = $this->db->get_where('tb_usr', $data);

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Username atau NIM yang Anda masukan sudah tersedia silahkan masukan kembali Username atau NIM yang berbeda')
              window.location.href='".base_url()."Admin#A_content/master/user';
              </SCRIPT>";
      } else {
        if ($a === $b) {
          $data = array(
            'id_usr'      => $this->input->post('id_usr'),
            'nama_usr'    => $this->input->post('nama_usr'),
            'id_type_usr' => $this->input->post('t_user'),
            'email'       => $this->input->post('email'),
            'jekel'       => $this->input->post('jekel'),
            'no_tlpn'     => $this->input->post('no_tlp'),
            'alamat_usr'  => $this->input->post('alamat'),
            'ket'         => $this->input->post('ket'),
            'password'    => md5($a),
            'tgl_daftar'  => date("Y-m-d")
          );

          $this->db->insert('tb_usr' , $data);
          return $mssg = '1';
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Password yang anda masukan tidak sesuai')
                window.location.href='".base_url()."Admin#A_content/master/user';
                </SCRIPT>";
        }
      }
    }

    public function update($id) {

      $op = $this->input->post('old_pass');
      $a  = md5($op);

      $ab = $this->input->post('old_pass1');
      $b  = $this->input->post('new_pass');
      $c  = $this->input->post('re_pass');

      if ($op != NULL || $op = "") {
        if ($a == $ab) {
          $data = array(
            'id_usr'      => $id,
            'nama_usr'    => $this->input->post('nama_usr'),
            'email'       => $this->input->post('email'),
            'jekel'       => $this->input->post('jekel'),
            'no_tlpn'     => $this->input->post('no_tlp'),
            'alamat_usr'  => $this->input->post('alamat'),
            'ket'         => $this->input->post('ket'),
            'password'    => md5($c),
          );

          $this->db->where('id_usr', $id);
          $this->db->update('tb_usr' , $data);
          return $mssg = '1';
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Password lama yang anda masukan salah')
                window.location.href='".base_url()."Admin#A_content/master/user';
                </SCRIPT>";
        }
      } else {
        $data = array(
          'id_usr'      => $id,
          'nama_usr'    => $this->input->post('nama_usr'),
          'email'       => $this->input->post('email'),
          'jekel'       => $this->input->post('jekel'),
          'no_tlpn'     => $this->input->post('no_tlp'),
          'alamat_usr'  => $this->input->post('alamat'),
          'ket'         => $this->input->post('ket'),
        );

        $this->db->where('id_usr', $id);
        $this->db->update('tb_usr' , $data);
        return $mssg = '1';
      }
    }

    public function delete($id) {
      return $this->db->delete('tb_usr' , array('id_usr' => $id));
    }
  }
?>
