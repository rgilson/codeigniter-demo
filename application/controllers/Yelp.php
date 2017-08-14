<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yelp extends CI_Controller {
		
	 public function index() {
      $data['title'] = 'Yelp search';
	 	$this->load->helper('url_helper'); 
		
       $this->load->view('yelp/lib/OAuth');
       $this->load->view('yelp/index');
      //$this->load->view('templates/footer');
   }
}
	