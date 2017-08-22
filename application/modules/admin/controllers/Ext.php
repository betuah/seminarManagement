<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Ext extends CI_Controller {

		public function __construct(){
			parent::__construct();

      //Load models
			$this->load->model('reg');
			$this->load->model('sertifikat');
		}

		public function generate_qr_code($req , $id) {
			if ($req === "eticket") {
				$pages = "reg";
			} else {
				$pages = "sertifikat";
			}

			$this->$pages->update_stat($id);
			redirect('Admin#A_content/transaksi/reg'.$pages);
		}

		public function generate_pdf($req , $id) {
			$this->load->library('pdfgenerator');
			$this->load->helper('url');

			if ($req === "eticket") {
				//Cek Status
				$q    	= $this->db->get_where('tb_reg' , array('id_reg' => $id));
				$data   = $q->row_array();
				$stat   = $data['status'];
				if ($stat == "0") {
					echo "<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Anda belum dapat melakukan pengunduhan E-Ticket, Segera Lakukan Pembayaran terlebih dahulu untuk dapat mengunduh E-Ticket Anda.')
                window.location.href='".base_url()."Admin#A_content/transaksi/reg';
                </SCRIPT>";
				} else {
					echo $pages = "reg";
				}
			} else {
				echo $pages = "sertifikat";
			}

			$data['data'] 	= $this->$pages->get_pdf($id);
			// $this->load->view($req, $data);

			$html 					= $this->load->view($req, $data, TRUE);
			// $data['id'] 	= $this->$pages->get_pdf($id);
			// $html 				= $this->load->view($req, $data);
			//
	    $this->pdfgenerator->generate($html, 'e-ticket_'.$id);
		}
	}
?>
