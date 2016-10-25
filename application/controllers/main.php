<?php

class Main extends CI_Controller{
    
    public function index() {
        $this->login();
    }
    
    public function login(){
        $this->load->view('login');   
    }
    
    public function members(){
        $this->load->view('members');
    }

    public function login_validation(){
        $this->load->helper('security');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password','Password','required|md5|trim');
        
        if($this->form_validation->run()){
            redirect('main/members');
        }
        else{
            $this->load->view('login');
        }
      
        
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
    
 
    
    
    
    
    
}
?>
