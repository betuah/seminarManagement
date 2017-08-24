<?php
  /**
   *
   */
  class Panitia extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_panitia');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_panitia' , array('id_panitia' => $id));
      return $query->row_array();
    }

    public function filter_panitia($id) {
      $query  = $this->db->get_where('v_panitia' , array('id_jurusan' => $id));
      $r      = $query->result_array();

      foreach ($r as $row) {
        echo "<option value='".$row['id_panitia']."'>".$row['nama']."</option>";
      }
    }

    public function insert() {
      $data = array(
  						'email' => $this->input->post('email', TRUE)
  		);
      $r      = $this->db->get_where('tb_panitia', $data);

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Email telah tersedia')
              window.location.href='".base_url()."Admin#A_content/master/user';
              </SCRIPT>";
      } else {

        $pass   = $this->input->post('pass');
        $repass = $this->input->post('re_pass');
        $tipe   = $this->input->post('pan');
        $jur    = $this->input->post('jur');

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('tlpn','No Telepon','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('pan','Organisasi','required');
        $this->form_validation->set_rules('pass','Password','required');
        $this->form_validation->set_rules('re_pass','Re Password','required');
        $this->form_validation->set_rules('jur','Jurusan','required');

        if ($this->form_validation->run() == FALSE) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pastikan Semua data telah terisi ')
                window.location.href='".base_url()."Admin#A_content/master/panitia';
                </SCRIPT>";
        } else {
          if ($pass === $repass) {

            $data = array(
              'nama'        => $this->input->post('nama'),
              'tlpn'        => $this->input->post('tlpn'),
              'email'       => $this->input->post('email'),
              'password'    => md5($pass),
              'tipe_panitia'=> $this->input->post('pan'),
              'id_type_usr' => "4",
              'id_jurusan'  => $this->input->post('jur')
            );
            $this->db->insert('tb_panitia' , $data);
            return $mssg = '1';
          } else {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Password tidak sesuai')
                  window.location.href='".base_url()."Admin#A_content/master/panitia';
                  </SCRIPT>";
          }
        }
      }
    }

    public function update($id) {

        $pass       = $this->input->post('pass');
        $repass     = $this->input->post('re_pass');

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('tlpn','No Telepon','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('pan','Organisasi','required');
        $this->form_validation->set_rules('jur','Jurusan','required');

        if ($pass == NULL && $repass == NULL) {
          if ($this->form_validation->run() == FALSE) {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Pastikan Semua data telah terisi, kecuali password..')
                  window.location.href='".base_url()."Admin#A_content/master/panitia';
                  </SCRIPT>";
          } else {
            $data = array(
              'nama'        => $this->input->post('nama'),
              'tlpn'        => $this->input->post('tlpn'),
              'tipe_panitia'=> $this->input->post('pan'),
              'status'      => $this->input->post('confirm')
            );

            $this->db->where('id_panitia', $id);
            $this->db->update('tb_panitia' , $data);
            return $mssg = '1';
          }
        } elseif ($pass == $repass) {
            $data = array(
              'nama'        => $this->input->post('nama'),
              'tlpn'        => $this->input->post('tlpn'),
              'email'       => $this->input->post('email'),
              'password'    => md5($repass),
              'tipe_panitia'=> $this->input->post('pan'),
              'id_type_usr' => "4",
              'id_jurusan'  => $this->input->post('jur')
            );

            $this->db->where('id_panitia', $id);
            $this->db->update('tb_panitia' , $data);
            return $mssg = '1';
        }
        else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Password lama salah atau password baru tidak sesuai')
                window.location.href='".base_url()."Admin#A_content/master/panitia';
                </SCRIPT>";
        }
    }

    public function delete($id) {
      return $this->db->delete('tb_panitia' , array('id_panitia' => $id));
    }
  }
?>
