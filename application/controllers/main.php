<?php

class Main extends CI_Controller{
    
    public function index() {
        $this->login();
    }
    
    public function login(){
        $this->load->view('login');   
    }
    
    public function signup(){
        $this->load->view('signup');   
    }
    
  

    public function members(){
    if($this->session->userdata('is_logged_in')){
        $this->load->view('members');
    }
    else {
        redirect('main/restricted');
    }  
    }
    
    public function restricted(){
        $this->load->view('restricted');
    }

    public function login_validation(){
        $this->load->helper('security');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','required|md5|trim');
        
        if($this->form_validation->run()){
            
            $data = array(
                'email' => $this->input->post('email'),
                'is_logged_in' => 1
            );
            $this->session->set_userdata($data);
            
            redirect('main/members');
        }
        else{
            $this->load->view('login');
        }  
    }
    
    public function signup_validation(){
        $this->load->helper('security');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('first_name','First Name','required');
        $this->form_validation->set_rules('last_name','Last Name','required');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
        
        $this->form_validation->set_message('is_unique','That email address already exist!');
        
        if($this->form_validation->run()){
            
            //echo 'Validation Successful.';
            redirect('main/add_user');
        }
        else {
           //Validation failed
            $this->load->view('signup');
        }
    }
    
    public function add_user(){
        $this->load->model('model_users');
        $this->model_users->add_user();
        $this->load->view('success');
        
    }

    public function validate_credentials(){
        $this->load->model('model_users');

        if($this->model_users->can_log_in()){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('validate_credentials','Sorry incorrect Email ID or Password');
            return FALSE ;
        }
        
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('main/login');
    }
     
}
?>
