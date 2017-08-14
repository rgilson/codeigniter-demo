<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geo extends CI_Controller {
		
	 public function index() {
      $data['title'] = 'Geolocation';
	  $this->load->helper('url_helper'); 
		
       $this->load->view('templates/header', $data);
       $this->load->view('geo/index');
      //$this->load->view('templates/footer');
   }
}
	