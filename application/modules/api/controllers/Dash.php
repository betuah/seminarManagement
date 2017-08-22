<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class Dash extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Dashboard');
    }

      function index_get() {
        $id = $this->get('id');

        if ($id == '0') {
          $data = NULL;
        } else {
          $data['all'] 				= $this->Dashboard->count_all();
      		$data['peserta']		= $this->Dashboard->jml_reg($id,'1');
      		$data['pemakalah']	= $this->Dashboard->jml_reg($id,'2');
          $data['lunas']      = $this->Dashboard->stat_bayar($id,'1');
          $data['blunas']     = $this->Dashboard->stat_blunas($id,'1','0');
          $data['absen']      = $this->Dashboard->stat_blunas($id,'1','2');
          // echo $this->dashboard->stat_bayar('2017201002','1','1');
        }
        $this->response($data, 200);
      }
  }
