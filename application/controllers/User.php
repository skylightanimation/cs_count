<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('User_model');
	}

	function index(){
		echo 'Welcome...<br>';
	}

	function login(){
		$Id = $this->session->userdata('userIdSessionPSys');

		if ($Id) {
			redirect('dashboard');
		}else{
			if(isset($_POST['submit'])){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$auth = $this->User_model->auth($username, $password);

				if ($auth != false) {
					$idUser = $auth['id_user'];
					$updateOnline = $this->User_model->updateOnline($idUser, 'true');
					$this->session->set_userdata('userIdSessionPSys', $auth['id_user']);
					$this->session->set_userdata('userTypeSessionPSys', $auth['type_user']);
					$this->session->set_userdata('userNameSessionPSys', $auth['username_user']);
					$this->session->set_userdata('userFullnameSessionPSys', $auth['fullname_user']);
					$this->session->set_userdata('userEmailSessionPSys', $auth['email_user']);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('msg', 
					'<div class="alert alert-danger">
						<h4>Error</h4>
						<p>Username or Password not match!!!</p>
					</div>');
					redirect('login');
				}
			}else {
				$this->load->view('user/v_page_login');
			}
		}
	}

	function logout(){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$updateOnline = $this->User_model->updateOnline($idUser, 'false');

		if (!empty($updateOnline)) {
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		}else{
			redirect('dashboard');
		}		
	}


	function dashboard(){
		$idUser = $this->session->userdata('userIdSessionPSys');
		$typeUser = $this->session->userdata('userTypeSessionPSys');

		if (!empty($idUser)) {
			$data['user'] = $this->User_model->get($idUser);
			$this->load->view('user/v_page_dashboard', $data);
		}else{
			redirect('login');
		}
	}


}

