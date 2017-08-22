<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class Api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function get_user() {
      $id = $this->get('id');
      if ($id == '') {
          $data = $this->db->get('api_usr')->result();
      } else {
          $this->db->where('id_usr', $id);
          $data = $this->db->get('api_usr')->result();
      }
      $this->response($data, 200);
    }

    function get_event() {
      $id = $this->get('id');
      if ($id == '') {
          $data = $this->db->get('api_event')->result();
      } else {
          $this->db->where('id_event', $id);
          $data = $this->db->get('api_event')->result();
      }
      $this->response($data, 200);
    }
}
