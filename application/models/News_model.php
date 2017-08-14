<?php
class News_model extends CI_Model {
	
    //creates a new model by extending CI_Model and loads the database library
    public function __construct() {
        $this->load->database();
    }
		
	/*  public function index(){
		$data['news_title'] = 'Add news';
  
		$this->load->view('templates/header', $data);
		$this->load->view('news/index');
		$this->load->view('templates/footer'); 		 
	 } */
	 
	//method that gets all posts from the database table 'news'	
	public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
			$this->db->order_by("id", "desc");
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
	
	//method to insert news item to the db
	public function set_news() {
		$this->load->helper('url');
		$slug = url_title($this->input->post('news_title'), 'dash', TRUE);

		$data = array(
			'news_title' => $this->input->post('news_title'),
			'slug' => $slug,
			'mytext' => $this->input->post('mytext')
		);
		return $this->db->insert('news', $data);
	}	
}