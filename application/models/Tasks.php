<?php

Class Tasks extends CI_Model {
  
	function __construct(){      
		parent::__construct();
	}

	public function getAllTasks($user_id){
		return $this->db->where('user_id', (int) $user_id)->order_by('date, time', 'desc')->get('tasks')->result();
	}

	public function getTaskById($id){
		return $this->db->where('id', $id)->get('tasks')->row_array();
	}

	public function addTask($data){
		$task = array(
		   'user_id' => $data['user_id'] ,
		   'name' => $data['name'] ,
		   'date' => $data['date'] ,
		   'time' => $data['time'] ,
		   'priority' => (int) $data['priority'],
		   'description' => $data['description'],
		   'status' => (int) 1
		);
		$this->db->insert('tasks', $task); 
		return $this->db->insert_id();
	}

	public function editTask($data){
		$task = array(
		   'user_id' => $data['user_id'] ,
		   'name' => $data['name'] ,
		   'date' => $data['date'] ,
		   'time' => $data['time'] ,
		   'priority' => (int) $data['priority'],
		   'description' => $data['description'],
		   'status' => (int) $data['status']
		);
		$this->db->where('id', (int) $data['id'])->update('tasks', $task); 
		return true;
	}

	public function deleteTask($id){
		return $this->db->where('id', (int) $id)->delete('tasks');
	}

}
?>