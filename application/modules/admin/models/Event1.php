<?php
  /**
   *
   */
  class Event extends CI_Model
  {

    function __construct(){
			$this->load->database();
		}

    public function get() {
      $query = $this->db->get('v_event');
      return $query->result_array();
    }

    public function count_all() {
      return $this->db->count_all('tb_event');
    }

    public function get_jen_evn() {
      $query = $this->db->get('tb_jen_event');
      return $query->result_array();
    }

    public function get_id($id) {
      $query = $this->db->get_where('v_event' , array('id_event' => $id));
      return $query->row_array();
    }

    public function insert() {
      $data2 = array(
              'id_lokasi' => $this->input->post('idloc', TRUE),
              'tgl_event' => $this->input->post('edate', TRUE)
      );
      $r2     = $this->db->get_where('v_lokasi', $data2);

      if ($r2->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Lokasi yang Anda masukan sudah digunakan pada tanggal tersebut')
              window.location.href='".base_url()."Admin#A_content/master/event';
              </SCRIPT>";
      } else {

        $idevn    = $this->input->post('id_evn');
        $idjur    = substr($this->input->post('id_jur'),-2);
        $periode  = $this->input->post('periode');

        $id_r     = $periode.$idjur.$idevn;

        $this->form_validation->set_rules('tema','tema','required');
        $this->form_validation->set_rules('edate','Tgl Event','required');
        $this->form_validation->set_rules('rdate','Tgl Reg','required');
        $this->form_validation->set_rules('id_jur','Jurusan','required');
        $this->form_validation->set_rules('jen_evn','Jenis','required');
        $this->form_validation->set_rules('hrg','Harga','required');
        $this->form_validation->set_rules('quota','Quota','required');
        $this->form_validation->set_rules('batas_byr','Batas Pembayaran','required');
        $this->form_validation->set_rules('periode','periode','required');
        $this->form_validation->set_rules('idloc','alamat','required');
        $this->form_validation->set_rules('nama[]','Nama','required');
        $this->form_validation->set_rules('tlpn[]','No Telepon','required');
        $this->form_validation->set_rules('email[]','Email','required');
        $this->form_validation->set_rules('institusi[]','Organisasi','required');

        if ($this->form_validation->run() == FALSE) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pastikan Semua data telah terisi ')
                window.location.href='".base_url()."Admin#A_content/master/event';
                </SCRIPT>";
        } else {
          $today = date ("Y-m-d");
          $edate = $this->input->post('edate');
          $rdate = $this->input->post('rdate');

          if ($edate > $today && $rdate > $today) {
            if ($rdate > $edate) {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Tanggal Akhir registrasi harus sebelum tanggal Event')
                      window.location.href='".base_url()."Admin#A_content/master/event';
                      </SCRIPT>";
            } else {
              if($_FILES['pembicara']['name']){
                  $filesCount = count($_FILES['pembicara']['name']);

                  for($i = 0; $i < $filesCount; $i++){
                      $_FILES['speaker']['name'] = $_FILES['pembicara']['name'][$i];
                      $_FILES['speaker']['type'] = $_FILES['pembicara']['type'][$i];
                      $_FILES['speaker']['tmp_name'] = $_FILES['pembicara']['tmp_name'][$i];
                      $_FILES['speaker']['error'] = $_FILES['pembicara']['error'][$i];
                      $_FILES['speaker']['size'] = $_FILES['pembicara']['size'][$i];

                      $sconfig = array(
                        'file_name'     => 'speakers_'.time().$i.'.jpg',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size'      => 10000,
                        'overwrite'     => TRUE,
                        'upload_path'		=> 'assets/file_upload/file_event/pembicara'
                      );

                      $this->load->library('upload', $sconfig);
                      $this->upload->initialize($sconfig);

                      if($this->upload->do_upload('speaker')){
                        $sfile     = $this->upload->data();
                        $sdata   = array(
                          'id_event'        => $id_r,
                          'nama_speaker'    => $this->input->post('nama'),
                          'institusi'       => $this->input->post('institusi'),
                          'email'           => $this->input->post('email'),
                          'tlpn'            => $this->input->post('tlpn'),
                          'foto_speaker'    => $sfile['file_name']
                        );
                        $this->db->insert('tb_speaker' , $sdata);

                        return $mssg = '1';
                      } else {
                        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                              window.alert('".$this->upload->display_errors()."')
                              window.location.href='".base_url()."Admin#A_content/master/event';
                              </SCRIPT>";
                      }
                  }

                  if ($_FILES['bg_event']['name']) {
                    $config = array(
                      'file_name'     => 'bg_event_'.time().'.jpg',
                      'allowed_types' => 'jpg|jpeg|png',
                      'max_size'      => 100000,
                      'upload_path'		=> 'assets/file_upload/file_event/background'
                    );

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                      if ($this->upload->do_upload('bg_event')) {
                        $file     = $this->upload->data();
                        $data   = array(
                          'id_event'        => $id_r,
                          'judul_event'     => $this->input->post('tema'),
                          'tgl_event'       => $this->input->post('edate'),
                          'tgl_akhir_reg'   => $this->input->post('rdate'),
                          'id_jurusan'      => $this->input->post('id_jur'),
                          'id_jen_event'    => $this->input->post('jen_evn'),
                          'harga'           => $this->input->post('hrg'),
                          'quota'           => $this->input->post('quota'),
                          'batas_bayar'     => $this->input->post('batas_byr'),
                          'id_periode'      => $this->input->post('periode'),
                          'id_lokasi'       => $this->input->post('idloc'),
                          'foto'            => $file['file_name'],
                          'status'          => "0"
                        );
                        $this->db->insert('tb_event' , $data);
                        // print_r($sdata);
                        // echo "<br>";
                        // print_r($data);
                        return $mssg = '1';
                      } else {
                        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                              window.alert('".$this->upload->display_errors()."')
                              window.location.href='".base_url()."Admin#A_content/master/event';
                              </SCRIPT>";
                      }
                  } else {
                    return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Tidak Ada Data foto event yang di upload')
                          window.location.href='".base_url()."Admin#A_content/master/event';
                          </SCRIPT>";
                  }
              } else {
                return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Pastikan Anda telah mengisi data pembicara berseta fotonya')
                      window.location.href='".base_url()."Admin#A_content/master/event';
                      </SCRIPT>";
              }
            }
          } else {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Tanggal Event dan Registrasi Salah')
                    window.location.href='".base_url()."Admin#A_content/master/event';
                    </SCRIPT>";
          }
        }
      }
    }

    public function update($id) {
      $data2 = array(
              'id_lokasi' => $this->input->post('idloc', TRUE),
              'tgl_event' => $this->input->post('edate', TRUE)
      );
      $r2     = $this->db->get_where('v_lokasi', $data2);

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Lokasi yang Anda masukan sudah digunakan pada tanggal tersebut')
              window.location.href='".base_url()."Admin#A_content/master/event';
              </SCRIPT>";
      } else {
        $this->load->library('upload');
        $nmfile                         = "bg_event_".time().".jpg";
        $config['upload_path']          = 'assets/file_upload/file_event/background';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 10000; // Satuan Kbps
        $config['file_name']            = $nmfile;

        $this->upload->initialize($config);
        $file     = $this->upload->data();

        $this->form_validation->set_rules('tema','tema','required');
        $this->form_validation->set_rules('edate','Tgl Event','required');
        $this->form_validation->set_rules('rdate','Tgl Reg','required');
        $this->form_validation->set_rules('id_jur','Jurusan','required');
        $this->form_validation->set_rules('jen_evn','Jenis','required');
        $this->form_validation->set_rules('hrg','Harga','required');
        $this->form_validation->set_rules('quota','Quota','required');
        $this->form_validation->set_rules('periode','periode','required');
        $this->form_validation->set_rules('idloc','alamat','required');

        if ($this->form_validation->run() == FALSE) {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Pastikan Semua data telah terisi ')
                window.location.href='".base_url()."Admin#A_content/master/event';
                </SCRIPT>";
        } else {
          $today = date ("Y-m-d");
          $edate = $this->input->post('edate');
          $rdate = $this->input->post('rdate');

          if ($edate > $today && $rdate > $today) {
            if ($rdate > $edate) {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Tanggal Akhir registrasi harus sebelum tanggal Event')
                      window.location.href='".base_url()."Admin#A_content/master/event';
                      </SCRIPT>";
            } else {
              if ($_FILES['bg_event']['name']) {
                //$format = substr($_FILES['bg_event']['name'],-3);
                  if ($this->upload->do_upload('bg_event')) {
                    $data   = array(
                      'id_event'        => $id,
                      'judul_event'     => $this->input->post('tema'),
                      'tgl_event'       => $this->input->post('edate'),
                      'tgl_akhir_reg'   => $this->input->post('rdate'),
                      'id_jurusan'      => $this->input->post('id_jur'),
                      'id_jen_event'    => $this->input->post('jen_evn'),
                      'harga'           => $this->input->post('hrg'),
                      'quota'           => $this->input->post('quota'),
                      'id_periode'      => $this->input->post('periode'),
                      'id_lokasi'       => $this->input->post('idloc'),
                      'batas_bayar'     => $this->input->post('batas_byr'),
                      'foto'            => $file['file_name']
                      //'status'          => "0"
                    );

                    $pic        = $this->input->post('old_foto');
                    $path       = "assets/file_upload/file_event/background/";
                    unlink($path.$pic);

                    $this->db->where('id_event', $id);
                    $this->db->update('tb_event' , $data);
                    return $mssg = '1';
                  } else {
                    return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Format atau Ukuran File yang anda masukan Salah')
                          window.location.href='".base_url()."Admin#A_content/master/event';
                          </SCRIPT>";
                  }
              } else {
                $data   = array(
                  'id_event'        => $id,
                  'judul_event'     => $this->input->post('tema'),
                  'tgl_event'       => $this->input->post('edate'),
                  'tgl_akhir_reg'   => $this->input->post('rdate'),
                  'id_jurusan'      => $this->input->post('id_jur'),
                  'id_jen_event'    => $this->input->post('jen_evn'),
                  'harga'           => $this->input->post('hrg'),
                  'quota'           => $this->input->post('quota'),
                  'id_periode'      => $this->input->post('periode'),
                  'batas_bayar'     => $this->input->post('batas_byr'),
                  'id_lokasi'       => $this->input->post('idloc')
                  //'status'        => $this->input->post('stat')
                );

                $this->db->where('id_event', $id);
                $this->db->update('tb_event' , $data);
                return $mssg = '1';
              }
            }
          } else {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Tanggal Event dan Registrasi Salah')
                    window.location.href='".base_url()."Admin#A_content/master/event';
                    </SCRIPT>";
          }
        }
      }
    }

    public function delete($id) {
      $data = array(
              'id_event' => $id
      );
      $r     = $this->db->get_where('tb_reg', $data);

      if ($r->num_rows() == 1) {
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Maaf Event ini tidak dapat dihapus dikarenakan Sudah Ada yang mendaftar, mohon hapus semua data pendaftaran mengenai event ini terlebih dahulu.')
              window.location.href='".base_url()."Admin#A_content/master/event';
              </SCRIPT>";
      } else {
        $query      = $this->db->get_where('tb_event' , array('id_event' => $id));
        $data       = $query->row_array();
        $pic        = $data['foto'];
        $path       = "assets/file_upload/file_event/background/";
        unlink($path.$pic);
        return $this->db->delete('tb_event' , array('id_event' => $id));
      }
    }

    public function auto_id_evn() {
      $q = $this->db->query("SELECT MAX(RIGHT(id_event,3)) AS idmax FROM tb_event");
      $id = ""; //kode awal
      if($q->num_rows()>0){ //jika data ada
        foreach($q->result() as $k){
          $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
          $id = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
        }
      } else{ //jika data kosong diset ke kode awal
        $id = "001";
      }

      $r = $id;
      return $r;
    }
  }
?>
