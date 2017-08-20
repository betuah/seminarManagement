<?php
  /**
   *
   */
  class Bayar extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
      $this->load->helper(array('form', 'url'));
		}

    public function get() {
      $query = $this->db->get('tb_byr');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_byr' , array('id_bayar' => $id));
      return $query->row_array();
    }

    public function insert() {
      $data = array(
  						'id_reg' => $this->input->post('noreg', TRUE)
  		);
      $r      = $this->db->get_where('tb_byr', $data);

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Anda sudah pernah melakukan pembayaran ini')
              window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
              </SCRIPT>";
      } else {

        if ($r->num_rows() !== 1) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('ID Registrasi yang Anda masukan tidak tersedia')
                window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                </SCRIPT>";
        } else {
          $data2 = array(
      						'id_reg' => $this->input->post('noreg', TRUE)
      		);
          $r2      = $this->db->get_where('tb_reg', $data2);

          foreach ($r2->result_array() as $reg) {
            $qty      = $reg['quota'];
            $ide      = $reg['id_event'];
          }

          $this->db->like('id_event', $ide);
          $this->db->like('stat_byr', '1');
          $this->db->from('v_bayar');
          $reg_count = $this->db->count_all_results();

          $rqty      = $qty - $reg_count;

          if ($rqty == '0') {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Maaf Quota sudah habis')
                  window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                  </SCRIPT>";
          } else {
            $idreg  = $this->input->post('noreg');
            $query  = $this->db->get_where('v_bayar', array('id_reg' => $idreg));
            $r      = $query->row_array();
            $harga  = $r['harga'];
            $tbyr   = $this->input->post('tbyr');

            if ($tbyr < $harga) {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Pembayaran Anda kurang dari harga event')
                    window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                    </SCRIPT>";
            } else {

              $this->form_validation->set_rules('id_bayar','IDB','required');
              $this->form_validation->set_rules('tbyr','TBY','required');
              $this->form_validation->set_rules('noreg','IDR','required');

              if ($this->form_validation->run() == FALSE) {
                return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Pastikan Semua data telah terisi ')
                      window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                      </SCRIPT>";
              } else {

                $data   = array(
                  'id_bayar'      => $this->input->post('id_bayar'),
                  'total_bayar'   => $this->input->post('tbyr'),
                  'id_reg'        => $this->input->post('noreg'),
                  'stat_byr'      => "1",
                  'tgl_bayar'     => $cdate
                );
                $this->db->insert('tb_byr' , $data);
                return $mssg = '1';
              }
            }
          }
        }
      }
    }

    public function update($id) {
      $data = array(
  						'id_reg' => $this->input->post('noreg', TRUE)
  		);
      $r      = $this->db->get_where('tb_reg', $data);

      if ($r->num_rows() !== 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('ID Registrasi yang Anda masukan tidak tersedia')
              window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
              </SCRIPT>";
      } else {

        $idreg  = $this->input->post('noreg');
        $query  = $this->db->get_where('v_bayar', array('id_reg' => $idreg));
        $r      = $query->row_array();
        $harga  = $r['harga'];
        $tbyr   = $this->input->post('tbyr');

        if ($tbyr < $harga) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pembayaran Anda kurang dari harga event')
                window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                </SCRIPT>";
        } else {

          $this->form_validation->set_rules('id_bayar','IDB','required');
          $this->form_validation->set_rules('tbyr','TBY','required');
          $this->form_validation->set_rules('noreg','IDR','required');
          $this->form_validation->set_rules('bdate','DATE','required');

          if ($this->form_validation->run() == FALSE) {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Pastikan Semua data telah terisi ')
                  window.location.href='".base_url()."Admin#A_content/transaksi/bayar';
                  </SCRIPT>";
          } else {
            $data   = array(
              'id_bayar'      => $id,
              'total_bayar'   => $this->input->post('tbyr'),
              'id_reg'        => $this->input->post('noreg'),
              'stat_byr'      => "1",
              'tgl_bayar'     => $this->input->post('bdate')
            );

            $this->db->where('id_bayar', $id);
            $this->db->update('tb_byr' , $data);
            return $mssg = '1';
          }
        }
      }
    }

    public function delete($id) {
      return $this->db->delete('tb_byr' , array('id_bayar' => $id));
    }

    public function sum() {
      $this->db->select_sum('total_bayar');
      $this->session->userdata('jur') !='' ? $this->db->where('id_jurusan', $this->session->userdata('jur')) : $this->db->where('id_jurusan', '');
      $query = $this->db->get('api_byr');
      return $query->row_array();
    }

    public function auto_id_byr() {
      $q = $this->db->query("SELECT MAX(RIGHT(id_bayar,10)) AS idmax FROM tb_byr");
      $id = ""; //kode awal
      if($q->num_rows()>0){ //jika data ada
        foreach($q->result() as $k){
          $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
          $id = sprintf("%010s", $tmp); //kode ambil 4 karakter terakhir
        }
      } else{ //jika data kosong diset ke kode awal
        $id = "0000000001";
      }
      $init = "PAY"; //karakter depan kodenya
      //gabungkan string dengan kode yang telah dibuat tadi
      $r = $init.$id;
      return $r;
    }
  }
?>
