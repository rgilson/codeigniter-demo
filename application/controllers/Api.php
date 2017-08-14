<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
	   $this->load->helper('url_helper'); 
	   $this->load->view('templates/header');
       $this->load->view('flickr/index');
     
   }			
}
