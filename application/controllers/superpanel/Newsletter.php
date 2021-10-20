<?php

class Newsletter extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->helper('url');
        $this->load->library('image_lib');
        $this->load->helper('string');
        
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel', 'refresh');
        }

        //Admin Access
        $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        if($query[0]->newsletter == 0 || $query[0]->newsletter == NULL)
        {
            redirect('superpanel/home');
        }
        //End of Admin Access
      
    }
	public function index()
	{
        $data['title']="Newsletter || Bike Dude";
		$this->load->view('superpanel/header');
		$this->load->view('superpanel/newsletter');
		$this->load->view('superpanel/footer');
	}
}

