<?php

  class Mview extends CI_Model
  {
      function __construct(){
        $this->load->database();
    }

    public function get_status() {
            $this->db->select('*');
            $this->db->from('v_e-ticket');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_usr','asc');
            $query = $this->db->get();
            return $query->result_array();
        }

    public function get_jurusan() {
      $this->db->order_by('nama_jur','asc');
      return $data = $this->db->get('tb_jurusan')->result_array();
    }

    public function get_jen() {
      $this->db->select('*');
      $this->db->from('tb_jen_reg');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function get_speaker() {
      $this->db->order_by('id_event','asc');
      return $data = $this->db->get('tb_speaker')->result_array();
    }
        //Pemakalah
        public function get_pmkalah() 
        {
            $this->db->select('*');
            $this->db->from('v_jen_reg');
            //$this->db->where('status','1');
            $this->db->where('id_jen_reg','2');
            $query = $this->db->get();
            return $query->result_array();
        }
  }
?>
