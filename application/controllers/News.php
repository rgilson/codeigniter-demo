<?php
class News extends CI_Controller {
	
    //constructor method calls CI_Controller and loads the model
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
	
    //method to load all news items
    public function index() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		
        $data['news'] = $this->news_model->get_news();
		$data['news_title'] = 'News Archive';

		$this->form_validation->set_rules('news_title', 'Title', 'required');
		$this->form_validation->set_rules('mytext', 'Text', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
		} 
		else {		
			$this->news_model->set_news();
			
			//$this->load->view('news/success');	
			$data['news'] = $this->news_model->get_news();
			$data['news_title'] = 'News archive';

			$this->load->view('templates/header', $data);
			redirect($this->uri->uri_string());
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
		}
    }
	
    //method to view specific news identify by the variable $slug
    public function view($slug = NULL) {
        $data['news_item'] = $this->news_model->get_news($slug);		
		if (empty($data['news_item'])) {
                show_404();
        }
        $data['news_title'] = $data['news_item']['news_title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
	
	
	public function create() {
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create a News Item';

		$this->form_validation->set_rules('new_title', 'Title', 'required');
		$this->form_validation->set_rules('mytext', 'Text', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');

		} else {
			$this->news_model->set_news();
			//$this->load->view('news/success');	
			$data['news'] = $this->news_model->get_news();
			$data['title'] = 'News archive';

			$this->load->view('templates/header', $data);
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
		}
	}  
}