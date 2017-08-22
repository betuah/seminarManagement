<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class Reg extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

      function index_get() {
          $id = $this->get('id');
          if ($id == '') {
              $data = $this->db->get('api_reg')->result();
          } else {
              $this->db->where('id_reg', $id);
              $data = $this->db->get('api_reg')->result();
          }

          $this->response($data, 200);
      }


  }
