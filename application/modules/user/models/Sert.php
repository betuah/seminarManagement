<?php
	class Sert extends CI_Model
	{
		function __construct()
		{
        	$this->load->database();
    	}

    	public function get() {
            $this->db->select('*');
            $this->db->from('v_sertifikat');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_usr','asc');
            $query = $this->db->get();
            return $query->result_array();
        }

    	public function get_id($id) {
        $query = $this->db->get_where('v_sertifikat',array('no_sertifikat' => $id));
        return $query->row_array();
	}
}
?>