<?php
ob_start();
class Viewer extends CI_Controller {

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
    }

	public function index()
	{
		
		$query=$this->General_model->show_data_id('viewer','','','get','');
        $data['viewer']=$query;
        $data['title']="Viewer || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/viewer');
		$this->load->view('superpanel/footer');
	}

    public function view()
    {
        $query=$this->General_model->show_data_id('viewer',$id,'customer_id','get','');
        $data['viewer']=$query;
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/viewer');
        $this->load->view('superpanel/footer');
    }
}

