<?php
	class Profil extends CI_Model
	{
		function __construct()
		{
        	$this->load->database();
    	}

        //Peserta
        public function get_reg()
        {
            $this->db->select('*');
            $this->db->from('v_e-ticket');
            //$this->db->where('id_event');
            $this->db->where('id_jen_reg','1');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_user() {

            $this->db->select('*');
            $this->db->from('tb_usr');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_usr','asc');
            $query = $this->db->get();

            return $query->result_array();
        }

        //Daftar
        public function get_jen_reg()
        {
            $this->db->select('*');
            $this->db->from('v_jen_reg');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_usr','asc');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_id($id) {
        $query = $this->db->get_where('tb_usr',array('id_usr' => $id));
        return $query->row_array();
      }

      public function update() {
      
      $op = $this->input->post('old_pass');
      $a  = md5($op);
      $ab = $this->input->post('old_pass1');
      $b  = $this->input->post('new_pass');
      $c  = $this->input->post('re_pass');
      $id = $this->input->post('idusr');

      if ($op != NULL || $op = "") {
        if ($a == $ab) {
          $data = array(
          'id_usr'      => $this->input->post('idusr'),
          'password'    => md5($c),
        );

        $this->db->where('id_usr',$id);
        $this->db->update('tb_usr' , $data);
        return $mssg = '1';
        }
        else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Current Password : False')
                window.location.href='".base_url()."User#U_content/view_user/profil';
                </SCRIPT>";
        }
      }
      else {
        $data = array(
          'id_usr'      => $this->input->post('idusr'),
          'password'    => md5($c),
        );

        $this->db->where('id_usr', $id);
        $this->db->update('tb_usr' , $data);
        return $mssg = '1';
      }
    }

    }
?>
