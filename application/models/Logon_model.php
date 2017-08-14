<?php
class Logon_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function register()
    {
        $this->load->helper('url');

        $data = array(
			'first_name' => $this->input->post('first_name'), 
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'pwd' => $this->input->post('pwd'),
        );
        return $this->db->insert('users', $data);
    } 
    public function logon()
    {
        $this->load->helper('url');
        $user =$this->input->post('username');
        $key =$this->input->post('pwd');

        $this -> db -> select('username');
        $this -> db -> from('users');
        $this -> db -> where('username', $user);
        $this -> db -> where('pwd', $key);
        $this -> db -> limit(1);
        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}