<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . 'libraries/REST_Controller.php';

  class D_Event extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

      function index_get() {
          $id = $this->get('id');
          if ($id == '') {
              $kontak = $this->db->get('v_detail_event')->result();
          } else {
              $this->db->where('id_event', $id);
              $kontak = $this->db->get('v_detail_event')->result();
          }

          $this->response($kontak, 200);
      }

      function index_put()
      {
          // create a new event and respond with a status/errors
          $id = $this->put('id');
          $data = array(
                      'id'       => $this->put('id'),
                      'nama'     => $this->put('nama'),
                      'nomor'    => $this->put('nomor'));
          $this->db->where('id', $id);
          $update = $this->db->update('telepon', $data);
          if ($update) {
              $this->response($data, 200);
          } else {
              $this->response(array('status' => 'fail', 502));
          }
      }

      function index_post()
      {
          // update an existing event and respond with a status/errors
          $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
          $insert = $this->db->insert('telepon', $data);
          if ($insert) {
              $this->response($data, 200);
          } else {
              $this->response(array('status' => 'fail', 502));
          }
      }

      function index_delete()
      {
          // delete a event and respond with a status/errors
          $id = $this->delete('id');
          $this->db->where('id', $id);
          $delete = $this->db->delete('telepon');
          if ($delete) {
              $this->response(array('status' => 'success'), 201);
          } else {
              $this->response(array('status' => 'fail', 502));
          }
      }
  }
