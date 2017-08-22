<?php
  /**
   *
   */
  class Cek_paper extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
      $this->load->helper(array('form', 'url'));
		}

    public function get() {
      $query = $this->db->get('tb_paper');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_paper' , array('id_paper' => $id));
      return $query->row_array();
    }

    public function update($id) {
      $data = array(
        'status'  => $this->input->post('status')
      );

      $this->db->where('id_paper', $id);
      return $this->db->update('tb_paper' , $data);
    }
  }
?>
