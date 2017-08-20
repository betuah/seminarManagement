<?php
  class Paper extends CI_Model
  {
      function __construct(){
        $this->load->database();
        //$this->load->library('upload');
        $this->gallery_path = realpath(APPPATH . '');
        $this->load->helper(array('form', 'url'));    
        $this->load->library('upload');
      }
    //Menampilkan data Paper
      public function get_paper() {

            $this->db->select('*');
            $this->db->from('v_paper');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_usr','asc');
            $query = $this->db->get();
            return $query->result_array();
        }

    public function auto_id_paper()
      {
        $q = $this->db->query("SELECT MAX(RIGHT(id_paper,4)) AS idmax FROM tb_paper");
        $id = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
          foreach($q->result() as $k)
          {
            $t = (date('Y'));
            $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
            $id = sprintf("P".$t."%04s",$tmp); //kode ambil 3 karakter terakhir
          }
        } 
        else
        { //jika data kosong diset ke kode awal
          $id = "P".$t."0001";
        }

        $r = $id;
        return $r;
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

      $this->form_validation->set_rules('idreg','ID','required');
      $this->form_validation->set_rules('idpaper','ID','required');
      $this->form_validation->set_rules('nmpaper','Judul','required');
      $this->form_validation->set_rules('tglup','Tanggal','required');

      if ($this->form_validation->run() == FALSE) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.location.href='".base_url()."User#U_content/view_user/paper';
              </SCRIPT>";
      } else {
        if ($_FILES['paper']['name']) {
            if ($this->upload->do_upload('paper')) {
              $data   = array(
                'id_paper'      => $this->input->post('idpaper'),
                'nama_paper'    => $this->input->post('nmpaper'),
                'paper'         => $file['file_name'],
                'id_reg'        => $this->input->post('idreg'),
                'status'        => "Terkirim",
                'tgl_upload'    => $this->input->post('tglup')
              );
              $this->db->insert('tb_paper' , $data);
              return $mssg = '1';
            } else {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Format atau size berkas salah')
                    window.location.href='".base_url()."User#U_content/view_user/paper';
                    </SCRIPT>";
            }
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Gagal mengupload berkas')
                window.location.href='".base_url()."User#U_content/view_user/paper';
                </SCRIPT>";
        }
      }
    }

  }
?>