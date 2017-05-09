<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('users');
    }
 
    public function index()
    {
        if($this->session->userdata('is_logged_in')){
            $url = base_url().'task';
            redirect($url);
        } else {
            $this->load->view('user/login');   
        }
    }  

    public function login()
    {   
        if($this->session->userdata('is_logged_in')){
            $url = base_url().'task';
            redirect($url);
        } else {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'User Name', 'trim|required');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');
            if($this->form_validation->run() == FALSE) {
                $this->load->view('user/login');
            } else {  
                $user_name = strtolower($this->input->post('username'));
                $password = $this->input->post('pass');
                $is_valid = $this->users->validate($user_name, $password);    
                if($is_valid){
                    $data = array(
                        'username' => $user_name,
                        'is_logged_in' => true,
                        'user_id' => $is_valid['id']
                    );
                    $this->session->sess_expiration = 60*60*24*2;
                    $this->session->set_userdata($data);
                    // Explicitly defining this variable to remove index.php by passing it directly
                    $url = base_url().'task';
                    redirect($url);
                } else {
                    $data['message_errors'] = TRUE;
                    $data['message'] = 'Wrong Credentials';
                    $this->load->view('user/login', $data);    
                }         
            }
        }
    }  

    public function register()
    {   
        if($this->session->userdata('is_logged_in')){
            $url = base_url().'task';
            redirect($url);
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'User Name', 'trim|required');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[pass]');
            if($this->form_validation->run() == FALSE) {
                $this->load->view('user/register');
            } else {  
                $user_name = strtolower($this->input->post('username'));
                $password = $this->input->post('pass');
                $is_valid = $this->users->checkUsername($user_name);    
                if($is_valid){
                    $data['message_errors'] = TRUE;
                    $data['message'] = 'Username Already Exists.';
                    $this->load->view('user/register', $data);  
                } else {
                    $user_name = strtolower($this->input->post('username'));
                    $password = $this->input->post('pass');
                    $createUser = $this->users->createUser($user_name, $password);
                    $data = array(
                        'username' => $user_name,
                        'is_logged_in' => true,
                        'user_id' => $createUser
                    );
                    $this->session->sess_expiration = 60*60*24*2;
                    $this->session->set_userdata($data);
                    $url = base_url().'task';
                    redirect($url); 
                }         
            }
        }
    }   

       
    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url().'user';
        redirect($url);
    }

}