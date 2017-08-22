<?php
  /**
   *
   */
  class Sertifikat extends CI_Model
  {

    function __construct(){
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_sertifikat');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_sertifikat' , array('id_jurusan' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_jurusan'  => $_POST['idjur'],
        'nama_jur'    => $_POST['namajur']
      );

      return $this->db->insert('tb_sertifikat' , $data);
    }

    public function update($id) {

      $data = array(
        'id_jurusan'  => $id,
        'nama_jur'    => $_POST['nama_jur']
      );

      $this->db->where('id_jurusan', $id);
      return $this->db->update('tb_sertifikat' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_sertifikat' , array('id_jurusan' => $id));
    }
  }
?>
