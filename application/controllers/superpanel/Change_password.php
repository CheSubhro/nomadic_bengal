<?php
ob_start();
class Change_password extends CI_Controller {

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
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->helper('url');
        $this->load->helper('string');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel','refresh');
        }

    }

	public function index()
	{
		$id = $this->session->userdata('id');
 		$data['change_pass']=$this->General_model->show_data_id('admin_details',$id,'id','get','');
        $data['title']="Change Password || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/change_password');
		$this->load->view('superpanel/footer');
	}

	//========================= Update Change Password =================================

	public function update()
	{
 
	    $new_pass    = md5($this->input->post('password'));
	    $pass_view   = $this->input->post('password');
		$id 		 = $this->session->userdata('id');

				
		    $data=array(
			     'password'   => $new_pass,
			     'pass_view'  => $pass_view,
			     'updated_at' => time('Y-m-d H:i:s')
			     ); 

		    $query=$this->General_model->show_data_id('admin_details',$id,'id','update',$data);
	        $this->session->set_flashdata('success', 'Password Changed successfully.');
	        redirect('superpanel/change_password');			
				
	  

	}

	//========================= End Update Change Password =================================
}

