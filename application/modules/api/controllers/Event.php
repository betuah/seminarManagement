<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class Event extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

      function index_get() {
          $id = $this->get('id');
          if ($id == '') {
              $data = $this->db->get('v_event')->result();
          } else {
              $this->db->where('id_event', $id);
              $data = $this->db->get('v_event')->result();
          }

          $this->response($data, 200);
      }
  }
