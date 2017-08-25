<?php
  class Dashboard extends CI_Model
  {
      function __construct(){
        $this->load->database();
    }

    //Menampilkan table event
      public function get_event() {
        return $query = $this->db->get('v_event')->result_array();
    }

    //Registrasi
    public function get() {
      return $query = $this->db->get_where('tb_event')->result_array();
    }

    public function get_cpaper()
        {
            $this->db->select('*');
            $this->db->from('v_jen_reg');
            $this->db->having('id_usr',$this->session->userdata('uid'));
            $this->db->order_by('id_reg','asc');
            $this->db->where('id_jen_reg','2');
            $query = $this->db->get();
            return $query->result_array();
        }

    public function get_peserta() {
            $this->db->select('*');
            $this->db->from('v_e-ticket');
            //$this->db->where('status','1');
            $this->db->order_by('id_event',$this->input->post("idevent"));
            $query = $this->db->get();
            return $query->result_array();
    }

    //Generate PDF Tiket
    public function get_pdf($id) {
      $query = $this->db->get_where('v_e-ticket' , array('id_reg' => $id));
      return $query->row_array();
    }

    //Detail Event
    public function get_detail_event() {
        return $query = $this->db->get_where('v_detail_event')->result_array();
    }

    //menampilkan E-tiket && Detail Tema dashboard
      public function get_id($id) {
        $query = $this->db->get_where('v_event',array('id_event' => $id));
        return $query->row_array();
    }

    public function daftar() {
      $data = array(
              'id_usr'      => $this->input->post('idusr', TRUE),
              'id_event'    => $this->input->post('idevnt', TRUE),
              'id_jen_reg'  => $this->input->post('jenreg', TRUE)
      );
      $r1     = $this->db->get_where('tb_reg', $data);

      if ($r1->num_rows() == 1) {
        $idevn = $this->input->post('idevnt');
        $jen   = $this->input->post('jenreg');
        return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
              window.alert('ID user yang Anda masukan telah terdaftar pada event ".$idevn." sebagai ".$jen."')
              window.location.href='".base_url()."Admin#A_content/transaksi/reg';
              </SCRIPT>";
      } else {
        // Cek User
        $data2 = array(
                'id_usr' => $this->input->post('idusr', TRUE)
        );
        $r2     = $this->db->get_where('tb_usr', $data2);

        // Cek Event
        $data3 = array(
                'id_event' => $this->input->post('idevnt', TRUE)
        );
        $r3     = $this->db->get_where('tb_event', $data3);

        if ($r2->num_rows() == 1 && $r3->num_rows() == 1) {
          // Cek Quota
          $ide      = $this->input->post('idevnt');

          $this->db->like('id_event', $ide);
          $this->db->like('stat_byr', '1');
          $this->db->from('v_bayar');
          $reg_count = $this->db->count_all_results();

          foreach ($r3->result_array() as $eqty) {
            $qty      = $eqty['quota'];
            $bts_byr  = $eqty['batas_bayar'];
            $jdl      = $eqty['judul_event'];
            $deadline = $eqty['tgl_akhir_reg'];
          }
          $rqty       = $qty - $reg_count;
          $cdate      = date ("Y-m-d");
          $pay_date   = date('Y-m-d', strtotime('+'.$bts_byr.' days', strtotime($cdate)));

          if ($cdate > $deadline) {
            return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Maaf tanggal terakhir registrasi pada '".$deadline.")
                  window.location.href='".base_url()."Admin#A_content/transaksi/reg';
                  </SCRIPT>";
          } else {

            if ($rqty == '0') {
              return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Maaf Quota Peserta untuk event ".$jdl." sudah habis')
                    window.location.href='".base_url()."Admin#A_content/transaksi/reg';
                    </SCRIPT>";
            } else {
              // Library
              $this->load->library('ciqrcode');
        			$this->load->helper('url');

              $idevn 	= $this->input->post('idevnt');
        			$noreg 	= '';
        			$this->db->select_max('id_reg');
        			$this->db->where('id_event', $idevn);
        			$result = $this->db->get('tb_reg');

        			if ($result->num_rows() > 0) {
        				$res 	= $result->result_array();
          			$tmp 	= $res[0]['id_reg'];
        				$rtmp = $tmp + 1;

        				if ($tmp == '') {
        					$noreg = '0001';
        				} else {
        					$noreg = substr($rtmp, -4);
        				}
        	    }
        			$idreg = $idevn.$noreg;

              $this->load->library('zend');
              $this->zend->load('Zend/Barcode');
              $file = Zend_Barcode::draw('code128', 'image', array('text' => $idreg), array());
              $qrnm = "barcode_".time().$idreg.".jpg";
              $store_image = imagepng($file,"assets/file_upload/qr_code/eticket/{$qrnm}");

              $this->form_validation->set_rules('idusr','UID','required');
              $this->form_validation->set_rules('jenreg','Jen Reg','required');
              $this->form_validation->set_rules('rdate','Tanggal','required');

              if ($this->form_validation->run() == FALSE) {
                return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Pastikan Semua data telah terisi ')
                      window.location.href='".base_url()."Admin#A_content/transaksi/reg';
                      </SCRIPT>";
              } else {
                $data = array(
                  'id_reg'      => $idreg,
                  'id_usr'      => $this->input->post('idusr'),
                  'tgl_reg'     => $this->input->post('rdate'),
                  'id_event'    => $this->input->post('idevnt'),
                  'id_jen_reg'  => $this->input->post('jenreg'),
                  'qr_code'     => $qrnm,
                  'pay_date'    => $pay_date,
                  'status'      => "0"
                );

                $this->db->insert('tb_reg' , $data);
                if ($this->session->userdata('level')=='1' || $this->session->userdata('level')=='4') {
                  return $mssg = '1';
                } else {
                  $jen_r = '';
                  if($this->input->post('jenreg')=='1') {
                    $jen_r = 'Peserta';
                  } else {
                    $jen_r = 'Pemakalah';
                  }
                  return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Anda berhasil mendaftar sebagai ".$jen_r." pada event ini. Note : Segera Lakukan pembayaran untuk mendapatkan e-ticket sebelum quota habis')
                        window.location.href='".base_url()."User#U_content/view_user/dashboard';
                        </SCRIPT>";
                }
              }
            }
          }
        } else {
          return $mssg = "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('ID user atau ID Event yang Anda masukan salah atau tidak valid')
                window.location.href='".base_url()."Admin#A_content/transaksi/reg';
                </SCRIPT>";
        }
      }
    }

    //Auto Id Reg
    public function auto_id_reg()
      {
        $q = $this->db->query("SELECT MAX(RIGHT(id_reg,5)) AS idmax FROM tb_reg");
        $id = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
          foreach($q->result() as $k)
          {
            $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
            $id = sprintf("%04s", $tmp); //kode ambil 4 karakter terakhir
          }
        }
        else
        { //jika data kosong diset ke kode awal
          $id = "0001";
        }

        $r = $tmp;
        return $r;
      }

    public function insert() {

    }
  }
 ?>
