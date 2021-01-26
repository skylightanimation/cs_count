<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('User_model');
	}
	public function index()
	{
		$data['online'] = $this->User_model->getOnline();
		$this->load->view('v_home', $data);
	}

	function update_number($username, $value){
		$value = $value+1;
		$updateCount = $this->User_model->updateCount($username, $value);

		if (!empty($updateCount)) {
			redirect('', 'refresh');
		}
	}

}
