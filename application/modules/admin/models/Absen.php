<?php
  /**
   *
   */
  class Absen extends CI_Model
  {

    function __construct(){
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_kehadiran');
      return $query->result_array();
    }

    public function update($id) {
      $ide = $this->input->post('ide');
      $id  = $this->input->post('noreg');

      $sql = "SELECT status FROM tb_reg WHERE (id_reg = '".$id."' or id_usr = '".$id."') AND id_event = '".$ide."'";

      $r = $this->db->query($sql);

      if ($r->num_rows() == 1) {
        foreach ($r->result_array() as $reg) {
          $stat = $reg['status'];
        }

        if ($stat == '0') {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Peserta dengan nomor registrasi ".$this->input->post('noreg')." Belum melakukan pembayar')
                window.location.href='".base_url()."Admin#A_content/transaksi/absen';
                </SCRIPT>";
        } else {
          $this->form_validation->set_rules('noreg','IDR','required');
          $this->form_validation->set_rules('absen','absen','required');

          if ($this->form_validation->run() == FALSE) {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Pastikan Semua data telah terisi ')
                  window.location.href='".base_url()."Admin#A_content/transaksi/absen';
                  </SCRIPT>";
          } else {
            $ids = $this->input->post('noreg');
            $data = array(
              'id_reg'    => $this->input->post('noreg'),
              'status'    => $this->input->post('absen')
            );

            $this->db->where('id_reg', $ids);
            return $this->db->update('tb_reg' , $data);
          }
        }
      } else {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('ID Registrasi yang Anda masukan tidak tersedia')
              window.location.href='".base_url()."Admin#A_content/transaksi/absen';
              </SCRIPT>";
      }
    }

    public function delete($id) {
      $data3 = array(
              'id_reg' => $id
      );
      $r3     = $this->db->get_where('tb_reg', $data3);

      foreach ($r3->result_array() as $reg) {
        $stat      = $reg['status'];
      }

      if ($stat == '0') {
        $data = array(
          'id_reg'    => $id,
          'status'    => '0'
        );

        $this->db->where('id_reg', $id);
        return $this->db->update('tb_reg' , $data);
      } else {
        $data = array(
          'id_reg'    => $id,
          'status'    => '1'
        );

        $this->db->where('id_reg', $id);
        return $this->db->update('tb_reg' , $data);
      }
    }
  }
?>