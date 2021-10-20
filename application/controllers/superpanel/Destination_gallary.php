<?php
ob_start();
class Destination_gallary extends CI_Controller {

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
        $this->load->library('session');
         if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel','refresh');
        }

        //Admin Access
        $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        if($query[0]->destination_gallary == 0 || $query[0]->destination_gallary == NULL)
        {
            redirect('superpanel/home');
        }
        //End of Admin Access
      
    }

	public function index()
	{
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Destination Gallary|| Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/destination_gallary');
		$this->load->view('superpanel/footer');
	}


	

    
}

