<?php
ob_start();
class Submenu extends CI_Controller {

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
        $this->load->helper('string');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel', 'refresh');
        }

        //Admin Access
        $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        if($query[0]->submenu == 0 || $query[0]->submenu == NULL){
            redirect('superpanel/home');
        }
        //End of Admin Access
    }

	public function index()
	{
		$data['submenu']=$this->General_model->show_data_id('submenu','','','get','');
        $data['menu']   =$this->General_model->show_data_id('menu','','','get','');
        $data['title']  =" Submenu || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/submenu');
		$this->load->view('superpanel/footer');
	}

    public function add()
    {
        $data['menu']=$this->General_model->show_data_id('menu','','','get','');
        $data['title']=" Add Submenu || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_submenu');
        $this->load->view('superpanel/footer');
    }

    //--------------------------------Insert Submenu--------------------------------

    public function insert()
    {
        $this->form_validation->set_rules('slug','slug', 'required|is_unique[submenu.slug]');
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('error', 'Submenu slug already exists on database !');
            redirect('superpanel/menu/submenu');
        }
        else
        {  
            $data=$this->input->post();
            $data1= array();

            //For Slug 
            $slug =strtolower($data['slug']);
            $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
            //End Slug

            $data1['menu_id']                 = $data['menu_id'];
            $data1['name']                    = $data['name'];
            $data1['title']                   = $data['title'];
            $data1['slug']                    = $data['slug'];
            $data1['description']             = $data['description'];
            $data1['meta_keyword']            = $data['meta_keyword'];
            $data1['meta_description']        = $data['meta_description'];
            $data1['status']                  = $data['status'];
            $data1['created_at']              = date('Y/m/d h:i:s');

            $result=$this->General_model->show_data_id('submenu','','','insert', $data1);
            $this->session->set_flashdata('success', 'Submenu Insert Successfully.');
            redirect('superpanel/submenu');
        }
    }

    //--------------------------------Insert Submenu--------------------------------

    //--------------------------------Edit Submenu----------------------------------

    public function edit($id)
    {
        $data['submenu']=$this->General_model->show_data_id('submenu',$id,'id','get','');
        $data['menu']=$this->General_model->show_data_id('menu','','','get','');
        $data['title']=" Update Submenu || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_submenu');
        $this->load->view('superpanel/footer');
    }

    //--------------------------------Edit Submenu-----------------------------------

    //--------------------------------Update Submenu----------------------------------

    public function update($id)
    { 
        $data=$this->input->post();
        $data1= array();


        $data1['menu_id']                 = $data['menu_id'];
        $data1['name']                    = $data['name'];
        $data1['title']                   = $data['title'];
        $data1['description']             = $data['description'];
        $data1['meta_keyword']            = $data['meta_keyword'];
        $data1['meta_description']        = $data['meta_description'];
        $data1['status']                  = $data['status'];
        $data1['updated_at']              = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('submenu',$id,'id','update',$data1);
        $this->session->set_flashdata('success', 'Submenu Update Successfully.');
        redirect('superpanel/submenu');

    }

    //--------------------------------Update Submenu----------------------------------


	
}

