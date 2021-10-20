<?php
ob_start();
class Admin_user extends CI_Controller {

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

        // //Admin Access
        // $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        // if($query[0]->admin_users == 0 || $query[0]->admin_users == NULL){
        //     redirect('superpanel/home');
        // }
        // //End of Admin Access
    }

	public function index()
	{
		$data['admin']=$this->General_model->show_data_id('admin_details','','','get','');
        $data['title']="Admin User || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/admin_user');
		$this->load->view('superpanel/footer');
	}

	public function add()
	{
		$data['title']="Add Admin User || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/add_admin_user');
		$this->load->view('superpanel/footer');
	}

	//========================= Insert Admin =================================

	public function insert()
	{
		$data =$this->input->post();
        $data1= array();

        $config = array(
            'upload_path'   => "uploads/admin/",
            'upload_url'    =>  base_url() . "uploads/admin/",
            'allowed_types' => "gif|jpg|png|jpeg|mp3"
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload("image");
        $data['image'] = $this->upload->data();

        $configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['image']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  250,
                  'height'          =>  100,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        
        $data1['user_role']                           = $data['user_role'];
        $data1['username']                            = $data['username'];
        $data1['password']                            = md5($data['password']);
        $data1['pass_view']                           = $data['password'];
        $data1['email']                               = $data['email'];
        $data1['image']                               = base_url().'uploads/admin/'.$data['image']['file_name'];
        $data1['status']                              = $data['status'];
        $data1['created_at']                          = date('Y/m/d h:i:s');

        $result  = $this->General_model->show_data_id('admin_details','','','insert', $data1);
        $last_id = $this->db->insert_id();

        $datalist=array(
                    'admin_id'                     => $last_id,
                    'viewer'                       => $this->input->post('viewer'),
                    'menu'                         => $this->input->post('menu'),
                    'slider'                       => $this->input->post('slider'),

                    'destination_category'         => $this->input->post('destination_category'),
                    'destination_place_item'       => $this->input->post('destination_place_item'),
                    'destination_place_item_brief' => $this->input->post('destination_place_item_brief'),
                    'destination_gallary'          => $this->input->post('destination_gallary'),

                    'things_to_do_category'        => $this->input->post('things_to_do_category'),
                    'things_to_do'                 => $this->input->post('things_to_do'),

                    'recent_trips_category'        => $this->input->post('recent_trips_category'),
                    'recent_trips'                 => $this->input->post('recent_trips'),

                    'cms_pages'                    => $this->input->post('cms_pages'),
                    'newsletter'                   => $this->input->post('newsletter'),

                    'general_settings'             => $this->input->post('general_settings'),
                    'logo'                         => $this->input->post('logo'),

                    'admin_users'                  => $this->input->post('admin_users'),
                    'change_password'              => $this->input->post('change_password'),
            );

        $result = $this->General_model->show_data_id('admin_access', '', '', 'insert',$datalist);
        $this->session->set_flashdata('success', 'Admin added successfully');
        redirect('superpanel/admin_user');
        
	}

	//========================= End Insert Admin =================================

	//========================= Edit Admin =======================================
	public function edit($id)
	{
		$data['admin']=$this->General_model->show_data_id('admin_details',$id,'id','get','');
        $data['admin_access']=$this->General_model->show_data_id('admin_access',$id,'id','get','');
		$data['title']="Edit Admin  || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_admin_user');
        $this->load->view('superpanel/footer');
	}
	//========================= End Edit Admin ====================================

	//========================= Update Admin ======================================
	public function update($id)
	{
		$data =$this->input->post();
        $data1= array();

        $config = array(
            'upload_path'   => "uploads/admin/",
            'upload_url'    =>  base_url() . "uploads/admin/",
            'allowed_types' => "gif|jpg|png|jpeg|mp3"
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload("image")){
        $data['image'] = $this->upload->data();

        $configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['image']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  250,
                  'height'          =>  100,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        
        $data1['user_role']                           = $data['user_role'];
        $data1['username']                            = $data['username'];
        $data1['email']                               = $data['email'];
        $data1['image']                               = base_url().'uploads/admin/'.$data['image']['file_name'];
        $data1['status']                              = $data['status'];
        $data1['updated_at']                          = date('Y/m/d h:i:s');

        $query=$this->General_model->show_data_id('admin_details',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        $result  = $this->General_model->show_data_id('admin_details',$id,'id','update', $data1);
        $last_id =$data['id'];

        }else{

        $data1['user_role']                           = $data['user_role'];
        $data1['username']                            = $data['username'];
        $data1['email']                               = $data['email'];
        $data1['status']                              = $data['status'];
        $data1['updated_at']                          = date('Y/m/d h:i:s'); 

        $result  = $this->General_model->show_data_id('admin_details',$id,'id','update', $data1);
        $last_id =$data['id']; 

        }

        $datalist=array(
                    'admin_id'                     => $last_id,
                    'viewer'                       => $this->input->post('viewer'),
                    'menu'                         => $this->input->post('menu'),
                    'slider'                       => $this->input->post('slider'),

                    'destination_category'         => $this->input->post('destination_category'),
                    'destination_place_item'       => $this->input->post('destination_place_item'),
                    'destination_place_item_brief' => $this->input->post('destination_place_item_brief'),
                    'destination_gallary'          => $this->input->post('destination_gallary'),

                    'things_to_do_category'        => $this->input->post('things_to_do_category'),
                    'things_to_do'                 => $this->input->post('things_to_do'),

                    'recent_trips_category'        => $this->input->post('recent_trips_category'),
                    'recent_trips'                 => $this->input->post('recent_trips'),

                    'cms_pages'                    => $this->input->post('cms_pages'),
                    'newsletter'                   => $this->input->post('newsletter'),

                    'general_settings'             => $this->input->post('general_settings'),
                    'logo'                         => $this->input->post('logo'),

                    'admin_users'                  => $this->input->post('admin_users'),
                    'change_password'              => $this->input->post('change_password'),
            );

        $result = $this->General_model->show_data_id('admin_access',$id, 'id', 'update',$datalist);
        $this->session->set_flashdata('success', 'Admin Update successfully');
        redirect('superpanel/admin_user');
	}
   //========================= End Update Admin ===================================

	//========================= Block Admin ======================================
    public function block($id)
     { 
	    $data=array(
            'flag'=> '0'
        );

        $query= $this->General_model->show_data_id('admin_details',$id,'id','update',$data);
        $this->session->set_flashdata('success', 'Admin Block successfully.');
        redirect('superpanel/admin_user');
	
	 }
    //=========================End Block Admin ===================================== 

     //========================= Block Admin =======================================
    public function unblock($id)
     { 
        $data=array(
            'flag'=> '1'
        );

        $query= $this->General_model->show_data_id('admin_details',$id,'id','update',$data);
        $this->session->set_flashdata('success', 'Admin Unblock successfully.');
        redirect('superpanel/admin_user');
    
     }
    //=========================End Block Admin ======================================
}

