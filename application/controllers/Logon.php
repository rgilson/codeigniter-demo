<?php
class Logon extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('logon_model');
            $this->load->helper('form');
            $this->load->library('form_validation');  
                       
        }

        public function view($page = 'index')
        {
            if ( ! file_exists(APPPATH.'/views/logon/'.$page.'.php'))
           {
                // Whoops, we don't have a page for that!
				show_404();
           }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            
            $this->load->view('templates/header', $data);
            $this->load->view('logon/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }

        public function index()
        {
            $data['title'] = 'Logon';           
            $page='index';
			
			$this->form_validation->set_rules('first_name', 'First_name', 'required');		
            $this->form_validation->set_rules('last_name', 'Last_name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('pwd', 'Pwd', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('logon/'.$page, $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->logon_model->register();
                $this->load->view('templates/header', $data);
                redirect('news/index');
                $this->load->view('templates/footer');
            }
        }

        public function logon(){

            $data['title'] = 'Register';            
            $page='index';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('pwd', 'Pwd', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('logon/'.$page, $data);
				//redirect("news/index");
                $this->load->view('templates/footer');
            }
            else
            {
                $result = $this->logon_model->logon();
                if ($result == true){
                    $data['title'] = 'News Archive';
                    $this->load->view('templates/header', $data);
                    redirect("news/index");
                    $this->load->view('templates/footer');
                }
                else {
                    $data['title'] = 'Failed Logon';
                    $this->load->view('templates/header', $data);
                    $this->load->view('logon/'.$page, $data);
					//redirect("news/index");
                    $this->load->view('templates/footer');
                }
            }
        }
}
?>

