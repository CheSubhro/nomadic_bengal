<?php
ob_start();
class Destination_Place_Item_Brief extends CI_Controller {

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
        if($query[0]->destination_place_item_brief == 0 || $query[0]->destination_place_item_brief == NULL)
        {
            redirect('superpanel/home');
        }
        //End of Admin Access
      
    }

  public function index()
  {
        $data['destination_place_item_brief']=$this->General_model->show_data_id('destination_place_item_brief','','','get','');
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item','','','get','');
        $data['title']="Destination Place Item Brief|| Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/destination_place_item_brief');
        $this->load->view('superpanel/footer');
  }

  public function add()
  {
        $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item','','','get','');
        $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');
        $data['title']="Add Destination Place Item Brief|| Nomadic Bengal";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/add_destination_place_item_brief');
        $this->load->view('superpanel/footer');
  }

  public function ajax_destination()
    {
        $id=$this->input->post('destination_category_id');
        $query = $this->General_model->show_data_id('destination_place_item',$id,'destination_category_id','get','');
        $data['destination_place_item'] = $query;
        $this->output->set_output(json_encode($data['destination_place_item']));
    }

  //==================== Insert Destination Place Item Brief ============================
  public function insert()
  {

      $data = array(
             'destination_place_item_id'                => $this->input->post('destination_place_item_id'),
             'destination_category_id'                  => $this->input->post('destination_category_id'),
             'description'                              => $this->input->post('description'),
             'how_to_reach'                             => $this->input->post('how_to_reach'),
             'at_a_glance'                              => $this->input->post('at_a_glance'),
             'video'                                    => $this->input->post('video'),
             'google_map'                               => $this->input->post('google_map'),
             'meta_keyword'                             => $this->input->post('meta_keyword'),
             'meta_description'                         => $this->input->post('meta_description'),
             'status'                                   => $this->input->post('status'),
             'created_at'                               => date('Y/m/d h:i:s'),    
             );
        
      $result=$this->General_model->show_data_id('destination_place_item_brief','','','insert', $data);
      $this->session->set_flashdata('success', 'Destination Place Item Brief Insert successfully.');
      redirect('superpanel/destination_place_item_brief');
  }

    //========================= End Insert Destination Place Item  Brief =================================

    //========================= Edit Destination Place Item  Brief =================================
  public function edit($id)
  {
    
    $data['destination_place_item_brief']=$this->General_model->show_data_id('destination_place_item_brief',$id,'id','get','');

    $data['destination_place_item']=$this->General_model->show_data_id('destination_place_item','','','get','');

    $data['destination_category']=$this->General_model->show_data_id('destination_category','','','get','');

    $data['title']="Edit Destination Place Item Brief || Nomadic Bengal";
    $this->load->view('superpanel/header',$data);
    $this->load->view('superpanel/edit_destination_place_item_brief');
    $this->load->view('superpanel/footer');
  }
  //===================== End Edit Destination Place Item  Brief ==========================

  //==================== Update Destination Place Item  Brief ===========================
  public function update($id)
  {
        $data = array(
             'destination_place_item_id'                => $this->input->post('destination_place_item_id'),
             'destination_category_id'                  => $this->input->post('destination_category_id'),
             'description'                              => $this->input->post('description'),
             'how_to_reach'                             => $this->input->post('how_to_reach'),
             'at_a_glance'                              => $this->input->post('at_a_glance'),
             'video'                                    => $this->input->post('video'),
             'google_map'                               => $this->input->post('google_map'),
             'meta_keyword'                             => $this->input->post('meta_keyword'),
             'meta_description'                         => $this->input->post('meta_description'),
             'status'                                   => $this->input->post('status'),
             'updated_at'                               => date('Y/m/d h:i:s'),    
             );
        $result=$this->General_model->show_data_id('destination_place_item_brief',$id,'id','update', $data);
        $this->session->set_flashdata('success', 'Destination Place Item Brief Update successfully.');
        redirect('superpanel/destination_place_item_brief');

  }
   //========================= End Update Destination Place Item  Brief =================================

  //========================= Delete Destination Place Item  Brief =================================
    public function delete($id)
  { 

      $query=$this->General_model->show_data_id('destination_place_item_brief',$id,'id','delete','');
      $this->session->set_flashdata('success', 'Destination Place Item Brief Delete successfully.');
      redirect('superpanel/destination_place_item_brief');
  
  }
    //=========================End Destination Place Item  Brief ================================= 

     
}

