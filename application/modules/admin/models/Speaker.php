<?php
  /**
   *
   */
  class Speaker extends CI_Model
  {

    function __construct(){
      parent::__construct();
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_speaker');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('tb_speaker' , array('id_speaker' => $id));
      return $query->row_array();
    }

    public function insert() {
      $d = array(
  			'id_event' => $this->input->post('idevn', TRUE)
  		);
      $r      = $this->db->get_where('tb_event', $d);

      if ($r->num_rows() == 1) {
        $this->load->library('upload');
        $nmfile                         = "speakers_".time().".jpg";
        $config['upload_path']          = 'assets/file_upload/file_event/pembicara';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 10000; // Satuan Kbps
        $config['file_name']            = $nmfile;

        $this->upload->initialize($config);
        $file     = $this->upload->data();

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('tlpn','No Telepon','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('institusi','Organisasi','required');
        // $this->form_validation->set_rules('pembicara','Foto','required');
        $this->form_validation->set_rules('idevn','ID','required');

        if ($this->form_validation->run() == FALSE) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pastikan Semua data telah terisi ')
                window.location.href='".base_url()."Admin#A_content/master/speaker';
                </SCRIPT>";
        } else {
          if ($_FILES['pembicara']['name']) {
              if ($this->upload->do_upload('pembicara')) {
                $data   = array(
                  'id_event'        => $this->input->post('idevn'),
                  'nama_speaker'    => $this->input->post('nama'),
                  'institusi'       => $this->input->post('institusi'),
                  'email'           => $this->input->post('email'),
                  'tlpn'            => $this->input->post('tlpn'),
                  'foto_speaker'    => $file['file_name']
                );
                $this->db->insert('tb_speaker' , $data);
                return $mssg = '1';
              } else {
                return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Format atau Ukuran File yang anda masukan Salah')
                      window.location.href='".base_url()."Admin#A_content/master/speaker';
                      </SCRIPT>";
              }
          } else {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Tidak Ada Data yang di upload')
                  window.location.href='".base_url()."Admin#A_content/master/speaker';
                  </SCRIPT>";
          }
        }
      } else {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('ID Event yang Anda masukan tidak tersedia')
              window.location.href='".base_url()."Admin#A_content/master/speaker';
              </SCRIPT>";
      }
    }

    public function update($id) {

      $this->load->library('upload');
      $nmfile                         = "speakers_".time().".jpg";
      $config['upload_path']          = 'assets/file_upload/file_event/pembicara';
      $config['allowed_types']        = 'jpg|png';
      $config['max_size']             = 10000; // Satuan Kbps
      $config['file_name']            = $nmfile;

      $this->upload->initialize($config);
      $file     = $this->upload->data();

      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('tlpn','No Telepon','required');
      $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('institusi','Organisasi','required');
      $this->form_validation->set_rules('idevn','ID','required');

      if ($this->form_validation->run() == FALSE) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Pastikan Semua data telah terisi ')
              window.location.href='".base_url()."Admin#A_content/master/speaker';
              </SCRIPT>";
      } else {
        if ($_FILES['pembicara']['name']) {
            if ($this->upload->do_upload('pembicara')) {
              $data   = array(
                'id_event'        => $this->input->post('idevn'),
                'nama_speaker'    => $this->input->post('nama'),
                'institusi'       => $this->input->post('institusi'),
                'email'           => $this->input->post('email'),
                'tlpn'            => $this->input->post('tlpn'),
                'foto_speaker'    => $file['file_name']
              );

              $pic        = $this->input->post('old_foto');
              $path       = "assets/file_upload/file_event/pembicara/";
              unlink($path.$pic);

              $this->db->where('id_speaker', $id);
              $this->db->update('tb_speaker' , $data);
              return $mssg = '1';
            } else {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Format atau Ukuran File yang anda masukan Salah')
                    window.location.href='".base_url()."Admin#A_content/master/speaker';
                    </SCRIPT>";
            }
        } else {
          $data   = array(
            'id_event'        => $this->input->post('idevn'),
            'nama_speaker'    => $this->input->post('nama'),
            'institusi'       => $this->input->post('institusi'),
            'email'           => $this->input->post('email'),
            'tlpn'            => $this->input->post('tlpn')
          );

          $this->db->where('id_speaker', $id);
          $this->db->update('tb_speaker' , $data);
          return $mssg = '1';
        }
      }
    }

    public function delete($id) {
      $query      = $this->db->get_where('tb_speaker' , array('id_speaker' => $id));
      $data       = $query->row_array();
      $pic        = $data['foto_speaker'];
      $path       = "assets/file_upload/file_event/pembicara/";
      unlink($path.$pic);
      return $this->db->delete('tb_speaker' , array('id_speaker' => $id));
    }
  }
?>
