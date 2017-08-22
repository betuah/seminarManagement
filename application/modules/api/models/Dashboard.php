<?php
  /**
   *
   */
  class Dashboard extends CI_Model
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

    public function get_evnt($id) {
      $data = array(
  						'id_jurusan' => $id
  		);

      $this->db->select('id_event, judul_event, tgl_event');
      $query = $this->db->get_where('v_event', $data);
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('v_e-ticket' , array('id_event' => $id));
      return $query->row_array();
    }

    public function jml_reg($id, $jen) {
      $this->db->like('id_event', $id);
      $this->db->like('id_jen_reg', $jen);
      $this->db->from('v_e-ticket');
      return $query = $this->db->count_all_results();
    }

    public function stat_bayar($id, $stat) {
      // echo $stat;
      $this->db->like('id_event', $id);
      $this->db->like('stat_byr', $stat);
      $this->db->from('v_bayar');
      return $query = $this->db->count_all_results();
    }

    public function stat_blunas($id, $jen, $stat) {
      // echo $stat;
      $this->db->like('id_event', $id);
      $this->db->like('id_jen_reg', $jen);
      $this->db->like('status', $stat);
      $this->db->from('v_e-ticket');
      return $query = $this->db->count_all_results();
    }

    public function sum($id) {
      $this->db->select_sum('total_bayar');
      $this->db->where('id_jurusan', $id);
      $query = $this->db->get('api_byr');
      return $query->row_array();
    }
  }
?>
