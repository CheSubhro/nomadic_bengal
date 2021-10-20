<?php
ob_start();
class Trips_brief extends CI_Controller {
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
        $this->load->model('Custom_model');
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
		$data['trips_brief']=$this->General_model->show_data_id('trips_brief','','','get','');
        $data['trips_category']=$this->General_model->show_data_id('trips_category','','','get','');
        $data['trips_brief_multi_img']=$this->General_model->show_data_id('trips_brief_multi_img','','','get','');
		$data['title']="Recent Trips Brief || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/trips_brief');
		$this->load->view('superpanel/footer');
	}

	public function add()
	{
        $data['trips_category']=$this->General_model->show_data_id('trips_category','','','get','');
		$data['title']="Add Recent Trips || Nomadic Bengal";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/add_trips_brief');
		$this->load->view('superpanel/footer');
	}

    //========================= Insert Trips Brief ====================================

	public function insert()
	{
		$this->form_validation->set_rules('slug','slug', 'required|is_unique[trips_brief.slug]');
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('error', 'Trips Brief slug already exists on database !');
            redirect('superpanel/trips_brief/add');
        }
        else
        {
        $data=$this->input->post();
        $data1= array();

        //For Slug 
        $slug =strtolower($data['slug']);
        $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
        //End Slug


        $data1['slug']                                = $data['slug'];
        $data1['trips_cat_id']                        = $data['trips_cat_id'];
        $data1['trips_main_heading']                  = $data['trips_main_heading'];
        $data1['trips_short_heading']                 = $data['trips_short_heading'];
        $data1['trips_place_name']                    = $data['trips_place_name'];
        $data1['trips_place_title']                   = $data['trips_place_title'];
        $data1['short_description']                   = $data['short_description'];
        $data1['main_description']                    = $data['main_description'];
        $data1['video']                               = $data['video'];
        $data1['g_map']                               = $data['g_map'];
        $data1['meta_keyword']                        = $data['meta_keyword'];
        $data1['meta_description']                    = $data['meta_description'];
        $data1['status']                              = $data['status'];
        $data1['created_at']                          = date('Y/m/d h:i:s');

        $result =$this->General_model->show_data_id('trips_brief','','','insert', $data1);
        $last_id=$this->db->insert_id();

        //====================== Multiple image upload =============================

            $filesCount = count($_FILES['t_multi']['name']);

            for($i = 0; $i<$filesCount; $i++)
            {
                $_FILES['userFile']['name']     = $_FILES['t_multi']['name'][$i];
                $_FILES['userFile']['type']     = $_FILES['t_multi']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['t_multi']['tmp_name'][$i];
                $_FILES['userFile']['error']    = $_FILES['t_multi']['error'][$i];
                $_FILES['userFile']['size']     = $_FILES['t_multi']['size'][$i];

                $uploadPath              = 'uploads/trips_brief/';
                $config['upload_path']   = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = random_string('alnum', 8);
                $config['overwrite']     = false;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile'))
                {
                    $fileData = $this->upload->data();
                    $configer = array(
                              'image_library'   => 'gd2',
                              'source_image'    =>  $fileData['full_path'],
                              'maintain_ratio'  =>  FALSE,
                              'width'           =>  640,
                              'height'          =>  480,
                            );

                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();
                    $uploadData[$i]['brief_images']  = base_url().'uploads/trips_brief/'.$fileData['file_name'];
                    $uploadData[$i]['trips_brief_id']= $last_id;
                }
            }
            if(!empty($uploadData))
            {
                $insert = $this->Custom_model->insertdata($uploadData);
            }
        //====================== End Multiple image upload =============================

        $this->session->set_flashdata('success', 'Recent Trips Brief Page Insert successfully.');
        redirect('superpanel/trips_brief');
        }
	}

    //========================= End Insert Trips Brief =================================

	//========================= Edit Trips Brief =======================================
	public function edit($id)
	{
		$data['trips_brief']=$this->General_model->show_data_id('trips_brief',$id,'id','get','');
        $data['trips_category']=$this->General_model->show_data_id('trips_category','','','get','');
        $data['trips_brief_multi_img']=$this->General_model->show_data_id('trips_brief_multi_img',$data['trips_brief'][0]->id,'trips_brief_id','get','');
		$data['title']="Edit Recent Trips || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_trips_brief');
        $this->load->view('superpanel/footer');
	}
	//========================= End Edit Trips Brief =================================

    public function delete_multi_image($id,$pid)
    {
        $query=$this->General_model->show_data_id('trips_brief_multi_img',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->brief_images));

        $query1=$this->General_model->show_data_id('trips_brief_multi_img',$id,'id','delete','');
        $this->session->set_flashdata('success','Multi image deleted successfully');
        redirect('superpanel/trips_brief/edit/'.$pid);
    }

	//========================= Update Trips Brief =================================
	public function update($id)
	{
        $data =$this->input->post();
        $data1= array();

        

        $data1['slug']                                = $data['slug'];
        $data1['trips_cat_id']                        = $data['trips_cat_id'];
        $data1['trips_main_heading']                  = $data['trips_main_heading'];
        $data1['trips_short_heading']                 = $data['trips_short_heading'];
        $data1['trips_place_name']                    = $data['trips_place_name'];
        $data1['trips_place_title']                   = $data['trips_place_title'];
        $data1['short_description']                   = $data['short_description'];
        $data1['main_description']                    = $data['main_description'];
        $data1['video']                               = $data['video'];
        $data1['g_map']                               = $data['g_map'];
        $data1['meta_keyword']                        = $data['meta_keyword'];
        $data1['meta_description']                    = $data['meta_description'];
        $data1['status']                              = $data['status'];
        $data1['updated_at']                          = date('Y/m/d h:i:s');

        $result =$this->General_model->show_data_id('trips_brief',$id,'id','update', $data1);
        $last_id=$data['id'];

        //====================== Multiple image upload =============================

            $filesCount = count($_FILES['t_multi']['name']);

            for($i = 0; $i<$filesCount; $i++)
            {
                $_FILES['userFile']['name']     = $_FILES['t_multi']['name'][$i];
                $_FILES['userFile']['type']     = $_FILES['t_multi']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['t_multi']['tmp_name'][$i];
                $_FILES['userFile']['error']    = $_FILES['t_multi']['error'][$i];
                $_FILES['userFile']['size']     = $_FILES['t_multi']['size'][$i];

                $uploadPath              = 'uploads/trips_brief/';
                $config['upload_path']   =  $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     =  random_string('alnum', 8);
                $config['overwrite']     =  false;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile'))
                {
                    $fileData = $this->upload->data();
                    $configer = array(
                              'image_library'   => 'gd2',
                              'source_image'    =>  $fileData['full_path'],
                              'maintain_ratio'  =>  FALSE,
                              'width'           =>  640,
                              'height'          =>  480,
                            );

                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();
                    $uploadData[$i]['brief_images']  = base_url().'uploads/trips_brief/'.$fileData['file_name'];
                    $uploadData[$i]['trips_brief_id']= $last_id;
                }
            }
            if(!empty($uploadData))
            {
                $insert = $this->Custom_model->insertdata($uploadData);
            }
        //====================== End Multiple image upload =============================

        $this->session->set_flashdata('success', 'Recent Trips Brief Page Update successfully.');
        redirect('superpanel/trips_brief');

	}
    //========================= End Update Trips Brief =================================

	//========================= Block Trips Brief ======================================
    public function block($id)
     { 
        $data=array(
            'flag'=> '0'
        );

        $query= $this->General_model->show_data_id('trips_brief',$id,'id','update',$data);
        $this->session->set_flashdata('success', 'Trips Block successfully.');
        redirect('superpanel/trips_brief');
	
	 }
    //=========================End Block Trips Brief ===================================

    //=========================UnBlock Trips Brief =================================== 
    public function unblock($id)
    {
        $data=array(
            'flag'=> '1'
        );

        $query= $this->General_model->show_data_id('trips_brief',$id,'id','update',$data);
        $this->session->set_flashdata('success', 'Trips Unblock successfully.');
        redirect('superpanel/trips_brief');
    } 

    //=========================End UnBlock Trips Brief ====================================
	
	
}