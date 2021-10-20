<?php
ob_start();
class Home extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('superpanel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel', 'refresh');
        }
      
    }

	public function index()
	{   
		$data['title']="Dashboard || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/dashboard');
		$this->load->view('superpanel/footer');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('superpanel/main/login');
    }
}

