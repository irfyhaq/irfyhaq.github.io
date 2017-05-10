<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('tasks');

        // Only accessible to logged in Users
        if(!$this->session->userdata('is_logged_in')){
            $url = base_url().'user';
            redirect($url);
        }
    }
 
    public function index($id = null)
    {
        if($this->session->userdata('is_logged_in')){
            if($id){
                $data['task'] = $this->tasks->getTaskById($id);
                if($data['task']){
                    if($data['task']['user_id'] == $this->session->userdata('user_id')){
                        $this->load->view('tasks/detail', $data);
                    } else {
                        $data['message_errors'] = TRUE;
                        $data['message'] = 'Sorry You are Not authorized to View This Task.';
                        $this->load->view('error', $data);
                    }
                } else {
                    $data['message_errors'] = TRUE;
                    $data['message'] = 'No Tasks Found';
                    $this->load->view('error', $data);
                }

            } else {
                $data['tasks'] = $this->tasks->getAllTasks($this->session->userdata('user_id'));
                $this->load->view('tasks/view', $data);
            }
        } else {
            redirect('user/index');
        }
    }  
    

    // Add New Task
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Task Name', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('tasks/add');
        } else {  
            $data['user_id'] = $this->session->userdata('user_id');
            $data['name'] = $this->input->post('name');
            $data['time'] = date("H:i:s",strtotime($this->input->post('time')));
            $data['date'] = date("Y-m-d H:i:s", strtotime($this->input->post('date')));
            $data['priority'] = (int) $this->input->post('priority');
            $data['description'] = $this->input->post('description');
            $task = $this->tasks->addTask($data);
            $url = base_url().'task/'.$task;
            redirect($url);
        }
    }

    //Function to edit an existing task
    public function edit($id=null){
        if($id){
            $data['task'] = $this->tasks->getTaskById($id);
            if($data['task']){
                if($data['task']['user_id'] == $this->session->userdata('user_id')){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Task Name', 'trim|required');
                    $this->form_validation->set_rules('date', 'Date', 'trim|required');
                    $this->form_validation->set_rules('time', 'Time', 'trim|required');
                    if($this->form_validation->run() == FALSE) {
                        $this->load->view('tasks/edit', $data);
                    } else { 
                        $task['id'] = (int) $id; 
                        $task['user_id'] = $this->session->userdata('user_id');
                        $task['name'] = $this->input->post('name');
                        $task['time'] = date("H:i:s",strtotime($this->input->post('time')));
                        $task['date'] = date("Y-m-d H:i:s", strtotime($this->input->post('date')));
                        $task['priority'] = (int) $this->input->post('priority');
                        $task['description'] = $this->input->post('description');
                        $status = $this->input->post('status');
                        $task['status'] = ($status) ? (int) 1 : (int) 0;
                        $edTask = $this->tasks->editTask($task);
                        if($edTask){
                            $message['id'] = $data['task']['id'];
                            $message['redirect'] = TRUE;
                            $message['message'] = 'Successfully saved the Changes.';
                            $this->load->view('message', $message);
                        } else {
                            $data['message_errors'] = TRUE;
                            $data['message'] = 'Something Went Wrong.';
                            $this->load->view('error', $data);
                        }
                    }
                } else {
                    $data['message_errors'] = TRUE;
                    $data['message'] = 'Sorry You are Not authorized to Edit This Task.';
                    $this->load->view('error', $data);
                }
            } else {
                $data['message_errors'] = TRUE;
                $data['message'] = 'No Tasks Found';
                $this->load->view('error', $data);
            }
        } else {
            $url = base_url().'task';
            redirect($url);
        }
    }

    public function delete($id=null){
        if($id){
            $data['task'] = $this->tasks->getTaskById($id);
            if($data['task']){
                if($data['task']['user_id'] == $this->session->userdata('user_id')){
                    $this->tasks->deleteTask($id);
                    $data['message'] = 'Successfully Deleted the Task.';
                    $this->load->view('message', $data);
                } else {
                    $data['message_errors'] = TRUE;
                    $data['message'] = 'Sorry You are Not authorized to Delete This Task.';
                    $this->load->view('error', $data);
                }
            } else {
                $data['message_errors'] = TRUE;
                $data['message'] = 'No Tasks Found';
                $this->load->view('error', $data);
            }
        } else {
            $url = base_url().'task';
            redirect($url);
        }
    }

}