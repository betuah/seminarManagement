<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class Users extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

      function index_get() {
          $id = $this->get('id');
          if ($id == '') {
              $kontak = $this->db->get('api_usr')->result();
          } else {
              $this->db->where('id_usr', $id);
              $kontak = $this->db->get('api_usr')->result();
          }

          $this->response($kontak, 200);
      }
  }
