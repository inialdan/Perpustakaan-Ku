<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Jakarta");

	class BookList extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->home = base_url();
			$this->profile = base_url("profile");
			$this->load->helper(array('form', 'url'));
			$this->load->model("UserModel");
			$this->load->model("BookModel");
			
			if($this->session->userdata("login") == null && $this->session->userdata("member") != true){
				redirect(base_url('login'));
			}

			$this->user = $this->UserModel->findOne("id", $this->session->userdata("login"));
		}

		public function index(){
			$data = [
				"user" => $this->user,
				"posts" => $this->BookModel->findAll()
			];
			 
			$this->load->view('book_list/index', $data);
		}

	}
