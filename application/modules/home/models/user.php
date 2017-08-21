<?php
  class User extends CI_Model{
    function __construct(){
			$this->load->database();
    }


    public function GetEvent(){
        $data = $this->db->query("select tb_jurusan.nama_jur,tb_jurusan.id_jurusan,
            tb_event.judul_event,tb_event.tgl_event, tb_event.harga,tb_event.quota,
            tb_event.id_lokasi, tb_event.id_event,tb_event.foto from tb_jurusan
            inner join tb_event on(tb_event.id_jurusan = tb_jurusan.id_jurusan) where tb_event.id_event");
        return $data->result_array();
    }

    public function GetDetailEvent($id_event=""){
        $data = $this->db->query(" select distinct id_event,harga,quota, nama_jur,judul_event,tgl_event,id_lokasi,ket,lokasi,nama_ruangan,ket,foto from v_event_detail ".$id_event);
        return $data->result_array();
    }
    public function GetSpeaker($id_event=""){
        $data = $this->db->query(" select distinct nama_speaker,foto_speaker,institusi from v_event_detail ".$id_event);
        return $data->result_array();
    }
     public function GetPanitia1($id_event=""){
        $data = $this->db->query(" select distinct nama,tipe_panitia,nama_jur,tlpn from v_event_detail ".$id_event);
        return $data->result_array();
    }

    public function cekSertifikat($no_sertifikat)
    {
        $this->db->where('no_sertifikat', $no_sertifikat)
            ->from('v_sertifikat');

        return $this->db->get()->row_array();
    }

    /*public function cari_sertifikat($no_sertifikat){
        $this->db->like('no_sertifikat',$no_sertifikat);
        $query = $this->db->get('v_sertifikat');
        return $query->result();

    }*/

    function tambah_user() {
        if ($id_usr       = $this->input->post('nim')) {
          $data = array(
      						'id_usr' => $this->input->post('nim', TRUE)
      		);
          $r      = $this->db->get_where('tb_usr', $data);

          if ($r->num_rows() == 1) {
            echo $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Username atau NIM yang Anda masukan sudah terdaftar silahkan masukan kembali Username atau NIM yang berbeda')
                  window.location.href='".base_url()."';
                  </SCRIPT>";
          } else {
            echo "string";
            // $id_usr       = $this->input->post('nim');
            // $nama_usr     = $this->input->post('nama_usr');
            // $password     = $this->input->post('password');
            // $email        = $this->input->post('email');
            // $jekel        = $this->input->post('jekel');
            // $no_tlpn      = $this->input->post('no_tlpn');
            // $alamat       = $this->input->post('alamat');
            // $tgl_daftar   = $this->input->post('tgl_daftar');
            // $id_type_usr  = $this->input->post('id_type_usr');
            // $ket          = $this->input->post('ket');
            // $id_type_usr ='3';
            // $ket ='mahasiswa';
            //
            // $data = array (
            // 'id_usr'        => $id_usr,
            // 'nama_usr'      => $nama_usr,
            // 'password'      => md5($password),
            // 'email'         => $email,
            // 'jekel'         => $jekel,
            // 'no_tlpn'       => $no_tlpn,
            // 'alamat_usr'    => $alamat,
            // 'tgl_daftar'    => date("Y-m-d"),
            // 'id_type_usr'   => $id_type_usr,
            // 'ket'           => $ket
            // );
            // $this->db->insert('tb_usr',$data);
          }
    }

    elseif ($id_usr       = $this->input->post('nidn')) {
      $data = array(
              'id_usr' => $this->input->post('nidn', TRUE)
      );
      $r      = $this->db->get_where('tb_usr', $data);

      if ($r->num_rows() == 1) {
        echo $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Username atau NIM yang Anda masukan sudah terdaftar silahkan masukan kembali Username atau NIM yang berbeda')
              window.location.href='".base_url()."';
              </SCRIPT>";
      } else {
            $id_usr       = $this->input->post('nidn');
            $nama_usr     = $this->input->post('nama_usr');
            $password     = $this->input->post('password');
            $email        = $this->input->post('email');
            $jekel        = $this->input->post('jekel');
            $no_tlpn      = $this->input->post('no_tlpn');
            $alamat       = $this->input->post('alamat');
            $tgl_daftar   = $this->input->post('tgl_daftar');
            $id_type_usr  = $this->input->post('id_type_usr');
            $ket          = $this->input->post('ket');
            $id_type_usr ='3';
            $ket ='dosen';

            $data = array (
            'id_usr'        => $id_usr,
            'nama_usr'      => $nama_usr,
            'password'      => md5($password),
            'email'         => $email,
            'jekel'         => $jekel,
            'no_tlpn'       => $no_tlpn,
            'alamat'        => $alamat,
            'tgl_daftar'    => date("Y-m-d"),
            'id_type_usr'   => $id_type_usr,
            'ket'           => $ket
        );
        $this->db->insert('tb_usr',$data);
      }
    }

    elseif ($id_usr       = $this->input->post('email')) {
      $data = array(
              'id_usr' => $this->input->post('email', TRUE)
      );
      $r      = $this->db->get_where('tb_usr', $data);

      if ($r->num_rows() == 1) {
        echo $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Username atau NIM yang Anda masukan sudah terdaftar silahkan masukan kembali Username atau NIM yang berbeda')
              window.location.href='".base_url()."';
              </SCRIPT>";
      } else {
            $id_usr       = $this->input->post('email');
            $nama_usr     = $this->input->post('nama_usr');
            $email        = $this->input->post('email');
            $password     = $this->input->post('password');
            $jekel        = $this->input->post('jekel');
            $no_tlpn      = $this->input->post('no_tlpn');
            $alamat       = $this->input->post('alamat');
            $tgl_daftar   = $this->input->post('tgl_daftar');
            $id_type_usr  = $this->input->post('id_type_usr');
            $ket          = $this->input->post('ket');
            $id_type_usr ='3';
            $ket ='external';

            $data = array (
            'id_usr'        => $id_usr,
            'nama_usr'      => $nama_usr,
            'password'      => md5($password),
            'email'         => $email,
            'jekel'         => $jekel,
            'no_tlpn'       => $no_tlpn,
            'alamat_usr'        => $alamat,
            'tgl_daftar'    => date("Y-m-d"),
            'id_type_usr'   => $id_type_usr,
            'ket'           => $ket
        );
        $this->db->insert('tb_usr',$data);
      }
    }
}
}
?>
