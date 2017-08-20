<?php
	class Tiket extends CI_Model{

		function __construct(){
        $this->load->database();
    }

    public function get_tiket() 
      {
          $this->db->select('*');
          $this->db->from('v_e-ticket');
          $this->db->having('id_usr', $this->session->userdata('uid'));
          $this->db->order_by('id_usr','asc');
          $query = $this->db->get();
          return $query->result_array();
      }

      //menampilkan E-tiket
      public function get_id($id) {
        $query = $this->db->get_where('v_e-ticket',array('id_reg' => $id));
        return $query->row_array();
    }

    public function get_pdf($id) {
      $query = $this->db->get_where('v_e-ticket' , array('id_reg' => $id));
      return $query->row_array();
    }

    /*public function update_stat($id) {
      $data = array(
        'status'      => "1"
      );

      $this->db->where('id_reg', $id);
      $this->db->update('tb_reg' , $data);
      return $mssg = '1';
    } */     

}
?>	