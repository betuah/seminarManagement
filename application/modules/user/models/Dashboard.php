<?php
  class Dashboard extends CI_Model
  {
      function __construct(){
        $this->load->database();
    }

    //Menampilkan table event
      public function get_event() {
        return $query = $this->db->get('v_event')->result_array();
    }

    //Registrasi
    public function get() {
      return $query = $this->db->get_where('tb_event')->result_array();
    }

    public function get_cpaper()
        {
            $this->db->select('*');
            $this->db->from('v_jen_reg');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_reg','asc');
            $this->db->where('id_jen_reg','2');
            $query = $this->db->get();
            return $query->result_array();
        }

    public function get_peserta() {
            $this->db->select('*');
            $this->db->from('v_e-ticket');
            //$this->db->where('status','1');
            $this->db->order_by('id_event',$this->input->post("idevent"));
            $query = $this->db->get();
            return $query->result_array();
    }

    //Generate PDF Tiket
    public function get_pdf($id) {
      $query = $this->db->get_where('v_e-ticket' , array('id_reg' => $id));
      return $query->row_array();
    }

    //Detail Event
    public function get_detail_event() {
        return $query = $this->db->get_where('v_detail_event')->result_array();
    }

    //menampilkan E-tiket && Detail Tema dashboard
      public function get_id($id) {
        $query = $this->db->get_where('v_event',array('id_event' => $id));
        return $query->row_array();
    }

    //Auto Id Reg
    public function auto_id_reg()
      {
        $q = $this->db->query("SELECT MAX(RIGHT(id_reg,5)) AS idmax FROM tb_reg");
        $id = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
          foreach($q->result() as $k)
          {
            $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
            $id = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
          }
        }
        else
        { //jika data kosong diset ke kode awal
          $id = "0001";
        }

        $r = $tmp;
        return $r;
      }

    public function insert() {
      
    }
  }
 ?>
