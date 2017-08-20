<?php
  /**
   *
   */
  class Paper extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
      $this->load->helper(array('form', 'url'));
		}

    public function get() {
      $query = $this->db->get('tb_paper');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_paper' , array('id_paper' => $id));
      return $query->row_array();
    }

    public function insert() {
      $this->load->library('upload');
      $nmfile                         = "paper_".time().".pdf";
      $config['upload_path']          = 'assets/file_upload/file_paper';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 10000; // Satuan Kbps
      $config['file_name']            = $nmfile;

      $this->upload->initialize($config);
      $file   = $this->upload->data();

      $this->form_validation->set_rules('id_paper','ID','required');
      $this->form_validation->set_rules('jdl_mklh','Judul','required');
      // $this->form_validation->set_rules('id_reg','NO Reg','required');
      $this->form_validation->set_rules('pdate','Tanggal','required');

      if ($this->form_validation->run() == FALSE) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.location.href='".base_url()."Admin#A_content/master/paper';
              </SCRIPT>";
      } else {
        if ($_FILES['paper']['name']) {
            if ($this->upload->do_upload('paper')) {
              $data   = array(
                'id_paper'      => $this->input->post('id_paper'),
                'nama_paper'    => $this->input->post('jdl_mklh'),
                'paper'         => $file['file_name'],
                // 'id_reg'        => $this->input->post('id_reg'),
                'status'        => "Waiting",
                'tgl_upload'    => $this->input->post('pdate')
              );
              $this->db->insert('tb_paper' , $data);
              return $mssg = '1';
            } else {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Format atau size Salah')
                    window.location.href='".base_url()."Admin#A_content/master/paper';
                    </SCRIPT>";
            }
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Tidak Ada Data yang di upload')
                window.location.href='".base_url()."Admin#A_content/master/paper';
                </SCRIPT>";
        }
      }
    }

    public function update($id) {
      $this->load->library('upload');
      $nmfile                         = "paper_".time().".pdf";
      $config['upload_path']          = 'assets/file_upload/file_paper';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 200; // Satuan Kbps
      $config['file_name']            = $nmfile;

      $this->upload->initialize($config);
      $file   = $this->upload->data();

      $this->form_validation->set_rules('id_paper','ID','required');
      $this->form_validation->set_rules('jdl_mklh','Judul','required');
      $this->form_validation->set_rules('id_reg','NO Reg','required');
      $this->form_validation->set_rules('pdate','Tanggal','required');

      if ($this->form_validation->run() == FALSE) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.location.href='".base_url()."Admin#A_content/master/paper';
              </SCRIPT>";
      } else {
        if ($_FILES['paper']['name']) {
            if ($this->upload->do_upload('paper')) {
              $data   = array(
                'id_paper'      => $this->input->post('id_paper'),
                'nama_paper'    => $this->input->post('jdl_mklh'),
                'paper'         => $file['file_name'],
                'id_reg'        => $this->input->post('id_reg'),
                'status'        => $this->input->post('status'),
                'tgl_upload'    => $this->input->post('pdate')
              );

              $pic        = $this->input->post('old_foto');
              $path       = "assets/file_upload/file_paper/";
              unlink($path.$pic);

              $this->db->where('id_paper', $id);
              $this->db->update('tb_paper' , $data);

              return $mssg = '1';
            } else {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Format atau size Salah')
                    window.location.href='".base_url()."Admin#A_content/master/paper';
                    </SCRIPT>";
            }
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Tidak Ada Data yang di upload')
                window.location.href='".base_url()."Admin#A_content/master/paper';
                </SCRIPT>";
        }
      }
    }

    public function delete($id) {
      $query      = $this->db->get_where('tb_paper' , array('id_paper' => $id));
      $data       = $query->row_array();
      $paper      = $data['paper'];
      $path       = "assets/file_upload/file_paper/";
      unlink($path.$paper);
      return $this->db->delete('tb_paper' , array('id_paper' => $id));
    }

    public function auto_id_paper() {
      $q = $this->db->query("SELECT MAX(RIGHT(id_paper,3)) AS idmax FROM tb_paper");
      $id = ""; //kode awal
      if($q->num_rows()>0){ //jika data ada
        foreach($q->result() as $k){
          $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
          $id = sprintf("%06s", $tmp); //kode ambil 4 karakter terakhir
        }
      } else{ //jika data kosong diset ke kode awal
        $id = "000001";
      }
      $init = "MKH"; //karakter depan kodenya
      //gabungkan string dengan kode yang telah dibuat tadi
      $r = $init.$id;
      return $r;
    }
  }
?>
