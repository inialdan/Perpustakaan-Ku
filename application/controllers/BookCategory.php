<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Jakarta");

	class BookCategory extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->home = base_url();
			$this->profile = base_url("profile");
			$this->load->helper(array('form', 'url'));
			$this->load->model("UserModel");
			$this->load->model("BookCategoryModel");

			if($this->session->userdata("login") == null && $this->session->userdata("admin") != true){
				redirect(base_url('login'));
			}else{
				if($this->session->userdata("admin") != true){
					redirect(base_url('login'));
				}
			}

			$this->user = $this->UserModel->findOne("id", $this->session->userdata("login"));
		}

		public function index(){
			$data = [
				"user" => $this->user,
				"posts" => $this->BookCategoryModel->findAll()
			];
			 
			$this->load->view('book_category/index', $data);
		}

		public function create(){
			$this->load->view('book_category/create');
		} 

		public function book_category_create(){
			$jenis_buku = $this->input->post("jenis_buku");

			$data = [
				"jenis" => $jenis_buku,
				"created_by" => $this->user->username,
				"created_on" => date('Y-m-d H:i:s'),
			];

			if($this->BookCategoryModel->create($data) == 1){
				echo "
				<script>
					alert('Jenis buku berhasil diinput');
					document.location.href = 'book_category_create';
				</script>";
			}else{
				echo "
				<script>
					alert('Gagal menginput data jenis buku');
					document.location.href = 'book_category_create';
				</script>";
			}
		}

		public function book_category_update($id){

			$data = [
				"book_category" => $this->user = $this->BookCategoryModel->findOne("id", $id),
			];
			 
			$this->load->view('book_category/edit', $data);
		}

		public function book_category_update_data(){
			$id = $this->input->post("id");
			$jenis = $this->input->post("jenis");

			$data = [
				"jenis" => $jenis,
			];
			
			if($this->BookCategoryModel->update($data, $id) == 1){
				echo "
				<script>
					alert('Jenis buku berhasil diupdate');
					document.location.href = '" . base_url() . "book_category';
				</script>";
			}else {
				echo "
				<script>
					alert('Jenis buku gagal diupdate');
					document.location.href = '" . base_url() . "book_category';
				</script>";
			}
		}


		public function book_category_delete($id){

			$this->load->model("BookCategoryModel");
        	
			if($this->BookCategoryModel->delete($id) == 1){
				echo "
				<script>
					alert('Jenis buku berhasil dihapus');
					document.location.href = '" . base_url() . "book_category';
				</script>";
			}else{
				echo "
				<script>
					alert('Gagal menghapus data jenis buku');
					document.location.href = '" . base_url() . "book_category';
				</script>";
			}
		}
	}
