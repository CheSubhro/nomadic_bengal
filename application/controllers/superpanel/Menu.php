<?php
ob_start();
class Menu extends CI_Controller {

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
        if($query[0]->menu == 0 || $query[0]->menu == NULL){
            redirect('superpanel/home');
        }
        //End of Admin Access
    }

	public function index()
	{
		$data['menu']=$this->General_model->show_data_id('menu','','','get','');
        $data['title']=" Menu || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/menu');
		$this->load->view('superpanel/footer');
	}

    public function add()
    {
        $data['title']=" Add Menu || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_menu');
        $this->load->view('superpanel/footer');
    }

    //--------------------------------Insert Menu--------------------------------

    public function insert()
    {
        $this->form_validation->set_rules('slug','slug', 'required|is_unique[menu.slug]');
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('error', 'Menu slug already exists on database !');
            redirect('superpanel/menu/add');
        }
        else
        {  
            $data=$this->input->post();
            $data1= array();

            //For Slug 
            $slug =strtolower($data['slug']);
            $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
            //End Slug

            $data1['menu_type']               = $data['menu_type'];
            $data1['name']                    = $data['name'];
            $data1['title']                   = $data['title'];
            $data1['slug']                    = $data['slug'];
            $data1['description']             = $data['description'];
            $data1['meta_keyword']            = $data['meta_keyword'];
            $data1['meta_description']        = $data['meta_description'];
            $data1['status']                  = $data['status'];
            $data1['created_at']              = date('Y/m/d h:i:s');

            $result=$this->General_model->show_data_id('menu','','','insert', $data1);
            $this->session->set_flashdata('success', 'Menu Insert Successfully.');
            redirect('superpanel/menu');
        }
    }

    //--------------------------------Insert Menu--------------------------------

    //--------------------------------Edit Menu----------------------------------

    public function edit($id)
    {
        $data['menu']=$this->General_model->show_data_id('menu',$id,'id','get','');
        $data['title']=" Update Menu || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_menu');
        $this->load->view('superpanel/footer');
    }

    //--------------------------------Edit Menu-----------------------------------

    //--------------------------------Update Menu----------------------------------

    public function update($id)
    { 
        $data=$this->input->post();
        $data1= array();


        $data1['menu_type']               = $data['menu_type'];
        $data1['name']                    = $data['name'];
        $data1['title']                   = $data['title'];
        $data1['description']             = $data['description'];
        $data1['meta_keyword']            = $data['meta_keyword'];
        $data1['meta_description']        = $data['meta_description'];
        $data1['status']                  = $data['status'];
        $data1['updated_at']              = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('menu',$id,'id','update',$data1);
        $this->session->set_flashdata('success', 'Menu Update Successfully.');
        redirect('superpanel/menu');

    }

    //--------------------------------Update Menu----------------------------------


	
}

