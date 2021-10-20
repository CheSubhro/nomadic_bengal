<?php
ob_start();
class General_settings extends CI_Controller {

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
        if($query[0]->general_settings == 0 || $query[0]->general_settings == NULL)
        {
        redirect('superpanel/home');
        }
        //End of Admin Access
    }

	public function index()
	{
        $data['general_setting']=$this->General_model->show_data_id('general_setting','','','get','');
        $data['title']="General Settings || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/general_settings');
		$this->load->view('superpanel/footer');
	}

    public function add()
    {
        $data['title']="Add General Settings || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_general_settings');
        $this->load->view('superpanel/footer');
    }

	//========================= Insert General Settings =================================

	public function insert()
	{
		$data=$this->input->post();
		$data1= array();

        $data1['email']               = $data['email'];
        $data1['phone']               = $data['phone'];
        $data1['address']             = $data['address'];
        $data1['facebook']            = $data['facebook'];
        $data1['instagram']           = $data['instagram'];
        $data1['googleplus']          = $data['googleplus'];
        $data1['twitter']             = $data['twitter'];
        $data1['rss']                 = $data['rss'];
        $data1['created_at']          = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('general_setting','','','insert', $data1);
        $this->session->set_flashdata('success', 'General Settings Insert successfully.');
        redirect('superpanel/general_settings');       	   

	}

	//========================= End Insert General Settings =================================

    //========================= Edit General Settings =======================================
    public function edit($id)
    {
        $data['general_setting']=$this->General_model->show_data_id('general_setting',$id,'id','get','');
        $data['title']="Edit General Setting || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_general_setting');
        $this->load->view('superpanel/footer');
    }
    //========================= End Edit General Settings ====================================

    //========================= Update General Settings ======================================
    public function update($id)
    {
        $data=$this->input->post();
        $data1= array();

        $data1['email']               = $data['email'];
        $data1['phone']               = $data['phone'];
        $data1['address']             = $data['address'];
        $data1['facebook']            = $data['facebook'];
        $data1['instagram']           = $data['instagram'];
        $data1['googleplus']          = $data['googleplus'];
        $data1['twitter']             = $data['twitter'];
        $data1['rss']                 = $data['rss'];
        $data1['updated_at']          = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('general_setting',$id,'id','update', $data1);
        $this->session->set_flashdata('success', 'General Settings Update successfully.');
        redirect('superpanel/general_settings');
    }

    //========================= End Update General Settings ======================================
}

