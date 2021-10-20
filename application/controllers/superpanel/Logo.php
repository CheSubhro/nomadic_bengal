<?php
ob_start();
class Logo extends CI_Controller {

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
        $data['logo']=$this->General_model->show_data_id('logo','','','get','');
        $data['title']="Logo || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/logo');
        $this->load->view('superpanel/footer');
    }

    public function add()
    {
        $data['title']="Add Logo || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_logo');
        $this->load->view('superpanel/footer');
    }

    //========================= Insert Logo =================================
    public function insert()
    {
         
        $data =$this->input->post();
        $data1= array();


        $config = array(
                    'upload_path'   => "uploads/logo/",
                    'upload_url'    =>  base_url()."uploads/logo/",
                    'allowed_types' => "gif|jpg|png|jpeg"
                );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("image")){
        $logo = $this->upload->data();

        $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $logo['full_path'],
              'maintain_ratio'  =>  FALSE,
              'width'           =>  640,
              'height'          =>  480,
            );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $data1['name']       = $data['name'];
        $data1['image']      = base_url().'uploads/logo/'.$logo['file_name'];
        $data1['status']     = $data['status'];
        $data1['created_at'] = date('Y/m/d h:i:s');

        $result=$this->General_model->show_data_id('logo','','','insert', $data1);

        }
        $this->session->set_flashdata('success','Logo Insert successfully.');
        redirect('superpanel/logo'); 
    }

    //========================= End Insert Logo =================================

    //========================= Edit Logo =================================
    public function edit($id)
    {

        $data['logo']=$this->General_model->show_data_id('logo',$id,'id','get','');
        $data['title']="Edit Logo || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_logo');
        $this->load->view('superpanel/footer');
    }
    //========================= End Edit Logo =================================

    //========================= Update Logo =================================
    public function update($id)
    {
        $config = array(
                'upload_path' => "uploads/logo/",
                'upload_url' => base_url() . "uploads/logo/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );

        $this->load->library('upload', $config);
        if($this->upload->do_upload('image')) {
        $logo = $this->upload->data();

        $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $logo['full_path'],
              'maintain_ratio'  =>  FALSE,
              'width'           =>  640,
              'height'          =>  480,
            );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
           
        $datalist = array( 
            'image'      => base_url().'uploads/logo/'.$logo['file_name'], 
            'name'       => $this->input->post('name'),
            'status'     => $this->input->post('status'),
            'updated_at' => date('Y/m/d h:i:s')
        );

        $query=$this->General_model->show_data_id('logo',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        }else{

        $datalist = array( 
            'name'       => $this->input->post('name'),
            'status'     => $this->input->post('status'),
            'updated_at' => date('Y/m/d h:i:s') 
        );

        }  
        $query= $this->General_model->show_data_id('logo',$id,'id','update',$datalist);
        $this->session->set_flashdata('success', 'Logo Update successfully.');
        redirect('superpanel/logo');
    }
   //========================= End Update Logo =================================

    //========================= Delete Logo =================================
    public function delete($id)
     { 
        $query=$this->General_model->show_data_id('logo',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->image));

        $query=$this->General_model->show_data_id('logo',$id,'id','delete','');
        $this->session->set_flashdata('success', 'Logo Delete successfully.');
        redirect('superpanel/logo');
    
     }
    //=========================End Delete Logo ================================= 
}

