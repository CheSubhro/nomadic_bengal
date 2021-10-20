<?php
ob_start();
class Destination_Place_Item extends CI_Controller {

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
        if($query[0]->destination_place_item == 0 || $query[0]->destination_place_item == NULL)
        {
            redirect('superpanel/home');
        }
        //End of Admin Access
      
    }

    public function index()
    {
        $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item','','','get','');
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Destination Place Item || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/destination_place_item');
        $this->load->view('superpanel/footer');
    }

    public function add()
    {
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Add Destination Place Item || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_destination_place_item');
        $this->load->view('superpanel/footer');
    }

    //========================= Insert Destination Place Item =================================
    public function insert()
    {

        $this->form_validation->set_rules('slug','slug', 'required|is_unique[destination_place_item.slug]');
        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('error', 'Destination place Item slug already exists on database !');
            redirect('superpanel/destination_place_item/add');
        }
        else
        {

        // For Slug 
        $slug =strtolower($this->input->post('slug'));
        $slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
        // End Slug

        $config = array(
                    'upload_path'   => "uploads/destination_place_item/",
                    'upload_url'    => base_url() . "uploads/destination_place_item/",
                    'allowed_types' => "gif|jpg|png|jpeg"
                );

        $this->load->library('upload', $config);


        if ($this->upload->do_upload("front_image")) {
        $data['front_image']  = $this->upload->data();
        $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $data['front_image']['full_path'],
              'maintain_ratio'  =>  FALSE,
              'width'           =>  640,
              'height'          =>  480,
            );
        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $data1['front_image'] = base_url().'uploads/destination_place_item/'.$data['front_image']['file_name'];
        }


        if ($this->upload->do_upload("thumb_imagethumb_image")) {
        $data['thumb_imagethumb_image'] = $this->upload->data();
        $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $data['thumb_imagethumb_image']['full_path'],
              'maintain_ratio'  =>  FALSE,
              'width'           =>  640,
              'height'          =>  480,
            );
        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $data1['thumb_imagethumb_image']=base_url().'uploads/destination_place_item/'.$data['thumb_imagethumb_image']['file_name'];
        }
 

        $data = array(
                   'destination_category_id'       => $this->input->post('destination_category_id'),
                   'slug'                          => $this->input->post('slug'),
                   'front_image'                   => $data1['front_image'],
                   'thumb_image'                   => $data1['thumb_image'],
                   'name'                          => $this->input->post('name'),
                   'title'                         => $this->input->post('title'),
                   'description'                   => $this->input->post('description'),
                   'popular_choice'                => implode(',',$this->input->post('popular_choice')),
                   'meta_keyword'                  => $this->input->post('meta_keyword'),
                   'meta_description'              => $this->input->post('meta_description'),
                   'status'                        => $this->input->post('status'),
                   'created_at'                    => date('Y/m/d h:i:s'),
                );
        
        $result=$this->General_model->show_data_id('destination_place_item','','','insert', $data);
        $this->session->set_flashdata('success', 'Destination Place Item Insert successfully.');
        redirect('superpanel/destination_place_item');

        }
    }

    //================== End Insert Destination Place Item =================================



    //========================= Edit Destination Place Item =================================
    public function edit($id)
    {
        
        $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item',$id,'id','get','');
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Edit Destination Place Item || Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_destination_place_item');
        $this->load->view('superpanel/footer');
    }
    //================= End Edit Destination Place Item =====================================





    //=================== Update Destination Place Item ========================================
    public function update($id)
    {
        $data   = $this->input->post();
        $data1  = array();
        $config = array(
                    'upload_path'   => "uploads/destination_place_item/",
                    'upload_url'    =>  base_url() . "uploads/destination_place_item/",
                    'allowed_types' => "gif|jpg|png|jpeg"
                );

        $this->load->library('upload', $config);        

        if ($this->upload->do_upload("front_image")!="" && $this->upload->do_upload("thumb_image")!="") {
        $data['front_image']        = $this->upload->data();
        $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['front_image']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  640,
                  'height'          =>  480,
                );
        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

        $data1['front_image'] = base_url().'uploads/destination_place_item/'.$data['front_image']['file_name'];

        $data['thumb_image'] = $this->upload->data();
        $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $data['thumb_image']['full_path'],
              'maintain_ratio'  =>  FALSE,
              'width'           =>  640,
              'height'          =>  480,
            );
        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
        $data1['thumb_image']=base_url().'uploads/destination_place_item/'.$data['thumb_image']['file_name'];
        
        $data = array(
                 'destination_category_id'        => $this->input->post('destination_category_id'),
                 'slug'                           => $this->input->post('slug'),
                 'front_image'                    => $data1['front_image'],
                 'thumb_image'                    => $data1['thumb_image'],
                 'name'                           => $this->input->post('name'),
                 'title'                          => $this->input->post('title'),
                 'description'                    => $this->input->post('description'),
                 'popular_choice'                 => implode(',',$this->input->post('popular_choice')),
                 'meta_keyword'                   => $this->input->post('meta_keyword'),
                 'meta_description'               => $this->input->post('meta_description'),
                 'status'                         => $this->input->post('status'),
                 'updated_at'                     => date('Y/m/d h:i:s'), 

           );
        $query=$this->General_model->show_data_id('destination_place_item',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->front_image));
        @unlink(str_replace(base_url(),'',$query[0]->thumb_image));
        
        $result=$this->General_model->show_data_id('destination_place_item',$id,'id','update', $data); 


        }else{
        $data = array(
                 'destination_category_id'        => $this->input->post('destination_category_id'),
                 'slug'                           => $this->input->post('slug'),
                 'name'                           => $this->input->post('name'),
                 'title'                          => $this->input->post('title'),
                 'description'                    => $this->input->post('description'),
                 'popular_choice'                 => implode(',',$this->input->post('popular_choice')),
                 'meta_keyword'                   => $this->input->post('meta_keyword'),
                 'meta_description'               => $this->input->post('meta_description'),
                 'status'                         => $this->input->post('status'),
                 'updated_at'                     => date('Y/m/d h:i:s'), 

           );
        
        $result=$this->General_model->show_data_id('destination_place_item',$id,'id','update', $data); 

        }
        $this->session->set_flashdata('success', 'Destination Place Item Update successfully.');
        redirect('superpanel/destination_place_item');

    }
   //================= End Update Destination Place Item ==========================

    //====================== Delete Destination Place Item ===========================
    public function delete($id)
     { 
        $query=$this->General_model->show_data_id('destination_place_item',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->front_image));

        $query=$this->General_model->show_data_id('destination_place_item',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->thumb_image));

        $query=$this->General_model->show_data_id('destination_place_item',$id,'id','delete','');
        $this->session->set_flashdata('success', 'Destination Place Item Delete successfully.');
        redirect('superpanel/destination_place_item');
    
     }
    //=========================End Delete Destination Place Item ================================= 
}

