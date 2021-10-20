<?php
ob_start();
class Home extends CI_Controller {
    
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
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('image_lib');
        $this->load->helper('string');
      
    }

	public function index()
	{   
        $data['menu']=$this->General_model->show_data_id('menu','','status','get','1');
        $data['slider']=$this->General_model->show_data_id('slider','','status','get','1');
        $data['destination_category']=$this->General_model->show_data_id('destination_category','1','status','get','');
        $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item','2','popular_choice','get','');
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
	}

}

