<?php
  /**
   *
   */
  class Report_reg extends CI_Model
  {

    function __construct(){
			$this->load->database();
		}

    public function get_all() {
      $query = $this->db->get('v_e-ticket');
      return $query->result_array();
    }

    public function count_all() {
      return $this->db->count_all('v_e-ticket');
    }

    public function count_search() {
      $jen      = $this->input->post('jenreg');
      $ide      = $this->input->post('ide');

      $this->db->like('id_event', $ide);
      $this->db->like('id_jen_reg', $jen);
      $this->db->from('v_e-ticket');
      return $this->db->count_all_results();
    }

    public function get_search() {
      $data = array(
  						'id_jen_reg' => $this->input->post('jenreg'),
  						'id_event' => $this->input->post('ide')
  		);

      $query = $this->db->get_where('v_e-ticket', $data);
      return $query->row_array();
    }
  }
?>
