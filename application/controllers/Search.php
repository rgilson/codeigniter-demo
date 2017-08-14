<?php
// application/controller/Search.php

class Search extends CI_Controller 
{
   public function index() {
      $data['news_title'] = 'Ajax search';
  
      $this->load->view('templates/header', $data);
      $this->load->view('news/index');
      $this->load->view('templates/footer');
   }
}