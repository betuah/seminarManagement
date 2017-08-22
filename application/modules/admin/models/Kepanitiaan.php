<?php
  /**
   *
   */
  class Kepanitiaan extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('tb_jurusan');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_jurusan' , array('id_jurusan' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_jurusan'  => $this->input->post('idjur'),
        'nama_jur'    => $this->input->post('namajur')
      );

      if ($data !== NULL) {
        $this->db->insert('tb_jurusan' , $data);
        $p = '1';
      } else {
        $p = '0';
      }

      return  $p;
    }

    public function update($id) {

      $data = array(
        'id_jurusan'  => $id,
        'nama_jur'    => $this->input->post('nama_jur')
      );

      $this->db->where('id_jurusan', $id);
      return $this->db->update('tb_jurusan' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_jurusan' , array('id_jurusan' => $id));
    }
  }
?>
