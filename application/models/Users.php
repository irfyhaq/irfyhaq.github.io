<?php

Class Users extends CI_Model {
  
	function __construct(){      
		parent::__construct();
	}

	public function getUsers(){
		return $this->db->get('users')->result();
	}

	public function validate($user_name, $password) {
		$query = $this->db->get_where('users', array('username' => $user_name, 'password' => $password))->row_array();
		if($query)
		{
			return $query;	
		}
		return false;	
	}

	public function checkUsername($user_name){
		$query = $this->db->get_where('users', array('username' => $user_name))->row_array();
		if($query)
		{
			return $query;	
		}
		return false;
	}

	public function createUser($user_name, $password){
		$data = array(
		   'username' => $user_name ,
		   'password' => $password 
		);
		$this->db->insert('users', $data); 
		return $this->db->insert_id();
	}
}
?>
