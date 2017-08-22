<?php
  /**
   *
   */
  class Jurusan extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $this->session->userdata('jur') !='' ? $query = $this->db->get_where('tb_jurusan' , array('id_jurusan' => $this->session->userdata('jur'))) :   $query = $this->db->get('tb_jurusan');
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

    public function auto_id_jur() {
      $q = $this->db->query("SELECT MAX(RIGHT(id_jurusan,3)) AS idmax FROM tb_jurusan");
      $id = ""; //kode awal
      if($q->num_rows()>0){ //jika data ada
        foreach($q->result() as $k){
          $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
          $id = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
        }
      } else{ //jika data kosong diset ke kode awal
        $id = "001";
      }
      $init = "JRU"; //karakter depan kodenya
      //gabungkan string dengan kode yang telah dibuat tadi
      $r = $init.$id;
      return $r;
    }
  }
?>
