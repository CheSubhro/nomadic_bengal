<?php
ob_start();
class Cms extends CI_Controller {
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
		if($query[0]->cms_pages == 0 || $query[0]->cms_pages == NULL)
		{
		redirect('superpanel/home');
		}
		//End of Admin Access
	}
	public function index()
	{
		$data['cms']=$this->General_model->show_data_id('cms','','','get','');
		$data['title']="CMS || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/cms');
		$this->load->view('superpanel/footer');
	}
	
	public function add()
	{
		$data['title']="Add Cms || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/add_cms');
		$this->load->view('superpanel/footer');
	}

	//========================= Insert CMS =================================
	public function insert()
	{
		$this->form_validation->set_rules('slug','slug', 'required|is_unique[cms.slug]');
		if ($this->form_validation->run() == FALSE)
		{
		$this->session->set_flashdata('error', 'Cms slug already exists on database !');
		redirect('superpanel/cms/add');
		}
		else
		{

		$data =$this->input->post();
		$data1= array();

		//For Slug
		$slug =strtolower($data['slug']);
		$slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
		//End Slug

		$config = array(
				'upload_path'   => "uploads/cms/",
				'upload_url'    =>  base_url()."uploads/cms/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("image")) {
		$data['image'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['image']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
		$data1['slug']                = $data['slug'];
		$data1['image']               = base_url().'uploads/cms/'.$data['image']['file_name'];
		$data1['page_name']           = $data['page_name'];
		$data1['page_title']          = $data['page_title'];
		$data1['description']         = $data['description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('cms','','','insert', $data1);
		$this->session->set_flashdata('success', 'CMS Page Insert successfully.');
		redirect('superpanel/cms');
		}
		}
	}
	//========================= End Insert CMS =================================

	//========================= Edit CMS =======================================
	public function edit($id)
	{
		$data['cms']=$this->General_model->show_data_id('cms',$id,'id','get','');
		$data['title']="Edit Cms || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/edit_cms');
		$this->load->view('superpanel/footer');
	}
	//========================= End Edit CMS ==================================

	//========================= Update CMS ====================================
	public function update($id)
	{
		$data =$this->input->post();
		$data1= array();

		$config = array(
				'upload_path'   => "uploads/cms/",
				'upload_url'    =>  base_url()."uploads/cms/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("image")) {
		$data['image'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['image']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

		$data1['image']               = base_url().'uploads/cms/'.$data['image']['file_name'];
		$data1['page_name']           = $data['page_name'];
		$data1['page_title']          = $data['page_title'];
		$data1['description']         = $data['description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['updated_at']          = date('Y/m/d h:i:s');

		$query=$this->General_model->show_data_id('cms',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        $result=$this->General_model->show_data_id('cms',$id,'id','update', $data1);
		}else{

		$data1['page_name']           = $data['page_name'];
		$data1['page_title']          = $data['page_title'];
		$data1['description']         = $data['description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['updated_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('cms',$id,'id','update', $data1);
		}
		$this->session->set_flashdata('success', 'CMS Page Update successfully.');
		redirect('superpanel/cms');
	}
	//========================= End Update Cms =================================

	
}