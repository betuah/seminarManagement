<?php
  /**
   *
   */
  class Periode extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_periode');
      return $query->result_array();
    }

    public function get_per() {
      $this->db->distinct();
      $this->db->select('id_periode');
      $query = $this->db->get('tb_periode_panitia');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('v_periode' , array('id_per' => $id));
      return $query->row_array();
    }

    public function insert() {
      $pan = $this->input->post('idpan');
      foreach ($pan as $panitia) {
        $d = array(
          'id_periode'    => $this->input->post('idper'),
          'id_panitia'    => $panitia
        );
        $r = $this->db->get_where('tb_periode_panitia', $d);
      }

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Data yang Anda masukan telah tersedia')
              window.location.href='".base_url()."Admin#A_content/master/periode';
              </SCRIPT>";
      } else {
        $this->form_validation->set_rules('idper','Paper','required');
        $this->form_validation->set_rules('idpan[]','Periode','required');

        if ($this->form_validation->run() == FALSE) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pastikan Semua data telah terisi ')
                window.location.href='".base_url()."Admin#A_content/master/periode';
                </SCRIPT>";
        } else {
          $pan = $this->input->post('idpan');
          foreach ($pan as $panitia) {

            $data = array(
              'id_periode'    => $this->input->post('idper'),
              'id_panitia'    => $panitia
            );

            $this->db->insert('tb_periode_panitia' , $data);
          }
          return $mssg = '1';
        }
      }
    }

    public function update($id) {

      $data = array(
        'id_periode'  => $id,
        'nama_jur'    => $this->input->post('nama_jur')
      );

      $this->db->where('id_periode', $id);
      $this->db->update('tb_periode_panitia' , $data);
      return $mssg = '1';
    }

    public function delete($id) {
      return $this->db->delete('tb_periode_panitia' , array('id_per' => $id));
    }
  }
?>
