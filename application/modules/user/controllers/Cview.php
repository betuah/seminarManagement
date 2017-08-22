<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Cview extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->model('profil');
      //Parent -> Load Model
      $this->load->model('dashboard');
      $this->load->model('Mview');
      $this->load->model('Paper');
      $this->load->model('tiket');
      $this->load->model('sert');
    }

    public function insert($content, $pages)
    {
      $msg = $this->$pages->insert();
        //redirect('User#U_content/'.$content.'/'.$pages);
      if($msg == '1')
      {
        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Berhasil Mendaftar')
                window.location.href='".base_url()."User#U_content/view_user/dashboard';
                </SCRIPT>";
      }
      else 
      {
        echo $msg;
      }
    }

    //Update Password
    public function update($content, $pages) {
      $upd = $this->$pages->update();
      //redirect('User#U_content/'.$content.'/'.$pages , $data);
      if ($upd == '1') {
        echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Update : Berhasil')
                window.location.href='".base_url()."User#U_content/view_user/profil';
                </SCRIPT>";
      } else {
        echo $upd;
      }
    }

    //Mencetak Tiket
    public function cetak($content,$pages,$id) {
      $data['id'] = $this->$pages->get_id($id);
      $this->load->view('content/'. $content .'/menu/cetak_'. $pages, $data);
    }

    //Menampilkan detail  event
    public function detail($content,$pages,$id) {
      $data['id']               = $this->$pages->get_id($id);
      $data['get_v_user']       = $this->profil->get_user();
      $data['auto_id_reg']      = $this->dashboard->auto_id_reg();
      //$data['get_comboreg']     = $this->mview->get_id_regis();

      $this->load->view('content/'.$content.'/menu/detail_'.$pages, $data);
    }

      public function logout() {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('level');
      session_destroy();
      redirect(base_url('/home'));
    } 
  }

 ?>
