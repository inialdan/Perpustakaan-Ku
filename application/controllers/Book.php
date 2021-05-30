<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Jakarta");

	class Book extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->home = base_url();
			$this->profile = base_url("profile");
			$this->load->helper(array('form', 'url'));
			$this->load->model("UserModel");
			$this->load->model("BookModel");
			$this->load->model("BookCategoryModel");
			
			if($this->session->userdata("login") == null && $this->session->userdata("admin") != true){
				redirect(base_url('login'));
			}

			$this->user = $this->UserModel->findOne("id", $this->session->userdata("login"));
		}

		public function index(){
			$data = [
				"user" => $this->user,
				"posts" => $this->BookModel->findAll()
			];
			 
			$this->load->view('book/index', $data);
		}

		public function create(){
			$data = [
				"book_category" => $this->BookCategoryModel->findAll(),
			];

			$this->load->view('book/create', $data);
		}

		public function book_create(){
			$nama_buku = $this->input->post("nama_buku");
			$jenis_buku = $this->input->post("jenis_buku");

			$data = [
				"cover" => "default_book.png",
				"nama_buku" => $nama_buku,
				"jenis_buku" => $jenis_buku,
				"created_by" => $this->user->username,
				"created_on" => date('Y-m-d H:i:s'),
			];

			if($this->BookModel->create($data) == 1){
				echo "
				<script>
					alert('Buku berhasil diinput');
					document.location.href = 'book_create';
				</script>";
			}else{
				echo "
				<script>
					alert('Gagal menginput data buku');
					document.location.href = 'book_create';
				</script>";
			}
		}

		public function book_update($id){

			$data = [
				"book" => $this->user = $this->BookModel->findOne("id", $id),
				"book_category" => $this->BookCategoryModel->findAll(),
			];
			 
			$this->load->view('book/edit', $data);
		}

		private function _upload_cover($id){

			$data = $this->user = $this->BookModel->findOne("id", $id);

			$config['upload_path']          = './pictures/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['file_name']            = $data->id . "_" . $data->nama_buku . "_" . uniqid();
			$config['overwrite']			= true;
			$config['max_size']             = 1000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('new_cover')){
				echo "
				<script>
					alert('Terjadi kesalahan upload');
					document.location.href = '" . base_url() . "book';
				</script>";die();
			}else{
				if($data->cover != "default_book.png" && file_exists("./pictures/" . $data->cover)){
					unlink("./pictures/" . $data->cover);
				}
				// if($this->user->avatar != null && file_exists("./pictures/" . $this->user->avatar)) {
				// 	unlink("./pictures/" . $this->user->avatar);
				// }
				return $this->upload->data("file_name");
			}
		}

		public function book_update_data(){
			$id = $this->input->post("id");
			$nama_buku = $this->input->post("nama_buku");
			$jenis_buku = $this->input->post("jenis_buku");
			$cover = $this->input->post("old_cover");

			if (!empty($_FILES["new_cover"]["name"])) {
				$cover = $this->_upload_cover($id);
			}

			$data = [
				"cover" => $cover,
				"nama_buku" => $nama_buku,
				"jenis_buku" => $jenis_buku,
			];
			
			if($this->BookModel->update($data, $id) == 1){
				echo "
				<script>
					alert('Buku berhasil diupdate');
					document.location.href = '" . base_url() . "book';
				</script>";
			}else {
				echo "
				<script>
					alert('Buku gagal diupdate');
					document.location.href = '" . base_url() . "book';
				</script>";
			}
		}

		public function book_delete($id){

			$this->load->model("BookModel");
        	
			if($this->BookModel->delete($id) == 1){
				echo "
				<script>
					alert('Buku berhasil dihapus');
					document.location.href = '" . base_url() . "book';
				</script>";
			}else{
				echo "
				<script>
					alert('Gagal menghapus data buku');
					document.location.href = '" . base_url() . "book';
				</script>";
			}
		}

	}
