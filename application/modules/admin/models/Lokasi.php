<?php
  /**
   *
   */
  class Lokasi extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('tb_lokasi');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_lokasi' , array('id_lokasi' => $id));
      return $query->row_array();
    }

    public function insert() {

      $data = array(
        'id_lokasi'       => $this->input->post('idloc'),
        'nama_ruangan'    => $this->input->post('namaru'),
        'lokasi'          => $this->input->post('lok'),
        'alamat'          => $this->input->post('alamat'),
        'lat'             => $this->input->post('lat'),
        'long'            => $this->input->post('long')
      );

      if ($data !== NULL) {
        $this->db->insert('tb_lokasi' , $data);
        $p = '1';
      } else {
        $p = '0';
      }

      return  $p;
    }

    public function update($id) {

      $data = array(
        'id_lokasi'       => $this->input->post('idloc'),
        'nama_ruangan'    => $this->input->post('namaru'),
        'lokasi'          => $this->input->post('loc'),
        'alamat'          => $this->input->post('alamat'),
        'lat'             => $this->input->post('lat'),
        'long'            => $this->input->post('long')
      );

      $this->db->where('id_lokasi', $id);
      return $this->db->update('tb_lokasi' , $data);
    }

    public function delete($id) {
      return $this->db->delete('tb_lokasi' , array('id_lokasi' => $id));
    }

    public function auto_id_loc() {
      $q = $this->db->query("SELECT MAX(RIGHT(id_lokasi,3)) AS idmax FROM tb_lokasi");
      $id = ""; //kode awal
      if($q->num_rows()>0){ //jika data ada
        foreach($q->result() as $k){
          $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
          $id = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
        }
      } else{ //jika data kosong diset ke kode awal
        $id = "001";
      }
      $init = "LOC"; //karakter depan kodenya
      //gabungkan string dengan kode yang telah dibuat tadi
      $r = $init.$id;
      return $r;
    }
  }
?>
