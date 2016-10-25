<?php

class Model_users extends CI_Model{
    
    public function can_log_in(){
        
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            return TRUE;
        }
        else {
            return FALSE;
        }  
    }
    
    public function add_user(){
       
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $data = array(
                'first_name' => $this->db->escape($first_name),
                'last_name' => $this->db->escape($last_name),
                'username' => $this->db->escape($username),
                'email' => $this->db->escape($email),
                'password' => $this->db->escape($password)
        );

        if(!$this->db->insert('users', $data))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

?>
