<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->model("UserModel");

			// if($this->session->userdata("login") != null && $this->session->userdata("admin") == true){
			// 	redirect(base_url('book'));
			// }
		}

		public function register(){
			$this->load->view('auth/register');
		}

		public function post_register(){
			$username = $this->input->post("username");
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);

			$pass = $this->input->post("password");
			$repass = $this->input->post("repassword");
			
			$user = $this->UserModel->findOne("username", $username);
			
			if($user != null){
				echo"
				<script>
					alert('Username telah terdaftar, pilih username lain');
					document.location.href = 'register';
				</script>";
			}else{
				if($pass == $repass){
					$data = [
						"role" => "member",
						"username" => $username,
						"name" => $name,
						"email" => $email,
						"password" => $password,
						"avatar" => "default.png"
					];
					if($this->UserModel->create($data) == 1){
						echo"
						<script>
							alert('Register berhasil');
							document.location.href = 'login';
						</script>";
					}else{
						echo"
						<script>
							alert('Register gagal');
							document.location.href = 'register';
						</script>";
					}
				}else{
					echo"
					<script>
						alert('Password tidak sama');
						document.location.href = 'register';
					</script>";
				}
			}
		}

		public function login(){
			$this->load->view('auth/login');
		}

		public function post_login(){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			$user = $this->UserModel->findOne("username", $username);

			if($user != null){
				if(password_verify($password, $user->password)){
					$this->session->set_userdata(["login" => $user->id]);
					if($user->role == "admin"){
						$this->session->set_userdata(["admin" => true]);
						redirect(base_url('book'));
					}
					else{
						$this->session->set_userdata(["admin" => false]);
						redirect(base_url('book_list'));
					}
				}else{
					echo"
					<script>
						alert('Password salah');
						document.location.href = 'login';
					</script>";
				}
			}
			else{
				echo"
				<script>
					alert('Username belum terdaftar, silahkan register');
					document.location.href = 'login';
				</script>";
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			
			redirect(base_url('login'));
		}
	}