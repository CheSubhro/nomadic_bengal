<?php
ob_start();
class Destination_category extends CI_Controller {

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
        if($query[0]->destination_category == 0 || $query[0]->destination_category == NULL)
        {
            redirect('superpanel/home');
        }
        //End of Admin Access
      
    }

    public function index()
    {
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Destination Category || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/destination_category');
        $this->load->view('superpanel/footer');
    }

    public function add()
    {
        $data['title']="Add Destination Category || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_destination_category');
        $this->load->view('superpanel/footer');
    }

    //========================= Insert destination_category =================================
    public function insert()
    {
        $this->form_validation->set_rules('slug','slug', 'required|is_unique[destination_category.slug]');
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('error', 'Destination category slug already exists on database !');
            redirect('superpanel/destination_category/add');
        }
        else
        {
        $data=$this->input->post();
        $data1= array();

        //For Slug 
        $slug =strtolower($data['slug']);
        $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
        //End Slug

        $config = array(
                    'upload_path'   => "uploads/destination_category/",
                    'upload_url'    =>  base_url() . "uploads/destination_category/",
                    'allowed_types' => "gif|jpg|png|jpeg"
                );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("image"))
        {
        $data['image'] = $this->upload->data();

        $configer =  array(
                      'image_library'   => 'gd2',
                      'source_image'    =>  $data['image']['full_path'],
                      'maintain_ratio'  =>  FALSE,
                      'width'           =>  640,
                      'height'          =>  480,
                    );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $data1['slug']                = $data['slug'];
        $data1['image']               = base_url().'uploads/destination_category/'.$data['image']['file_name'];
        $data1['name']                = $data['name'];
        $data1['title']               = $data['title'];
        $data1['description']         = $data['description'];
        $data1['meta_keyword']        = $data['meta_keyword'];
        $data1['meta_description']    = $data['meta_description'];
        $data1['status']              = $data['status'];
        $data1['created_at']          = date('Y/m/d h:i:s');
        
        $result=$this->General_model->show_data_id('destination_category','','','insert', $data1);

        }
        $this->session->set_flashdata('success', 'Destination Category Insert successfully.');
        redirect('superpanel/destination_category');

        }
     
    }

    //=================== End Insert Destination Category =================================

    //========================= Edit Destination Category =================================
    public function edit($id)
    {
        $data['destination_category']=$this->General_model->show_data_id('destination_category',$id,'id','get','');
        $data['title']="Edit Destination Category || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_destination_category');
        $this->load->view('superpanel/footer');
    }
    //===================== End Edit Destination Category =================================

    //==================== Update Destination Category ====================================
    public function update($id)
    {
        $data=$this->input->post();
        $data1= array();

        //For Slug 
        $slug =strtolower($data['slug']);
        $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
        //End Slug

        $config = array(
                'upload_path'   => "uploads/destination_category/",
                'upload_url'    =>  base_url() . "uploads/destination_category/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {            
            
        $data['image'] = $this->upload->data();

        $configer =  array(
                      'image_library'   => 'gd2',
                      'source_image'    =>  $data['image']['full_path'],
                      'maintain_ratio'  =>  FALSE,
                      'width'           =>  640,
                      'height'          =>  480,
                    );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $filename = $data['image']['file_name'];

        $data1['slug']                        = $data['slug'];
        $data1['image']                       = base_url().'uploads/destination_category/'.$filename;
        $data1['name']                        = $data['name'];
        $data1['title']                       = $data['title'];
        $data1['description']                 = $data['description'];
        $data1['meta_keyword']                = $data['meta_keyword'];
        $data1['meta_description']            = $data['meta_description'];
        $data1['status']                      = $data['status'];
        $data1['updated_at']                  = date('Y/m/d h:i:s');

        $query=$this->General_model->show_data_id('destination_category',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        $result=$this->General_model->show_data_id('destination_category',$id,'id','update', $data1);

        }else{
        
        $data1['slug']                         = $data['slug'];
        $data1['name']                         = $data['name'];
        $data1['title']                        = $data['title'];
        $data1['description']                  = $data['description'];
        $data1['meta_keyword']                 = $data['meta_keyword'];
        $data1['meta_description']             = $data['meta_description'];
        $data1['status']                       = $data['status'];
        $data1['updated_at']                   = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('destination_category',$id,'id','update', $data1);
         
        }
        $this->session->set_flashdata('success', 'Destination Category Update successfully.');
        redirect('superpanel/destination_category');

    }
    //========================= End Update Destination Category =============================

    //========================= Delete Destination Category =================================
    public function delete($id)
     { 
        $query=$this->General_model->show_data_id('destination_category',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        $query=$this->General_model->show_data_id('destination_category',$id,'id','delete','');
        $this->session->set_flashdata('success', 'Destination Category Delete successfully.');
        redirect('superpanel/destination_category');
    
     }
    //====================End Delete Destination Category ==================================
}

