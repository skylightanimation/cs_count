<?php 

class User_model extends CI_Model{
	function auth($username, $password){
		$this->db->select('id_user, username_user, fullname_user, email_user, type_user');
		$this->db->from('user');
		$this->db->where(array('username_user'=>$username, 'password_user'=>md5($password)));

		if($getUser=$this->db->get()){
			return $getUser->row_array();
		}else{
			return false;
		}
	}

	function getOnline(){
		$this->db->select('id_user,	username_user, fullname_user, online_user, count_user');
		$this->db->from('user');
		$this->db->where(array('online_user'=>'true'));

		if($getUser=$this->db->get()){
			return $getUser->result();
		}else{
			return false;
		}
	}

	function updateCount($username, $value){		
		$this->db->set(array('count_user' => $value));
		$this->db->where(array('username_user'=>$username));
		$this->db->update('user');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function updateOnline($idUser, $status){
		$this->db->set(array('online_user' => $status));
		$this->db->where(array('id_user'=>$idUser));
		$this->db->update('user');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function get($idUser){
		$this->db->select('count_user, online_user');
		$this->db->from('user');
		$this->db->where(array('id_user'=>$idUser));
		if($getUser=$this->db->get()){
			return $getUser->row_array();
		}else{
			return false;
		}
	}

}
