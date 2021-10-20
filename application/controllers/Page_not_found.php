<?php
ob_start();
class Page_not_found extends CI_Controller{
    function __construct() {
        parent::__construct();
		$this->load->model('General_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('text');
    }	
    function index(){


        $data['title']='Page not found';

        $this->load->view('page_404',$data);
    }
	

	
}