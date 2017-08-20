<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Crud extends CI_Controller {

		public function __construct(){
			parent::__construct();

      //Load models
			$this->load->model('jurusan');
			$this->load->model('event');
			$this->load->model('paper');
			$this->load->model('absen');
			$this->load->model('bayar');
			$this->load->model('cek_paper');
			$this->load->model('reg');
			$this->load->model('sertifikat');
			$this->load->model('user');
			$this->load->model('panitia');
			$this->load->model('speaker');
		}

    public function insert($content, $pages) {

			$this->$pages->insert();
			redirect('Admin#A_content/'.$content.'/'.$pages);
			// if ($this->$pages->insert() === '1') {
			// 	redirect('Admin#A_content/'.$content.'/'.$pages);
			// } else {
			// 	echo '
			// 	<script>
			// 		function Delete() {
			// 		    alert("I am an alert box!");
			// 				window.location.href = "Admin#A_content/'.$content.'/'.$pages.'";
			// 		}
			// 	</script>
			// 	';
			// }
    }

		public function edit($content, $pages , $id) {
			$data['id'] = $this->$pages->get_id($id);

			$this->load->view('content/'. $content .'/edit/edit_' . $pages, $data);
		}

		public function update($content, $pages , $id) {
			$this->$pages->update($id);
			$data['get_jur'] 	= $this->$pages->get();
			redirect('Admin#A_content/'.$content.'/'.$pages);
		}

		public function delete($content, $pages , $id) {
			$this->$pages->delete($id);
			redirect('Admin#A_content/'.$content.'/'.$pages);
		}

		public function scan_qr_code($req , $id) {
			// if ($req === "eticket") {
			// 	$pages = "reg";
			// } else {
			// 	$pages = "sertifikat";
			// }
			//
			// $this->$pages->update_stat($id);
			// redirect('Admin#A_content/transaksi/reg');
			echo "string";
		}
	}
?>
