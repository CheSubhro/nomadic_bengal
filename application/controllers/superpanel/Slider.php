<?php
ob_start();
class Slider extends CI_Controller {

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
        $this->load->helper('file');

        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('superpanel', 'refresh');
        }

        //Admin Access
        $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        if($query[0]->slider == 0 || $query[0]->slider == NULL){
            redirect('superpanel/home');
        }
        //End of Admin Access
    }

    public function index()
    {
        $data['slider']=$this->General_model->show_data_id('slider','','id','get','');
        $data['title']="Slider || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/slider');
        $this->load->view('superpanel/footer');
    }

    public function add()
    {   
        
        $result=$this->General_model->show_data_id('slider','','specification_id','get','');
        $data['slider']=$result;
        $data['title']="Add Slider || Nomadic Bengal"; 
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_slider');
        $this->load->view('superpanel/footer');
    }

    //========================= Enter Slider =====================================

    public function insert()
    {

        $data =$this->input->post();
        $data1= array();

        $config = array(
                        'upload_path'   => "uploads/slider/",
                        'upload_url'    => base_url() . "uploads/slider/",
                        'allowed_types' => "gif|jpg|png|jpeg"
                    );
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img")) {

        $data['img']                  = $this->upload->data();

        $configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1024,
                  'height'          =>  768,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
         
        $data1['heading']             = $data['heading'];
        $data1['description']         = $data['description'];
        $data1['img']                 = base_url().'uploads/slider/'.$data['img']['file_name'];
        $data1['slider_button_url']   = $data['slider_button_url'];
        $data1['slider_button_text']  = $data['slider_button_text'];
        $data1['status']              = $data['status'];
        $data1['created_at']          = date('Y/m/d h:i:s');
        

         $result=$this->General_model->show_data_id('slider','','','insert', $data1);
         $this->session->set_flashdata('success', 'Slider Insert successfully.');
         redirect('superpanel/slider');
        }
     
    }

    //========================= End Slider ============================================

    //========================= Edit Slider ===========================================

    public function edit($id)
    {
        
        $data['slider']=$this->General_model->show_data_id('slider',$id,'id','get','');
        $data['title']="Update Slider || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_slider');
        $this->load->view('superpanel/footer');
    }

    //=========================End Edit Slider =======================================

    //========================= Update Slider ========================================

    public function update($id)
    {
        $data =$this->input->post();
        $data1= array();

        $config = array(
                        'upload_path'   => "uploads/slider/",
                        'upload_url'    => base_url() . "uploads/slider/",
                        'allowed_types' => "gif|jpg|png|jpeg"
                    );
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img")) {
        $data['img']                  = $this->upload->data();

        $configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
         
        $data1['heading']             = $data['heading'];
        $data1['description']         = $data['description'];
        $data1['img']                 = base_url().'uploads/slider/'.$data['img']['file_name'];
        $data1['slider_button_url']   = $data['slider_button_url'];
        $data1['slider_button_text']  = $data['slider_button_text'];
        $data1['status']              = $data['status'];
        $data1['updated_at']          = date('Y/m/d h:i:s');
        
        $query=$this->General_model->show_data_id('slider',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->img));

        $query= $this->General_model->show_data_id('slider',$id,'id','update',$data1);
         
        }else{

        $data1['heading']             = $data['heading'];
        $data1['description']         = $data['description'];
        $data1['slider_button_url']   = $data['slider_button_url'];
        $data1['slider_button_text']  = $data['slider_button_text'];
        $data1['status']              = $data['status'];
        $data1['updated_at']          = date('Y/m/d h:i:s');
         

        $query= $this->General_model->show_data_id('slider',$id,'id','update',$data1);
         
        }
        $this->session->set_flashdata('success', 'Slider Update successfully.');
        redirect('superpanel/slider'); 
    }

    //========================= End Update Slider =================================

    //========================= Delete Slider =====================================
    public function delete($id)
    { 
        $query=$this->General_model->show_data_id('slider',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->img));

        $query=$this->General_model->show_data_id('slider',$id,'id','delete','');
        redirect('superpanel/slider');
    
    }
    //=========================End Delete Slider ===================================
}

