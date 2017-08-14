<?php
class Ajax_model extends CI_Model {
	
    //creates a new model by extending CI_Model and loads the database library
    public function __construct() {
        $this->load->database();		
    }
	
	 public function index(){
		$data['news_title'] = 'Ajax search';
  
      $this->load->view('templates/header', $data);
      $this->load->view('news/index');
      $this->load->view('templates/footer'); 		 
	 }
   
  public function get_results($mysearch='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('*');
        $this->db->from('news');
        $this->db->like('news_title',$mysearch);

        // Execute the query.
        $query = $this->db->get();
        return $query->result_array();        
    }
}