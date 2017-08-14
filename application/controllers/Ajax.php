<?php
// application/controller/Ajax.php

class Ajax extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        $this->load->model('ajax_model');
        $this->load->helper('url_helper');
    }
	
    public function index() {
      $data['news_title'] = 'Ajax search';
  
      $this->load->view('templates/header', $data);
      $this->load->view('news/index');
      $this->load->view('templates/footer');
   }
   
   public function getdata($param = '')
   {
      // Get data from db
      $data['ajaxdata'] = "Search result for $param";
      $data['news']= $this->ajax_model->get_results($param);
      // Pass data to view
      $this->load->view('ajax/index', $data);
   }
   
  
}