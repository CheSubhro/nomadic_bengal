<?php
ob_start();
class Main extends CI_Controller{

    function __construct()
    {
			parent::__construct();
			$this->load->database();
            $this->load->model('superpanel/Model_users');
			//****************************backtrace prevent*** START HERE*************************

			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('General_model');
            $this->load->helper('cookie');
            $this->load->helper('url');
            if($this->session->userdata('is_logged_in')==1)
            {
                redirect('superpanel/home', 'refresh');
            }
			
			//****************************backtrace prevent*** END HERE*************************
    }

   public function index()
   {
    $this->login();
   }

   public function login()
   {
     $data['title'] = "Nomadic Bengal";
     $this->load->view('superpanel/login',$data);
   }

   //==================================Form validation===========================================

    public function login_validation()
    {
	    $this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('loginerror', 'Username and password can not be blank');
			redirect('superpanel/main/login');
		} else {

			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

		$result = $this->Model_users->login($data);

		if($result == TRUE) 
		{

				$session_data = array(
					'username'=>$result['username'],
					'id'=>$result['id'],
					'is_logged_in'=>1
				);
				// echo "<pre>";
				// print_r($session_data);die;

			$this->session->set_userdata($session_data);
			$this->session->set_userdata('is_logged_in', '1');
			redirect('superpanel/home');
			

		}else {
			$this->session->set_flashdata('loginerror', 'Invalid Username or Password!!!!');

			redirect('superpanel');
			}
		}

	}
	//==================================End Form validation===========================================

	//==============================superpanel Logout==============================================
    public function logout(){
		$this->session->sess_destroy();
		redirect('superpanel/main/login');
	}
//==============================superpanel Logout============================================
  
}
?>