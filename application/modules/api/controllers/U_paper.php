<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class U_paper extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

      function index_get() {
          $id = $this->get('id');
          if ($id == '') {
              $kontak = $this->db->get('v_paper')->result();
          } else {
              $this->db->where('id_event', $id);
              $kontak = $this->db->get('v_paper')->result();
          }
          $this->response($kontak, 200);
      }
  }
